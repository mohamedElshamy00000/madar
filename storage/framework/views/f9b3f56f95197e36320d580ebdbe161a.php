<?php $__currentLoopData = \AppDashboard::getDashboardItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dashboardItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $isVisible = $dashboardItem['visible'] ?? fn() => true;
    ?>
    <?php if($isVisible()): ?>
        <?php echo is_callable($dashboardItem['item']) ? $dashboardItem['item']() : $dashboardItem['item']; ?>

    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/u774605506/domains/mdar.cc/public_html/modules/AppDashboard/resources/views/statistics.blade.php ENDPATH**/ ?>