<!DOCTYPE html>
<html>

	<head>
		<?php echo $__env->make('Compile.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</head>

	<body>
		<?php echo $__env->make('Compile.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('Compile.changyan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('Compile.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</body>
</html>
