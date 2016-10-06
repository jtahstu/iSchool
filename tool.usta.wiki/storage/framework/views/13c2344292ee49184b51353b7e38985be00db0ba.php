<footer id="footer">
	<div class="container" id="footer-main">
		<div class="col-md-4">
			<div id="footer-1">
				<div>
					<h2>简介</h2>
					<p class="p2em">
						<?php echo htmlspecialchars_decode($config['footDes']); ?>

					</p>
				</div>
				<div>
					<h2>备案号</h2>
					<p class="p2em">
						<a href="http://www.miibeian.gov.cn/" target="_blank">
							<?php echo e($config['footRecord']); ?>

						</a>
					</p>
				</div>
				<div>
					<h2>邮箱</h2>
					<p class="p2em">
						<a href="mailto:<?php echo e($config['footEmail']); ?>">
							<?php echo e($config['footEmail']); ?>

						</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div id="footer-2">
				<div>
					<h2>域名</h2>
					<p class="p2em">
						<a href="http://tool.usta.wiki" target="_blank">
							tool.usta.wiki
						</a>
					</p>
				</div>
				<div>
					<h2>服务器</h2>
					<p class="p2em">
						阿里云ECS服务器
					</p>
				</div>
				<div>
					<h2>框架</h2>
					<p class="p2em">
						<a href="http://getbootstrap.com/" target="_blank">
							Bootstrap
						</a>
					</p>
					<p class="p2em">
						<a href="https://laravel.com/" target="_blank">
							Laravel
						</a>
					</p>
					<p class="p2em">
						<a href="https://www.docker.com/" target="_blank">
							Docker
						</a>
					</p>

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div id="footer-3" class="layer">
				<h2>社交账号</h2>
				<img src="<?php echo e(asset('public/img/qq.jpg')); ?>"/>
				<img src="<?php echo e(asset('public/img/weixin.jpg')); ?>"/>
				<h2><a href="<?php echo e(URL::to('/login')); ?>" target="_blank">
					su - root
				</a></h2>
			</div>
		</div>
	</div>
	<div class="col-md-12 center" id="footer-state">
		<p>
			iTool &copy;
			<?php echo date('Y'); ?>
			. <?php echo htmlspecialchars_decode($config['footCopy']); ?> 
		</p>
	</div>
</footer>
<script src="<?php echo e(asset('public/js/layer.js')); ?>"></script>
<script>
	$(function() {
		layer.ready(function() {
			//使用相册
			layer.photos({
				photos: '.layer'
			});
		});
	});
</script>
<!--统计代码-->
<?php echo htmlspecialchars_decode($config['cnzz']); ?>

