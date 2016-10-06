<!DOCTYPE html>
<html>

	<head>
		<?php echo $__env->make('Compile.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</head>

	<body data-spy="scroll" data-target="#myScrollspy">
		<?php echo $__env->make('Compile.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="container" id="admin">
			<div class="jumbotron" id="admin-jumbotron">
				<h2>iTool后台管理系统 &nbsp;&nbsp;<small>Version: <?php echo e($config['version']); ?> by jtahstu .</small></h2>
				<p>
					基于Bootstrap前端框架和Affix插件构建的管理系统
				</p>
			</div>
			<div class="row">
				<div class="col-sm-2" id="myScrollspy">
					<ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="125" id="admin-affix-ul">
						<li class="active">
							<a href="#section-1">
								全局配置
							</a>
						</li>
						<li>
							<a href="#section-2">
								首页配置
							</a>
						</li>
						<li>
							<a href="#section-3">
								脚部配置
							</a>
						</li>
						<li>
							<a href="#section-4">
								代码编辑页
							</a>
						</li>
						<li>
							<a href="#section-5">
								代码归档页
							</a>
						</li>
					</ul>
				</div>
				<div class="col-sm-10" id="admin-section">
					<h2 id="section-1">全局配置</h2>
					<div id="admin-global">
						<div class="form-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">网站标题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-global-title" value="<?php echo e($config['title']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">网站关键词：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-global-key" value="<?php echo e($config['keyword']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">网站介绍：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-global-des" value="<?php echo e($config['des']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">网站图标：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-global-icon" value="<?php echo e($config['icon']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">当前版本：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-global-version" value="<?php echo e($config['version']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">统计代码：</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="3" id="admin-global-cnzz"><?php echo e($config['cnzz']); ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">添加头部代码：</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="3" id="admin-global-headAddCode"><?php echo e($config['headAddCode']); ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success" id="admin-global-submit">
									<i class="glyphicon glyphicon-ok"></i> 确认修改
									</button>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<h2 id="section-2">首页</h2>
					<div id="admin-index">
						<div class="form-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">首页下拉框：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-index-indexMessage" value="<?php echo e($config['indexMessage']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">弹幕图片：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-index-indexBarragerImg" value="<?php echo e($config['indexBarragerImg']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">弹幕文字：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-index-indexBarragerInfo" value="<?php echo e($config['indexBarragerInfo']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">弹幕链接：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-index-indexBarragerLink" value="<?php echo e($config['indexBarragerLink']); ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-warning" id="admin-index-submit">
									<i class="glyphicon glyphicon-ok"></i> 确认修改
									</button>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<h2 id="section-3">脚部</h2>
					<div id="admin-foot">
						<div class="form-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">站点介绍：</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="3" id="admin-foot-footDes"><?php echo e($config['footDes']); ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">备案号：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-foot-footRecord" value="<?php echo e($config['footRecord']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">邮箱：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-foot-footEmail" value="<?php echo e($config['footEmail']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">站点声明：</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="4" id="admin-foot-footCopy"><?php echo e($config['footCopy']); ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-info" id="admin-foot-submit">
									<i class="glyphicon glyphicon-ok"></i> 确认修改
									</button>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<h2 id="section-4">代码编辑页</h2>
					<div id="admin-editor">
						<div class="form-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">标题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-editor-editorTitle" value="<?php echo e($config['editorTitle']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">编辑器主题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-editor-editorTheme" value="<?php echo e($config['editorTheme']); ?>">
									<br />
									<div class="alert alert-info" role="alert">
										<h2 class="center" id="admin-editor-theme-title">目前支持以下主题</h2>
										<table class="table table-bordered table-responsive">
											<tr>
												<td>ambiance</td>
												<td>chaos</td>
												<td>chrome</td>
												<td>clouds_midnight</td>
												<td>clouds</td>
											</tr>
											<tr>
												<td>cobalt</td>
												<td>crimson_editor</td>
												<td>dawn</td>
												<td>dreamweaver</td>
												<td>eclipse</td>
											</tr>
											<tr>
												<td>github</td>
												<td>idle_fingers</td>
												<td>iplastic</td>
												<td>katzenmilch</td>
												<td>kr_theme</td>
											</tr>
											<tr>
												<td>kuroir</td>
												<td>merbivore_soft</td>
												<td>merbivore</td>
												<td>mono_industrial</td>
												<td>monokai</td>
											</tr>
											<tr>
												<td>pastel_on_dark</td>
												<td>solarized_dark</td>
												<td>solarized_light</td>
												<td>sqlserver</td>
												<td>terminal</td>
											</tr>
											<tr>
												<td>textmate</td>
												<td>tomorrow_night_blue</td>
												<td>tomorrow_night_bright</td>
												<td>tomorrow_night_eighties</td>
												<td>tomorrow_night</td>
											</tr>
											<tr>
												<td>tomorrow</td>
												<td>twilight</td>
												<td>vibrant_ink</td>
												<td>xcode</td>
												<td></td>
											</tr>
										</table>
									</div>
								</div>
								
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">编辑器高度：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-editor-editorHeight" value="<?php echo e($config['editorHeight']); ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary" id="admin-editor-submit">
									<i class="glyphicon glyphicon-ok"></i> 确认修改
									</button>
								</div>
							</div>
						</div>
					</div>

					<hr>
					<h2 id="section-5">代码归档页</h2>
					<div id="admin-list">
						<div class="form-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">代码分享默认标题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-list-defaultTitle" value="<?php echo e($config['defaultTitle']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">分页代码数：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-list-paginateCount" value="<?php echo e($config['paginateCount']); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">代码长度：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="admin-list-listCodeLength" value="<?php echo e($config['listCodeLength']); ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default" id="admin-list-submit">
									<i class="glyphicon glyphicon-ok"></i> 确认修改
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $__env->make('Compile.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<script type="text/javascript">$(function() {
			$('#admin-global-submit').click(function() {
				var title = $('#admin-global-title').val();
				var key = $('#admin-global-key').val();
				var des = $('#admin-global-des').val();
				var icon = $('#admin-global-icon').val();
				var version = $('#admin-global-version').val();
				var cnzz = $('#admin-global-cnzz').val();
				var headAddCode = $('#admin-global-headAddCode').val();
				//		alert(title + '\n' + key);
				$.ajax({
					type: "post",
					url: "<?php echo e(URL::to('/admin/global')); ?>",
					data: {
						'title': title,
						'key': key,
						'des': des,
						'icon': icon,
						'version': version,
						'cnzz': cnzz,
						'headAddCode': headAddCode
					},
					success: function(msg) {
						var prompt=(msg=='1')?'修改成功  (*＾-＾*)':'修改失败 ○|￣|_';
						layer.ready(function() {
							layer.msg(prompt);
						});
					}
				});
			});
			$('#admin-index-submit').click(function() {
				var indexMessage = $('#admin-index-indexMessage').val();
				var indexBarragerImg = $('#admin-index-indexBarragerImg').val();
				var indexBarragerInfo = $('#admin-index-indexBarragerInfo').val();
				var indexBarragerLink = $('#admin-index-indexBarragerLink').val();
				$.ajax({
					type: "post",
					url: "<?php echo e(URL::to('/admin/index')); ?>",
					data: {
						'indexMessage': indexMessage,
						'indexBarragerImg': indexBarragerImg,
						'indexBarragerInfo': indexBarragerInfo,
						'indexBarragerLink': indexBarragerLink,
					},
					success: function(msg) {
						var prompt=(msg=='1')?'修改成功  (*＾-＾*)':'修改失败 ○|￣|_';
						layer.ready(function() {
							layer.msg(prompt);
						});
					}
				});
			});
			$('#admin-foot-submit').click(function() {
				var footDes = $('#admin-foot-footDes').val();
				var footRecord = $('#admin-foot-footRecord').val();
				var footEmail = $('#admin-foot-footEmail').val();
				var footCopy = $('#admin-foot-footCopy').val();
				$.ajax({
					type: "post",
					url: "<?php echo e(URL::to('/admin/foot')); ?>",
					data: {
						'footDes': footDes,
						'footRecord': footRecord,
						'footEmail': footEmail,
						'footCopy': footCopy,
					},
					success: function(msg) {
						var prompt=(msg=='1')?'修改成功  (*＾-＾*)':'修改失败 ○|￣|_';
						layer.ready(function() {
							layer.msg(prompt);
						});
					}
				});
			});
			$('#admin-editor-submit').click(function() {
				var editorTitle = $('#admin-editor-editorTitle').val();
				var editorTheme = $('#admin-editor-editorTheme').val();
				var editorHeight = $('#admin-editor-editorHeight').val();
				$.ajax({
					type: "post",
					url: "<?php echo e(URL::to('/admin/editor')); ?>",
					data: {
						'editorTitle': editorTitle,
						'editorTheme': editorTheme,
						'editorHeight': editorHeight,
					},
					success: function(msg) {
						var prompt=(msg=='1')?'修改成功  (*＾-＾*)':'修改失败 ○|￣|_';
						layer.ready(function() {
							layer.msg(prompt);
						});
					}
				});
			});
			$('#admin-list-submit').click(function() {
				var defaultTitle = $('#admin-list-defaultTitle').val();
				var paginateCount = $('#admin-list-paginateCount').val();
				var listCodeLength = $('#admin-list-listCodeLength').val();
				$.ajax({
					type: "post",
					url: "<?php echo e(URL::to('/admin/list')); ?>",
					data: {
						'defaultTitle': defaultTitle,
						'paginateCount': paginateCount,
						'listCodeLength': listCodeLength,
					},
					success: function(msg) {
						var prompt=(msg=='1')?'修改成功  (*＾-＾*)':'修改失败 ○|￣|_';
						layer.ready(function() {
							layer.msg(prompt);
						});
					}
				});
			});
		});
		</script>
		<script src="//cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>
