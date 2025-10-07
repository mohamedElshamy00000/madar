<?php if(!empty($options)): ?>
<div class="d-flex">
    <select class="form-select form-select-sm datatable_filter" name="<?php echo e($name); ?>">
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($option['value']); ?>"><?php echo e($option['label']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php endif; ?><?php /**PATH /home/u774605506/domains/mdar.cc/public_html/resources/themes/app/pico/resources/views/components/datatable_select.blade.php ENDPATH**/ ?>