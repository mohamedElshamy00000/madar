<div class="modal fade" id="uploadFileFromURLModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered ">
		<form class="modal-content actionForm" action="<?php echo e(module_url("save_file")); ?>" data-call-success="Main.closeModal('uploadFileFromURLModal'); Main.ajaxScroll(true);">
     		<input class="form-control d-none" name="folder_id" id="folder_id" type="text" value="<?php echo e($folder_id); ?>">
			<div class="modal-header">
				<h1 class="modal-title fs-16">
					<i class="fa-light fa-link"></i> <?php echo e(__("Upload file from URL")); ?>

				</h1>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
         		<div class="msg-errors"></div>
 				<div class="row">
 					<div class="col-md-12">
	                  	<div class="mb-0">
	                  		<label for="file_url" class="form-label"><?php echo e(__('File URL')); ?></label>
                     		<input placeholder="<?php echo e(__('Enter file url')); ?>" class="form-control" name="file_url" id="file_url" type="text">
	                  	</div>
 					</div>

 				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
				<button type="submit" class="btn btn-dark"><?php echo e(__('Upload')); ?></button>
			</div>
		</form>
	</div>
</div><?php /**PATH /home/u774605506/domains/mdar.cc/public_html/modules/AppFiles/resources/views/upload_from_url.blade.php ENDPATH**/ ?>