@extends('layout.main')

@section('title','友情链接')

@section('head')
    <style>
        .panel-heading a {
            color: #FF6D00;
        }
    </style>

@endsection

@section('body')
    <div class="row m-t-md">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>站长推荐的一些学习编程的网站
                        <small>纯属个人观点，排名当然分先后</small>
                    </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="alert alert-success col-md-10 col-md-offset-1 text-center" role="alert">
                            <span style="font-size: 18px;">文字类</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading tooltip-demo">
                                    <a href="http://www.runoob.com/" target="_blank" data-toggle="tooltip"
                                       data-placement="right" title="走 , 去瞧一瞧 O(∩_∩)O~">菜鸟教程</a>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        &nbsp;&nbsp;&nbsp;&nbsp;菜鸟教程的 Slogan 为：学的不仅是技术，更是梦想！ 记住：再牛逼的梦想也抵不住傻逼似的坚持！ <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;本站包括了HTML、CSS、Javascript、PHP、C、Python等各种基础编程教程。
                                        同时本站中也提供了大量的在线实例，通过实例，您可以更好地学习如何建站。 本站致力于推广各种编程..
                                    </p>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading tooltip-demo">
                                    <a href="http://www.w3school.com.cn/" target="_blank" data-toggle="tooltip"
                                       data-placement="right" title="走 , 去瞧一瞧 O(∩_∩)O~">W3school</a>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        &nbsp;&nbsp;&nbsp;&nbsp;领先的 Web 技术教程 - 全部免费 <br>

                                        &nbsp;&nbsp;&nbsp;&nbsp;在 w3school，你可以找到你所需要的所有的网站建设教程。 <br>

                                        &nbsp;&nbsp;&nbsp;&nbsp;从基础的 HTML 到 CSS，乃至进阶的XML、SQL、JS、PHP 和 ASP.NET。<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-success">
                                <div class="panel-heading tooltip-demo">
                                    <a href="http://www.liaoxuefeng.com/" target="_blank" data-toggle="tooltip"
                                       data-placement="right" title="走 , 去瞧一瞧 O(∩_∩)O~">廖雪峰的官方网站</a>
                                </div>
                                <div class="panel-body">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;研究互联网产品和技术，提供原创中文精品教程</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-md">
                        <div class="alert alert-info col-md-10 col-md-offset-1 text-center" role="alert">
                            <span style="font-size: 18px;">视频类</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading tooltip-demo">
                                    <a href="http://www.imooc.com/" target="_blank" data-toggle="tooltip"
                                       data-placement="right" title="走 , 去瞧一瞧 O(∩_∩)O~">慕课网</a>
                                </div>
                                <div class="panel-body">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;慕课网是垂直的互联网IT技能免费学习网站。以独家视频教程、在线编程工具、学习计划、问答社区为核心特色。<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;在这里，你可以找到最好的互联网技术牛人，也可以通过免费的在线公开视频课程学习国内领先的互联网IT技术。</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-warning">
                                <div class="panel-heading tooltip-demo">
                                    <a href="http://www.jikexueyuan.com/" target="_blank" data-toggle="tooltip"
                                       data-placement="right" title="走 , 去瞧一瞧 O(∩_∩)O~">极客学院</a>
                                </div>
                                <div class="panel-body">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;极客学院职业培训涵盖前端，后端，移动全品类。Web、Java、Python、Go、iOS、Android、PHP等各学科依据职业需求设计课程，根据个人学习计划提供视频、图文、答疑、一对一作业批改、推荐就业等服务。
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading tooltip-demo">
                                    <a href="https://www.jisuanke.com/" target="_blank" data-toggle="tooltip"
                                       data-placement="right" title="走 , 去瞧一瞧 O(∩_∩)O~">计蒜客</a>
                                </div>
                                <div class="panel-body">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;计蒜客是学习计算机相关领域知识(编程、算法、开发、计算机理论)最便捷的渠道，其趣味盎然的交互方式让你可以和朋友一起轻松学习。</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading tooltip-demo">
                                    <a href="https://www.shiyanlou.com/" target="_blank" data-toggle="tooltip"
                                       data-placement="right" title="走 , 去瞧一瞧 O(∩_∩)O~">实验楼</a>
                                </div>
                                <div class="panel-body">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;
                                        实验楼是一个IT在线学习网站，为用户提供的不是视频，而是配置好的虚拟机，通过虚拟的实验环境，学习者可边看文档边动手操作，从而提高学习者的动手实践能力，而且实验楼虚拟环境不只是简单的在线编译器，可以支持更广泛的
                                        IT 内容学习，不再局限于编程领域，为用户提供的是一站式的IT在线动手实践环境。
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel panel-success">
                                <div class="panel-heading tooltip-demo">
                                    <a href="http://study.163.com/" target="_blank" data-toggle="tooltip"
                                       data-placement="right" title="走 , 去瞧一瞧 O(∩_∩)O~">网易云课堂</a>
                                </div>
                                <div class="panel-body">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;网易云课堂，是网易公司倾力打造的在线实用技能学习平台。<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;立足于实用性的要求，云课堂精选各类课程，与多家权威教育、培训机构建立合作，课程数量已达10000+，课时总数超100000，涵盖实用软件、IT与互联网、外语学习、考试认证等十余大门类，其中不乏数量可观、制作精良的独家课程。</p>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


@endsection