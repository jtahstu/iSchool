<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo e(URL::to('/')); ?>">
				iTool
			</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="http://www.usta.wiki" target="_blank">
						iSchool
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						常用语言 <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/1">
								C/C++
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/4">
								Java
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/5">
								Python
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/7">
								Python3
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/6">
								C#
							</a>
						</li>

					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Web开发 <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/2">
								HTML/CSS/JS
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/3">
								PHP
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/10">
								Ruby
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/14">
								Node.js
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/13">
								Go
							</a>
						</li>

					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						iOS开发 <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/8">
								Objective-C
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/9">
								Swift
							</a>
						</li>

					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						脚本语言 <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/12">
								Bash
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/11">
								Perl
							</a>
						</li>

						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/15">
								Lua
							</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						小众语言 <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">

						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/16">
								Scala
							</a>
						</li>
						<li>
							<a href="<?php echo e(URL::to('/')); ?>/compile/17">
								Pescal
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo e(URL::to('/')); ?>/share">
						代码归档
					</a>
				</li>
				<li>
					<a href="<?php echo e(URL::to('/')); ?>/discuss">
						讨论交流
					</a>
				</li>
				<li>
					<a href="<?php echo e(URL::to('/')); ?>/login">
						su - root
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>