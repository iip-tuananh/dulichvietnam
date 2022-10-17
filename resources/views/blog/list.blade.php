@extends('layouts.main.master')
@section('title')
{{$title_page}} 
@endsection
@section('description')
{{$title_page}}
@endsection
@section('image')
{{url(''.$banners[0]->image)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/evo-blogs.scss.css')}}" rel="stylesheet" type="text/css" />
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
            <strong itemprop="name">{{$title_page}}</strong>
            <meta itemprop="position" content="2" />
         </li>
      </ul>
   </div>
</section>
<div class="container margin-top-10 margin-bottom-20" itemscope itemtype="http://schema.org/Blog">
   <div class="row">
      <div class="col-md-12 col-lg-9">
         <div class="evo-list-blog-page margin-top-15">
            <h1 class="title-head d-none">{{$title_page}}</h1>
            <section class="list-blogs blog-main">
               <div class="row">
                  @foreach ($blogs as $blog)
                  <div class="col-md-6 col-sm-6 col-12 clearfix fix-blog-col-small">
                     <article class="blog-item clearfix">
                        <a class="entry-header" href="{{route('detailBlog', ['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$blog->image}}" alt="{{languageName($blog->title)}}" class="lazy img-responsive center-block" loading="lazy" />
                        </a>
                        <h3 class="entry-title title">
                           <a href="{{route('detailBlog', ['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}">{{languageName($blog->title)}}</a>
                        </h3>
                        <p class="desc-blog ">
                           {{languageName($blog->description)}}
                        </p>
                     </article>
                  </div>
                  @endforeach
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="text-xs-right text-center pagging-css">
                        {{$blogs->links()}}
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
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
         <aside class="aside-item blog-banner margin-top-30">
            <a href="{{$bannerAds[2]->name}}" title="" class="single_image_effect">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$bannerAds[2]->image}}" alt="" class="lazy img-responsive mx-auto d-block" loading="lazy" />
            </a>
         </aside>
      </aside>
   </div>
</div>
@endsection