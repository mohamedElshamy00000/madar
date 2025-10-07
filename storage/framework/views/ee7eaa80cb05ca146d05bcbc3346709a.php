<script type="text/javascript">
<?php if(get_option('file_addobe_express_status') && Access::permission('appfiles.image_editor')): ?>
	Files.loadAdobeExpress('<?php echo e(get_option('file_addobe_express_app_name')); ?>', '<?php echo e(get_option('file_addobe_express_api_key')); ?>');
<?php endif; ?>
<?php if(get_option('file_onedrive_status') && Access::permission('appfiles.onedrive')): ?>
	Files.openOneDriveActions('<?php echo e(get_option('file_onedrive_api_key')); ?>');
<?php endif; ?>
<?php if(get_option('file_google_drive_status') && Access::permission('appfiles.google_drive')): ?>
	Files.pickGoogleDriveFile('<?php echo e(get_option('file_google_drive_api_key')); ?>', '<?php echo e(get_option('file_google_drive_client_id')); ?>');
<?php endif; ?>
<?php if(get_option('file_dropbox_status') && Access::permission('appfiles.dropbox')): ?>
	Files.Dropbox('<?php echo e(get_option('file_dropbox_api_key')); ?>');
<?php endif; ?>

</script><?php /**PATH /home/u774605506/domains/mdar.cc/public_html/modules/AppFiles/resources/views/script.blade.php ENDPATH**/ ?>