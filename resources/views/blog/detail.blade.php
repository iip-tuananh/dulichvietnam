@extends('layouts.main.master')
@section('title')
{{languageName($blog_detail->title)}}
@endsection
@section('description')
{{languageName($blog_detail->description)}}
@endsection
@section('image')
{{url(''.$blog_detail->image)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/evo-article.scss.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
@endsection
@section('content')
<section class="bread-crumb margin-bottom-10">
	<div class="container">
	<ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
		<li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			<a itemprop="item" href="{{route('home')}}" title="Home">
				<span itemprop="name">Home</span>
				<meta itemprop="position" content="1" />
			</a>
		</li>
		<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			<a itemprop="item" href="{{route('allListBlog')}}" title="Blogs">
				<span itemprop="name">Blogs</span>
				<meta itemprop="position" content="2" />
			</a>
		</li>
		<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			<strong itemprop="name">{{languageName($blog_detail->title)}}</strong>
			<meta itemprop="position" content="3" />
		</li>
	</ul>
	</div>
</section>
<div class="container article-wraper margin-top-20 margin-bottom-20">
	<div class="row">
	<section class="right-content col-md-12 col-lg-9">
		<article class="article-main">
			<div class="row">
				<div class="col-md-12 evo-article margin-bottom-10">
				<h1 class="title-head">{{languageName($blog_detail->title)}}</h1>
				<div class="article-details evo-toc-content">
					{!!languageName($blog_detail->content)!!}
				</div>
				</div>
				<div class="col-md-12 margin-bottom-10 fix-ar">
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12 margin-bottom-10">
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a099baca270babc"></script>
				<div class="addthis_inline_share_toolbox_0gnu"></div>
				</div>
			</div>
		</article>
	</section>
	<aside class="evo-toc-sidebar evo-sidebar sidebar left-content col-md-12 col-lg-3 margin-top-15">
		<aside class="aside-item top-news margin-top-20">
		<div class="aside-title">
			<h3 class="title-head margin-top-0"><a href="tin-tuc" title="FAVORITE ARTICLE">FAVORITE ARTICLE</a></h3>
		</div>
		@foreach ($hotBlogs as $blog)
		<article class="item clearfix">
			<a href="{{route('detailBlog', ['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}" class="thumb">
			<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$blog->image}}" alt="{{languageName($blog->title)}}" class="lazy img-responsive center-block" loading="lazy" />
			</a>
			<div class="info">
				<h4 class="title usmall"><a href="{{route('detailBlog', ['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}">{{languageName($blog->title)}}</a></h4>
			</div>
		</article>
		@endforeach
		</aside>
		@if (isset($$bannerAds[2]))
		<aside class="aside-item blog-banner margin-top-30">
		<a href="{{$bannerAds[2]->name}}" title="" class="single_image_effect">
		<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$bannerAds[2]->image}}" alt="" class="lazy img-responsive mx-auto d-block" loading="lazy" />
		</a>
		</aside>
		@endif
	</aside>
	</div>
</div>
@endsection