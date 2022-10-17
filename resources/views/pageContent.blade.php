@extends('layouts.main.master')
@section('title')
{{$pagecontentdetail->title}}
@endsection
@section('description')
{{$pagecontentdetail->title}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<main class="main">
    <div class="banner-page position-relative">
       <img src="https://sudospaces.com/phonglien-vn/2021/07/background-product-1.png" alt="{{$pagecontentdetail->title}}">
       <div class="content-banner-page text-center position-center-auto left-0 right-0">
          <h2>{{$pagecontentdetail->title}}</h2>
       </div>
    </div>
    <div class="container">
       <div class="breadcrumbs">
          <ul>
             <li><a href="{{route('home')}}">Trang chủ</a></li>
             <li><a href="{{url()->current()}}">{{$pagecontentdetail->title}}</a></li>
          </ul>
       </div>
    </div>
    <div class="container mg-b-30">
       <div class="row">
          <div class="col col-lg-12">
             <article class="single-article bg-sm-white pd-sm-30">
                <header>
                   <h1 class="main-title">{{$pagecontentdetail->title}}</h1>
                </header>
                <div class="css-content">
                   {!!$pagecontentdetail->content!!}
                </div>
             </article>
          </div>
       </div>
    </div>
 </main>
@endsection