<footer>
	<div class="container center">
		<p>
			iTool &copy;
			<?php echo date('Y'); ?>
			. {!! htmlspecialchars_decode($config['footCopy']) !!} 
		</p>
	</div>
</footer>
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
{!! htmlspecialchars_decode($config['cnzz']) !!}