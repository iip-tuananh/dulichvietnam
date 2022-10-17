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
@endsection
@section('content')
<main id="main" class="">
<div id="content" class="blog-wrapper blog-archive page-wrapper">
    <header class="archive-page-header">
        <div class="row">
            <div class="large-12 text-center col">
            <h1 class="page-title is-large uppercase" align="left">
                <span>{{$title_page}}</span>	
            </h1>
            </div>
        </div>
    </header>
    <div class="row row-large row-divided ">
        <div class="large-9 col">
            <div class="row large-columns-3 medium-columns- small-columns-1">
            @foreach ($services as $service)
                <div class="col post-item" >
                    <div class="col-inner">
                        <a href="{{route('serviceDetail', ['slug'=>$service->slug])}}" class="plain">
                        <div class="box box-text-bottom box-blog-post has-hover">
                            <div class="box-image" >
                                <div class="image-cover" style="padding-top:56%;">
                                    <img width="600" height="375" src="{{$service->image}}" class="attachment-medium size-medium wp-post-image" alt="{{$service->name}}" loading="lazy" />  							  							  						
                                </div>
                            </div>
                            <div class="box-text text-left" >
                                <div class="box-text-inner blog-post-inner">
                                    <h5 class="post-title is-large ">{{$service->name}}</h5>
                                    <div class="is-divider"></div>
                                    <p class="from_the_blog_excerpt ">{!!languageName($service->description)!!}</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="paginate">
                {{$services->links()}}
            </div>
        </div>
        @include('layouts.main.rightnav-page')
    </div>
</div>
</main>
@endsection