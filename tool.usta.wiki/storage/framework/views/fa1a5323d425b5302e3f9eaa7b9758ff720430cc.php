<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
			<a class="navbar-brand" href="<?php echo e(URL::to('/')); ?>">iTool</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse pull-right">
			<ul class="nav navbar-nav">
				<li>
					<a href="http://www.usta.wiki" target="_blank">
						iSchool
					</a>
				</li>
				<li>
					<a href="<?php echo e(URL::to('/share')); ?>">
						代码归档
					</a>
				</li>
				<?php 
					$count=5;
					foreach ($language as $key => $value) {
					if($count>0){	
				?>
				<li>
					<a href="<?php echo e(URL::to('compile')); ?>/<?php echo $value -> id; ?>">
						<?php  echo $value -> language; ?>
					</a>
				</li>
				<?php $count--;
					}}
				?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">其他在线工具 <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php 
								$count=0;
								foreach ($language as $key => $value) {
								if($count>4){	
							?>
						<li>
							<a href="<?php echo e(URL::to('compile')); ?>/<?php echo $value -> id; ?>">
								<?php  echo $value -> language; ?>
							</a>
						</li>
						<?php }$count++;} ?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
