<?php
	$languages = Language::getLanguages();
	$currentLang = app()->getLocale();
?>

<?php if($languages->isNotEmpty()): ?>
<div class="btn-group position-static">
    <button class="bg-transparent text-hover-primary dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown" aria-expanded="true">
        <i class="fa-light fa-globe"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end border-1 border-gray-300 px-2 w-auto max-w-180 mt-10" data-popper-placement="bottom-end">

    	<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="mb-1">
            <a class="dropdown-item px-2 py-1 rounded d-flex gap-8 fw-5 fs-14 text-truncate  <?php echo e($currentLang == $language->code?"bg-primary-100":""); ?>" href="<?php echo e(url("lang/".$language->code)); ?>" data-id="" data-popup="uploadFileFromURLModal" data-call-success="Main.ajaxScroll(true)">
                <span class="size-16 me-1 text-center"><i class="<?php echo e($language->icon); ?>"></i></span>
                <span class="text-truncate"><?php echo e($language->name); ?></span>
            </a>
        </li>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	
    </ul>
</div>
<?php endif; ?><?php /**PATH /home/u774605506/domains/mdar.cc/public_html/modules/AdminLanguages/resources/views/partials/header-item.blade.php ENDPATH**/ ?>