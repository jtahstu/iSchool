<!DOCTYPE html>
<html>

	<head>
		<?php echo $__env->make('Compile.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</head>

	<body>
		<?php if(isset($_GET['m'])): ?>
			<?php echo $__env->make('Mobile.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php else: ?>
			<?php echo $__env->make('Compile.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>
		<?php echo $__env->make('Compile.changyan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php if(isset($_GET['m'])): ?>
			<?php echo $__env->make('Mobile.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php else: ?>
			<?php echo $__env->make('Compile.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>
	</body>
</html>
