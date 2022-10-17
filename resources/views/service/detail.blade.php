@extends('layouts.main.master')
@section('title')
{{($detail_service->name)}}
@endsection
@section('description')
{{($detail_service->description)}}
@endsection
@section('image')
{{url(''.$detail_service->image)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/blog_article_style.scss.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('frontend/css/sidebar_style.scss.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
@endsection
@section('content')
<section class="bread-crumb" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.2) 0%,rgba(255,255,255,0.2) 100%), url({{$detail_service->image}});">
	<span class="crumb-border"></span>
	<div class="container">
	<div class="rows">
		<div class="col-xs-12 a-left">
			<p class="title_h1 clearfix">
				{{($detail_service->name)}}
			</p>
			<ul class="breadcrumb" >
				<li class="home">
				<a  href="{{route('home')}}" ><span >Trang chủ</span></a>						
				<span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
				</li>
				<li >
				<a  href="{{route('allListBlog')}}"><span >Chính sách phân phối</span></a>	
				<span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
				</li>
				<li><strong><span >{{($detail_service->name)}}</span></strong></li>
			</ul>
		</div>
	</div>
	</div>
</section>
<section class="blogpage clearfix">
	<div class="container article-wraper" itemscope itemtype="https://schema.org/Article">
	<div class="wrap_background_aside padding-top-0 margin-bottom-40 clearfix">
		<article class="article-main">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="article-details clearfix">
					<h1 class="article-title clearfix">{{($detail_service->name)}}</h1>
					<div class="post-date">
						<span>{{date_format($detail_service->created_at,'d-m-Y')}}</span>
					</div>
					<div class="article-content clearfix">
						<div class="rte">
							{!!languageName($detail_service->content)!!}
						</div>
					</div>
				</div>
				<div class="section clearfix">
					<div class="social-sharing clearfix">
						<span>Chia sẻ bài viết:</span>
						<!-- Go to www.addthis.com/dashboard to customize your tools -->
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58589c2252fc2da4"></script>
						<div class="addthis_inline_share_toolbox"></div>
					</div>
				</div>
				<div class="section bloglq clearfix">
					<h2>
						<a href="#" title="Tin liên quan">Chính sách khác</a>
					</h2>
					<div class="section owlnav_style1">
						<div class="slickblog">
							@foreach ($services as $service)
							@if ($service->id != $detail_service->id)
								<div class="item">
								<div class="blogwp clearfix">
									<a  class="image-blog clearfix" href="{{route('serviceDetail', ['slug'=>$service->slug])}}" title="{{$service->name}}">
									<img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$service->image}}"  alt="{{$service->name}}">
									</a>
									<div class="post-date clearfix"> 
										{!!languageName($service->description)!!}
									</div>
									<h3>
										<a href="{{route('serviceDetail', ['slug'=>$service->slug])}}" title="{{$service->name}}">{{$service->name}}</a>
									</h3>
								</div>
								</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				</div>
			</div>
		</article>
	</div>
	</div>
</section>
<style>
	.post-date{
	overflow: hidden;
	text-overflow: ellipsis;
	display: -webkit-box;
	-webkit-line-clamp: 3; 
	-webkit-box-orient: vertical;
	}
</style>
<script>
	$(document).ready(function ($) {
		$('.slickblog').slick({
			autoplay: true,
			autoplaySpeed: 6000,
			dots: false,
			arrows: false,
			infinite: false,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 4
					}
				},
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3
					}
				},
				{
					breakpoint: 991,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
	});
</script>
@endsection