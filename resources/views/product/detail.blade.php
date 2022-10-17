@extends('layouts.main.master')
@section('title')
{{languageName($product->name)}}
@endsection
@section('description')
{{languageName($product->description)}}
@endsection
@section('image')
@php
   $imgs = json_decode($product->images);
   $discountPrice = $product->price - $product->price * ($product->discount / 100);
@endphp
{{url(''.$imgs[0])}}
@endsection
@section('css')
<link href="{{asset('frontend/css/evo-products.scss.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<style>
   .swiper {
      width: 100%;
      margin-left: auto;
      margin-right: auto;
   }

   .swiper-slide {
      background-size: cover;
      background-position: center;
   }

   .mySwiper2 {
      height: 80%;
      width: 100%;
   }
   .mySwiper {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
   }

   .mySwiper .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
      border-radius: 10px;
   }
   .mySwiper .swiper-slide img{
      border-radius: 10px;
   }

   .mySwiper .swiper-slide-thumb-active {
      opacity: 1;
   }

   .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
   }

   .swiper-slide img {
      display: block;
      width: 100%;
      /* height: 100%; */
      object-fit: cover;
   }

   .ct_course_list .tour-route span:last-child i {
      display: none;
   }
   #popup{
      display: none;
   }
   .popup-container{
      height: 100%;
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      background-color: rgb(96 95 127 / 70%);
      position: fixed;
      top: 0;
      left: 0;
      z-index: 9999;
   }
   .popup{
      background-color: #ffffff;
      padding: 20px 30px;
      width: 50%;
      border-radius: 15px;
   }
   .close-popup{
      display: flex;
      justify-content: flex-end;
   }
   .close-popup a{
      font-size: 1.2rem;
      background-color: #1ba0e2;
      color: #fff;
      padding: 5px 10px;
      font-weight: bold;
      text-decoration: none;
      border-radius: 10px;
      display: inline-block;
   }
   .popup .form-group label{
      font-weight: 600;
   }
   .popup .form-group label span{
      color: red;
   }
   .popup .form-group .form-control{
      border-radius: 10px;
   }
   .popup .form-group{
      margin-bottom: 15px;
   }
   .popup-btn{
      display: inline-block;
      text-decoration: none;
      border: 2px solid #1ba0e2;
      padding: 5px 15px;
      border-radius: 20px;
      margin: 10px 0px;
      transition: .2s all ease-in;
   }
   .popup-btn:hover{
      background-color: #1ba0e2;
      color: #fff;
   }
</style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
   var swiper = new Swiper(".mySwiper", {
   spaceBetween: 10,
   slidesPerView: 5,
   freeMode: true,
   watchSlidesProgress: true,
   });
   var swiper2 = new Swiper(".mySwiper2", {
   spaceBetween: 10,
   navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
   },
   thumbs: {
      swiper: swiper
   },
   });
</script>
<script>
   $('.evo-owl-product').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
         0:{
               items:1
         },
         600:{
               items:2
         },
         1000:{
               items:3
         }
      }
   })
</script>
<script>
   $(document).ready(function () {
      var modal = $('#popup');
      var btn = $('#clickBtn');
      var span = $('#closeBtn');

      btn.click(function () {
         modal.show();         
      });

      span.click(function () {
         modal.hide();
      });

      $(window).on('click', function (e) {
         if ($(e.target).is('.popup')) {
            modal.hide();
         }
      });
      });
</script>
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
            <a itemprop="item" href="{{route('allListProCate',['cate'=>$product->cate_slug])}}" title="{{languageName($product->cate->name)}}">
               <span itemprop="name">{{languageName($product->cate->name)}}</span>
               <meta itemprop="position" content="2" />
            </a>
         </li>
         <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name">{{languageName($product->name)}}</span>
            <meta itemprop="position" content="3" />
         </li>
      </ul>
   </div>
