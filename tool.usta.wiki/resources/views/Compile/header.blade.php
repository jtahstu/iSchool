<header>
	<div id="J_Headerwrap" class="header-wrap" data-spm="2">
		<div class="header-inner y-row">
			<div class="y-span6">
				<a id="J_logo" class="logo" href="{{URL::to('/')}}">
					iTool
				</a>
				<nav id="J_Nav">
					<ul id="J_Menu">
						<li class="nav-1" data-menu="sub_menu_1" data-case="one">
							<h2>iSchool</h2>
						</li>
						<li class="nav-2" data-menu="sub_menu_2" data-case="two">
							<h2>在线工具</h2>
						</li>
						<li class="nav-3" data-menu="sub_menu_3" data-case="three">
							<h2>代码归档</h2>
						</li>
						<li class="nav-4" data-menu="sub_menu_4" data-case="one">
							<h2>更多功能</h2>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div id="J_subMenus" class="sub-menus" style="top: 99px;" data-spm="201">
		<div id="sub_menu_1" class="sub-menu">
			<!--<dl class="first" style="margin-left: 95.5px;">
				<dt>
				弹性计算
				</dt>
				<dd>
					<a data-ga="导航.产品服务.ECS" href="http://www.aliyun.com/product/ecs/">
						云服务器ECS
					</a>
				</dd>
				<dd>
					<a data-ga="导航.产品服务.SLB" href="http://www.aliyun.com/product/slb/">
						负载均衡SLB
					</a>
				</dd>
			</dl>
			<dl>
				<dt>
				数据存储•计算
				</dt>
				<dd>
					<a data-ga="导航.产品服务.RDS" href="http://www.aliyun.com/product/rds/">
						关系型数据库服务RDS
					</a>
				</dd>
				<dd>
					<a data-ga="导航.产品服务.OSS" href="http://www.aliyun.com/product/oss/">
						开放存储服务OSS
					</a>
				</dd>
				<dd>
					<a data-ga="导航.产品服务.CDN" href="http://www.aliyun.com/product/cdn/">
						内容分发网络CDN
					</a>
				</dd>
				<dd>
					<a data-ga="导航.产品服务.OTS" href="http://www.aliyun.com/product/ots/">
						开放结构化数据服务OTS
					</a>
				</dd>
			</dl>-->
		</div>
		<div id="sub_menu_2" class="sub-menu">
			<dl class="first" style="">
				<dt>
				常用语言
				</dt>
				<dd>
					<a data-ga="" href="{{URL::to('compile/1')}}">
						C/C++
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/4')}}">
						Java
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/5')}}">
						Python
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/7')}}">
						Python3
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/6')}}">
						C#
					</a>
				</dd>
			</dl>
			<dl>
				<dt>
				Web开发
				</dt>
				<dd>
					<a data-ga="" href="{{URL::to('compile/2')}}">
						HTML/CSS/JS
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/3')}}">
						PHP
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/10')}}">
						Ruby
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/14')}}">
						Node.js
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/13')}}">
						Go
					</a>
				</dd>

			</dl>
			<dl>
				<dt>
				iOS开发
				</dt>
				<dd>
					<a data-ga="" href="{{URL::to('compile/8')}}">
						Objective-C
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/9')}}">
						Swift
					</a>
				</dd>
			</dl>
			<dl>
				<dt>
				脚本语言
				</dt>
				<dd>
					<a data-ga="" href="{{URL::to('compile/12')}}">
						Bash
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/11')}}">
						Perl
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/15')}}">
						Lua
					</a>
				</dd>
			</dl>
			<dl>
				<dt>
				小众语言
				</dt>
				<dd>
					<a data-ga="" href="{{URL::to('compile/17')}}">
						Pescal
					</a>
				</dd>
				<dd>
					<a data-ga="" href="{{URL::to('compile/16')}}">
						Scala
					</a>
				</dd>

			</dl>
		</div>
		<div id="sub_menu_3" class="sub-menu">
			<dl class="first" style="">
				<dd>
					<a href="{{URL::to('/share')}}">
						第一页
					</a>
				</dd>
			</dl>
			@for ($i = 2; $i <= $sharePaginate->lastPage(); $i++)
			<dl>
				<dd>
					<a href="{{URL::to("/share?page=")}}{{$i}}">
						第<?php echo numToWord($i); ?>页
					</a>
				</dd>
			</dl>
			@endfor
		</div>
		<div id="sub_menu_4" class="sub-menu">
			<dl class="first" style="">
				<dd>
					<a data-ga="" href="{{URL::to('/search')}}">
						在线搜索
					</a>
				</dd>
			</dl>
			<dl>
				<dd>
					<a href="{{URL::to('/discuss')}}">
						讨论交流
					</a>
				</dd>
			</dl>
			<dl>
				<dd>
					<a href="{{URL::to('/login')}}">
						su - root
					</a>
				</dd>
			</dl>
		</div>
	</div>
</header>
<script src="http://g.tbcdn.cn/kissy/k/1.4.3/seed-min.js"></script>
<script type="text/javascript" src="{{asset('/public/js/header.js')}}"></script>
