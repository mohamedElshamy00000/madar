<?php

namespace Modules\AdminMailSender\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class AdminMailSenderServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'AdminMailSender';

    protected string $nameLower = 'adminmailsender';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        // Only apply mail config if not running package discovery or composer install
        if (!$this->isRunningPackageDiscovery()) {
            $this->applyMailConfigFromOptions();
        }
        
        if (! class_exists('MailSender')) {
            class_alias(\Modules\AdminMailSender\Facades\MailSender::class, 'MailSender');
        }
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Check if we're running package discovery or composer install
     */
    protected function isRunningPackageDiscovery(): bool
    {
        // Check if running in console
        if (!$this->app->runningInConsole()) {
            return false;
        }

        // Check if we're running package:discover command
        $argv = $_SERVER['argv'] ?? [];
        $command = implode(' ', $argv);
        
        return str_contains($command, 'package:discover') 
            || str_contains($command, 'composer install')
            || str_contains($command, 'composer update');
    }

    public static function applyMailConfigFromOptions()
    {
        // Add try-catch to prevent failures if database is not available
        try {
            // Protocol
            $protocol = get_option('mail_protocol', 'mail');
            $driver = $protocol == 'smtp' ? 'smtp' : 'sendmail';

            config([
                'mail.default'                  => $driver,
                'mail.mailers.smtp.host'        => get_option('smtp_server'),
                'mail.mailers.smtp.port'        => get_option('smtp_port', 587),
                'mail.mailers.smtp.username'    => get_option('smtp_username'),
                'mail.mailers.smtp.password'    => get_option('smtp_password'),
                'mail.mailers.smtp.encryption'  => strtolower(get_option('smtp_encryption', 'tls')) == 'none' ? null : strtolower(get_option('smtp_encryption', 'tls')),
                'mail.from.address'             => get_option('mail_sender_email', 'example@gmail.com'),
                'mail.from.name'                => get_option('mail_sender_name', 'Admin'),
            ]);
        } catch (\Exception $e) {
            // Database not available yet, use default mail config
            // This is expected during deployment/package discovery
        }
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->name, 'lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom(module_path($this->name, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $relativeConfigPath = config('modules.paths.generator.config.path');
        $configPath = module_path($this->name, $relativeConfigPath);

        if (is_dir($configPath)) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($configPath));

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $relativePath = str_replace($configPath . DIRECTORY_SEPARATOR, '', $file->getPathname());
                    $configKey = $this->nameLower . '.' . str_replace([DIRECTORY_SEPARATOR, '.php'], ['.', ''], $relativePath);
                    $key = ($relativePath === 'config.php') ? $this->nameLower : $configKey;

                    $this->publishes([$file->getPathname() => config_path($relativePath)], 'config');
                    $this->mergeConfigFrom($file->getPathname(), $key);
                }
            }
        }
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->nameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->nameLower);

        $componentNamespace = $this->module_namespace($this->name, $this->app_path(config('modules.paths.generator.component-class.path')));
        Blade::componentNamespace($componentNamespace, $this->nameLower);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->nameLower)) {
                $paths[] = $path.'/modules/'.$this->nameLower;
            }
        }

        return $paths;
    }
}