</section>
<section class="product product-margin" itemscope itemtype="http://schema.org/Product">
   <div class="container">
      <div class="row details-product">
         <div class="col-lg-8 col-md-12 col-sm-12 col-12 no-padding-right order-last order-lg-first">
            <div class="relative product-image-block">
               <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                  <div class="swiper-wrapper">
                     @foreach ($imgs as $img)
                        <div class="swiper-slide">
                           <img src="{{$img}}" loading="lazy" />
                        </div>
                     @endforeach
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
               </div>
               <div thumbsSlider="" class="swiper mySwiper">
                  <div class="swiper-wrapper">
                     @foreach ($imgs as $img)
                        <div class="swiper-slide">
                           <img src="{{$img}}" loading="lazy" />
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="product-bg-white evo-tour-main-content">
               <div id="tour-schedule" class="evo-tour-block">
                  <div class="tour-schedule-title">Detail Tour</div>
                  <div class="rte">
                     {!!languageName($product->content)!!}
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-12 col-sm-12 col-12 details-pro order-first order-lg-last">
            <div class="sticky-top">
               <div class="product-bg-white">
                  <div class="product-with-wish-list">
                     <h1 class="title-head">{{languageName($product->name)}}</h1>
                  </div>
                  <div>
                     <div class="inventory_quantity d-none">
                        <span class="stock-brand-title">Tình trạng:</span>
                     </div>
                     <div class="price-box clearfix">
                        @if ($product->discount > 0)
                        <span class="old-price">
                           <del class="price product-price-old">
                           {{$product->price}} USD
                           </del>
                           </span>
                           <span class="special-price">Price:
                           <span class="price product-price">{{$discountPrice}} USD</span>
                           </span> <!-- Giá Khuyến mại -->
                           <span class="save-price">Tiết kiệm
                           <span class="price product-price-save">-{{$product->discount}}%</span>
                        </span> <!-- Tiết kiệm -->
                        @else
                        <span class="special-price">Price:
                           <span class="price product-price">{{$product->price}} USD</span>
                        </span> <!-- Giá Khuyến mại -->
                        @endif
                     </div>
                  </div>
                  <ul class="ct_course_list">
                     <li>
                        <img src="{{url('frontend/images/product_tab1_icon.svg')}}" alt="Type Tour" />
                        Tour Type: <span class="tag-color">{{$product->type_tour}}</span>
                     </li>
                     <li>
                        <img src="{{url('frontend/images/tag_icon_4.svg')}}" alt="Duration" />
                        Duration: <span class="tag-color">{{$product->date_tour}}</span>
                     </li>
                     <li class="tour-route">
                        <img src="{{url('frontend/images/tag_icon_5.svg')}}" alt="Tour Route" />
                        Tour Route: 
                        @foreach (json_decode($product->preserve) as $item)
                        <span class="tag-color">{{$item->detail}} <i class="fas fa-arrow-right"></i></span>
                        @endforeach
                     </li>
                  </ul>
                  <div class="evo-product-summary product_description margin-top-5">
                     <div class="rte description rte-summary">
                        {!!languageName($product->description)!!}
                     </div>
                  </div>
                  <div class="call-me-back">
                     <ul class="row">
                        <li class="col-lg-6 col-md-6 col-sm-6 col-6">
                           <a href="javascript:void(0);" title="Booking Tour" class="icon-mouse-scroll" id="clickBtn">Booking Tour</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @if (count($productlq) > 1)
   <div class="container product-gray product_recent">
      <div class="row">
         <div class="col-lg-12">
            <div class="product-bg-white">
               <div class="related-product">
                  <div class="home-title text-center">
                     <h2>Similar Tours</h2>
                  </div>
                  <div class="evo-owl-product clearfix owl-carousel owl-theme">
                     @foreach ($productlq as $pro)
                     @if ($product->id != $pro->id)
                        <div class="item">
                           @include('layouts.product.item', ['product'=>$pro])
                        </div>
                     @endif
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endif
</section>
<div id="popup">
   <div class="popup-container">
      <div class="popup">
         <div class="close-popup" id="closeBtn"><a href="#">X</a></div>
         <h2>Booking here!!!</h2>
         <form action="{{route('postcontact')}}" method="post">
            @csrf
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                        <label for="name">Name <span>*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                        <label for="name">Phone Number <span>*</span></label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}" required>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                        <label for="email">Email <span>*</span></label>
                        <input type="mail" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                        <label for="number_people">People Number <span>*</span></label>
                        <input type="number" min="0" class="form-control" name="number_people" id="number_people" value="{{old('number_people')}}" required>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                        <label for="date_start">Date Start </label>
                        <input type="date" class="form-control" name="date_start" id="date_start" value="{{old('date_start')}}" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                        <label for="date_finish">Date Finish </label>
                        <input type="date" class="form-control" name="date_finish" id="date_finish" value="{{old('date_finish')}}" required>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                        <label for="tour_name">Tour Name </label>
                        <input type="text" class="form-control" name="tour_name" id="tour_name" value="{{languageName($product->name)}}" required>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                        <label for="mess">Your Requirements </label>
                        <textarea name="mess" id="mess" cols="30" rows="2" class="form-control"></textarea>
                  </div>
               </div>
            </div>
            
            <button type="submit" class="popup-btn">Booking</button>
         </form>
      </div>
   </div>
</div>
@endsection