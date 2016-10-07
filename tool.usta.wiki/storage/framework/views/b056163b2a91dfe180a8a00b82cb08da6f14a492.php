<!DOCTYPE html>
<html>

	<head>
		<?php echo $__env->make('Compile.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<style type="text/css">
			#main table{font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size: 14px;}
			.center,table tr th{text-align:center}
			#main{margin:20px 0;padding-left:20px;}
			#compile-list{min-height: 600px;}
			#valign{vertical-align:middle}
		</style>
	</head>

	<body>
		<?php if(isset($_GET['m'])): ?>
			<?php echo $__env->make('Mobile.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php else: ?>
			<?php echo $__env->make('Compile.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>
		<div class="col-md-1"></div>
		<div id="main" class="col-md-10">
			<div class="pull-right">
				<?php echo $list->render(); ?>

			</div>
			<div id="compile-list">
			<table class="table table-bordered table-hover table-condensed">
				<tr>
					<th class="col-md-1">序号</th>
					<th class="col-md-1">标题</th>
					<th class="col-md-5">代码</th>
					<th class="col-md-1">编程语言</th>
					<th class="col-md-1">最后编辑时间</th>
					<th class="col-md-1">浏览次数</th>
				</tr>
				<?php foreach($list as $rec): ?>
				<tr class="list">
					<td class="center" id="valign">
						<?php echo e($rec->id); ?>

					</td>
					<td class="center" id="valign">
						<a href="<?php echo e(URL::to('/share')); ?>/<?php echo e($rec->linkid); ?>">
							<?php echo e($rec->title); ?>

						</a>
					</td>
					<td class="compile-list-code">
						<a href="<?php echo e(URL::to('/share')); ?>/<?php echo e($rec->linkid); ?>">
							<?php
								$len=$config['listCodeLength'];
							    if(strlen($rec->code)>$len){
							    	$cutCode=substr($rec->code, 0 , $len).' ... ';
									echo htmlentities($cutCode);
							    }else{
							    	echo htmlentities($rec->code);
							    }
							?>
						</a>
					</td>
					<td class="center" id="valign">
						<?php echo e($valueLanguage[$rec->value]); ?>

					</td>
					<td class="center" id="valign">
						<?php echo e($rec->time); ?>

					</td>
					<td class="center" id="valign">
						<?php echo e($rec->view); ?>

					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			</div>
			<div class="pull-right">
				<?php echo $list->render(); ?>

			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-12" style="padding: 0;">
			<?php if(isset($_GET['m'])): ?>
				<?php echo $__env->make('Mobile.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php else: ?>
				<?php echo $__env->make('Compile.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endif; ?>
		</div>
	</body>

</html>