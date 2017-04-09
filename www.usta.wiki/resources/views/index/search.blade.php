@extends('layout/main')

@section('title','检索')

@section('nav_li')
    @foreach($courses as $key=>$course)
        <li>
            <a href="{{ URL::action('CourseController@show',['course'=>$course->url]) }}">
                <i class="fa fa-sitemap"></i> <span class="nav-label">{{ $course->name }} 教程</span>
            </a>
        </li>
    @endforeach

@endsection

@section('body')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <h2>
                            2,160 results found for: <span class="text-navy">" {{ $words }} "</span>
                        </h2>

                        <div class="hr-line-dashed"></div>
                        <div class="search-result">
                            <h3><a href="#">INSPINIA IN+ Admin Theme</a></h3>
                            <a href="#" class="search-link">www.inspinia.com/inspinia</a>
                            <p>
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites
                                still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </p>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="search-result">
                            <h3><a href="#">WrapBootstrap - Bootstrap Themes & Templates</a></h3>
                            <a href="#" class="search-link">https://wrapbootstrap.com/‎</a>
                            <p>
                                WrapBootstrap is a marketplace for premium Bootstrap themes and templates. Impress your clients and visitors while using a single, rock-solid foundation.
                            </p>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="search-result">
                            <h3><a href="#">WrapBootstrap | Facebook</a></h3>
                            <a href="#" class="search-link">https://www.facebook.com/wrapbootstrap‎</a>
                            <p>
                                WrapBootstrap. 13672 likes · 508 talking about this. Marketplace for premium Bootstrap themes and templates. https://wrapbootstrap.com/
                            </p>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="search-result">
                            <h3><a href="#">Wrapbootstrap - Quora</a></h3>
                            <a href="#" class="search-link">www.quora.com/Wrapbootstrap‎‎</a>
                            <p>
                                If you are familiar with using any other HTML/CSS themes or WordPress themes then you shouldn't have any problems. If you have some experience using the ...
                            </p>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="search-result">
                            <h3><a href="#">Newspaper Template - Wrapbootstrap Free download ...</a></h3>
                            <a href="#" class="search-link">https://wrapbootstrap.com/‎‎</a>
                            <p>
                                What's black, white and red all over? The answer is Newspaper. A stylish magazine/news style theme inspired by black and white newsprint. The theme is.
                            </p>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="search-result">
                            <h3><a href="#">Admin Themes Wrapbootstrap</a></h3>
                            <a href="#" class="search-link">https://wrapbootstrap.com/themes/admin‎‎</a>
                            <p>
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                        </div>
                        <div class="hr-line-dashed"></div>

                    </div>
                </div>
            </div>
    @endsection