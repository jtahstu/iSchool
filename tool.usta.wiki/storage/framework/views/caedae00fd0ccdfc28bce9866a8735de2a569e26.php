<?php $__env->startSection('value',$value); ?>
<?php $__env->startSection('lang',$lang); ?>
<?php $__env->startSection('mode',$mode); ?>

<?php $__env->startSection('content'); ?>
<?php echo htmlspecialchars(($template)); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Compile/Clayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>