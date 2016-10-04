<footer id="footer">
	<div class="container" id="footer-main">
		<div class="col-md-4">
			<div id="footer-1">
				<div>
					<h2>简介</h2>
					<p class="p2em">
						{!! Config::get('itool.footDes') !!}
					</p>
				</div>
				<div>
					<h2>备案号</h2>
					<p class="p2em">
						<a href="http://www.miibeian.gov.cn/" target="_blank">
							{{Config::get('itool.footRecord')}}
						</a>
					</p>
				</div>
				<div>
					<h2>邮箱</h2>
					<p class="p2em">
						<a href="mailto:{{Config::get('itool.footEmail')}}">
							{{Config::get('itool.footEmail')}}
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
				<img src="{{asset('public/img/qq.jpg')}}"/>
				<img src="{{asset('public/img/weixin.jpg')}}"/>
				<h2><a href="{{URL::to('/login')}}" target="_blank">
					su - root
				</a></h2>
			</div>
		</div>
	</div>
	<div class="col-md-12 center" id="footer-state">
		<p>
			iTool &copy;
			<?php echo date('Y'); ?>
			. {!! Config::get('itool.footCopy') !!}
		</p>
	</div>
</footer>
<!--这里必须先引入jquery，不然没法用-->
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="{{asset('public/js/layer.js')}}"></script>
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
{!! Config::get('itool.cnzz') !!}
