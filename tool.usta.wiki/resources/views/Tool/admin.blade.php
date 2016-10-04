<!DOCTYPE html>
<html>

	<head>
		@include('Compile.head')
	</head>

	<body data-spy="scroll" data-target="#myScrollspy">
		@include('Compile.header')
		<div class="container" id="admin">
			<div class="jumbotron" id="admin-jumbotron">
				<h2>iTool后台管理系统 &nbsp;&nbsp;<small>Version: {{Config::get('itool.version')}} by jtahstu .</small></h2>
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
						<li>
							<a href="#section-6">
								代码分享页
							</a>
						</li>
					</ul>
				</div>
				<div class="col-sm-10" id="admin-section">
					<h2 id="section-1">全局配置</h2>
					<div id="admin-global">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">网站标题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.title')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">网站关键词：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.key')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">网站介绍：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.des')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">网站图标：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.icon')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">当前版本：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.version')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">分页代码数：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.paginateCount')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">统计代码：</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="3">{{Config::get('itool.cnzz')}}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">添加头部代码：</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="3">{{Config::get('itool.headAddCode')}}</textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success" id="admin-global-submit">
									<i class="glyphicon glyphicon-ok"></i> 确认修改
									</button>
								</div>
							</div>
						</form>
					</div>
					<hr>
					<h2 id="section-2">首页</h2>
					<div id="admin-index">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">首页下拉框：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.indexMessage')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">弹幕图片：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.indexBarragerImg')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">弹幕文字：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.indexBarragerInfo')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">弹幕链接：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.indexBarragerLink')}}">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-warning" id="admin-index-submit">
									<i class="glyphicon glyphicon-ok"></i> 确认修改
									</button>
								</div>
							</div>
						</form>
					</div>
					<hr>
					<h2 id="section-3">脚部</h2>
					<div id="admin-foot">
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">站点介绍：</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="3">{{Config::get('itool.footDes')}}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">备案号：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.footRecord')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">邮箱：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.footEmail')}}">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">站点声明：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.footCopy')}}">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-info" id="admin-foot-submit">
									<i class="glyphicon glyphicon-ok"></i> 确认修改
									</button>
								</div>
							</div>
						</form>
					</div>
					<hr>
					<h2 id="section-4">代码编辑页</h2>
					<form class="form-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">标题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.editorTitle')}}">
								</div>
							</div>
						<div class="form-group">
								<label for="" class="col-sm-2 control-label">编辑器主题：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.editorTheme')}}">
								</div>
						</div>
						<div class="form-group">
								<label for="" class="col-sm-2 control-label">编辑器高度：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="" value="{{Config::get('itool.editorHeight')}}">
								</div>
						</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary" id="admin-foot-submit">
									<i class="glyphicon glyphicon-ok"></i> 确认修改
									</button>
								</div>
							</div>
					</form>
					<hr>
					<h2 id="section-5">代码归档页</h2>
					<p>
						Nam eget purus nec est consectetur vehicula. Nullam ultrices nisl risus, in viverra libero egestas sit amet. Etiam porttitor dolor non eros pulvinar malesuada. Vestibulum sit amet est mollis nulla tempus aliquet. Praesent luctus hendrerit arcu non laoreet. Morbi consequat placee lectus volutpat, consequat lorem sit amet, pulvinar tellus. In tincidunt vel leo eget pulvinar. Curabitur a eros non lacus malesuada aliquam. Praesent et tempus odio. Integer a quam nunc. In hac habitasse platea dictumst. Aliquam porta nibh nulla, et mattis turpis placerat eget. Pellentesque dui diam, pellentesque vel gravida id, accumsan eu magna. Sed a semper arcu, ut dignissim leo.
					</p>
					<p>
						Sed vitae lobortis diam, id molestie magna. Aliquam consequat ipsum quis est dictum ultrices. Aenean nibh velit, fringilla in diam id, blandit hendrerit lacus. Donec vehicula rutrum tellus eget fermentum. Pellentesque ac erat et arcu ornare tincidunt. Aliquam erat volutpat. Vivamus lobortis urna quis gravida semper. In condimentum, est a faucibus luctus, mi dolor cursus mi, id vehicula arcu risus a nibh. Pellentesque blandit sapien lacus, vel vehicula nunc feugiat sit amet.
					</p>
					<hr />
					<h2 id="section-6">代码分享页</h2>
					<p>
						....
					</p>
				</div>
			</div>
		</div>
		@include('Compile.footer')
		<script src="//cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>
