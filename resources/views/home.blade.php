@extends('layouts.main.master')
@section('title')
{{$setting->company}}
@endsection
@section('description')
{{$setting->webname}}
@endsection
@section('image')
{{url(''.$banners[0]->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<section class="awe-section-1">
   <div class="home-slider">
      @foreach ($banners as $banner)
         <div class="item">
            <a href="{{$banner->link}}" class="clearfix" title="{{$setting->company}}">
               <picture>
                  <source 
                     media="(min-width: 1200px)"
                     srcset="{{$banner->image}}">
                  <source 
                     media="(min-width: 992px)"
                     srcset="{{$banner->image}}">
                  <source 
                     media="(min-width: 569px)"
                     srcset="{{$banner->image}}">
                  <source 
                     media="(min-width: 480px)"
                     srcset="{{$banner->image}}">
                  <img 
                     src="{{$banner->image}}" 
                     alt="{{$setting->company}}" class="lazy img-responsive mx-auto d-block" loading="lazy" />
               </picture>
            </a>
         </div>
      @endforeach
   </div>
   {{-- <div class="evo-tour-search-index">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 evo-tour-search-title">
               <h2>Đặt Tour du lịch!</h2>
               <p>Hơn 300 tours du lịch ở Việt Nam và Quốc tế</p>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="evo-main-search">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="input_group group_a">
                           <img src="https://bizweb.dktcdn.net/100/372/532/themes/744930/assets/place-localizer.svg?1663906214480" alt="Địa điểm" />
                           <input type="text" aria-label="Bạn muốn đi đâu?" autocomplete="off" placeholder="Bạn muốn đi đâu?" id="name" class="form-control form-hai form-control-lg" />
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-5 col-sm-5 col-12 fix-ipad1">
                        <div class="group-search abs">
                           <div class="group-search-icon">
                              <img src="https://bizweb.dktcdn.net/100/372/532/themes/744930/assets/date.svg?1663906214480" alt="Tìm kiếm" />
                           </div>
                           <div class="group-search-content">
                              <p>Ngày khởi hành</p>
                              <input class="tourmaster-datepicker" id="dates" type="text" placeholder="Chọn Ngày khởi hành" data-date-format="dd MM yyyy" readonly="readonly" />
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-5 col-sm-5 col-12 fix-ipad2">
                        <div class="group-search ab">
                           <div class="group-search-icon">
                              <img src="https://bizweb.dktcdn.net/100/372/532/themes/744930/assets/paper-plane.svg?1663906214480" alt="Tìm kiếm" />
                           </div>
                           <div class="group-search-content">
                              <p>Khởi hành từ</p>
                              <select name="garden" class="tag-select" required>
                                 <option value="">Tất cả</option>
                                 <option value="product_type:('Hồ Chí Minh')">Hồ Chí Minh</option>
                                 <option value="product_type:('Sài Gòn')">Sài Gòn</option>
                                 <option value="product_type:('TP. Huế')">TP. Huế</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-2 col-sm-2 col-12 fix-ipad">
                        <button class="hs-submit btn-style btn btn-default btn-blues" aria-label="Tìm">Tìm</button>	
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> --}}
</section>
<section class="awe-section-2">
   <div class="section_tour_policy">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
               <div class="evo-tour-policy-item">
                  <a href="#" title="Best price guarantee">
                     <div class="icon">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/images/feature_search_image_1.png')}}" alt="Best price guarantee" class="lazy img-responsive mx-auto d-block" />
                     </div>
                     <div class="caption">
                        <h3>Best price guarantee</h3>
                        <div>We guarantee customers will order the service with the best price, the most attractive promotions</div>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
               <div class="evo-tour-policy-item">
                  <a href="#" title="Reliable service - True value">
                     <div class="icon">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/images/feature_search_image_2.png')}}" alt="Reliable service - True value" class="lazy img-responsive mx-auto d-block" />
                     </div>
                     <div class="caption">
                        <h3>Reliable service - True value</h3>
                        <div>Putting customer interests first, we support customers quickly and accurately with reliable service, true value.</div>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
               <div class="evo-tour-policy-item">
                  <a href="#" title="Quality assurance">
                     <div class="icon">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/images/feature_search_image_3.png')}}" alt="Quality assurance" class="lazy img-responsive mx-auto d-block" />
                     </div>
                     <div class="caption">
                        <h3>Quality assurance</h3>
                        <div>We closely associate with partners, periodically survey to ensure the best quality of service</div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="awe-section-3">
   <div class="section_tour_last_hour evo-index-tour">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section_tour_last_hour_title">
                  <h2>Featured tours</h2>
               </div>
               <div class="row evo-tour-scroll">
                  <div class="owl-carousel owl-theme featured-tour">
                     @foreach ($homeProduct as $product)
                        <div class="item">
                           @include('layouts.product.item', ['product'=>$product])
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>
      $('.featured-tour').owlCarousel({
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
</section>
<section class="awe-section-4">
   <div class="section_banner">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 banner-top">
               <a href="{{$bannerAds[0]->name}}" title="" target="_blank">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$bannerAds[0]->image}}" alt="" class="lazy img-responsive mx-auto d-block" loading="lazy" />
               </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <a href="{{$bannerAds[1]->name}}" title="" target="_blank">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$bannerAds[1]->image}}" alt="" class="lazy img-responsive mx-auto d-block" loading="lazy" />
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
@foreach ($categoryhome as $cate)
@if (count($cate->typeCate) > 0)
<section class="awe-section-9">
   <div class="section_tour_destination">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section_tour_last_hour_title">
                  <h2>{{languageName($cate->name)}}</h2>
               </div>
            </div>
         </div>
         <div class="row">
            @foreach ($cate->typeCate as $typeCate)
               <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-4">
                  <div class="pos-relative">
                     <a href="{{route('allListProType', ['cate'=>$typeCate->cate_slug, 'typeCate'=>$typeCate->slug])}}" title="{{languageName($typeCate->name)}}">
                        <div class="destination-image">
                           <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$typeCate->avatar}}" alt="{{languageName($typeCate->name)}}" class="lazy img-responsive mx-auto d-block" />
                        </div>
                        <div class="frame-destination">
                           <div class="destination-name">{{languageName($typeCate->name)}}</div>
                        </div>
                     </a>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </div>
</section>
@endif
@endforeach
<section class="awe-section-9">
   <div class="section_tour_destination">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section_tour_last_hour_title">
                  <h2>Travel Services</h2>
               </div>
            </div>
         </div>
         <div class="row out-bound">
            <div class="owl-carousel owl-theme travel-services">
               @foreach ($servicehome as $service)
               <div class="pos-relative">
                  <a href="{{route('serviceDetail', ['slug'=>$service->slug])}}" title="{{$service->name}}">
                     <div class="destination-image">
                        <img src="{{$service->image}}" alt="{{$service->name}}" class="lazy img-responsive mx-auto d-block loaded" loading="lazy" >
                     </div>
                     <div class="frame-destination">
                        <div class="destination-name">{{$service->name}}</div>
                        <div class="destination-like">
                           View detail 
                           <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve">
                              <path d="M150,0C67.157,0,0,67.157,0,150c0,82.841,67.157,150,150,150s150-67.159,150-150C300,67.157,232.843,0,150,0zM195.708,160.159c-0.731,0.731-1.533,1.349-2.368,1.886l-56.295,56.295c-2.734,2.736-6.318,4.103-9.902,4.103s-7.166-1.367-9.902-4.103c-5.47-5.47-5.47-14.34,0-19.808l48.509-48.516l-48.265-48.265c-5.47-5.473-5.47-14.34,0-19.808c5.47-5.47,14.338-5.467,19.808-0.003l56.046,56.043c0.835,0.537,1.637,1.154,2.365,1.886c2.796,2.796,4.145,6.479,4.082,10.146C199.852,153.68,198.506,157.361,195.708,160.159z"></path>
                           </svg>
                        </div>
                     </div>
                  </a>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <script>
      $('.travel-services').owlCarousel({
         loop:true,
         margin:10,
         nav:true,
         responsive:{
            0:{
                  items:2
            },
            600:{
                  items:3
            },
            1000:{
                  items:4
            }
         }
      })
   </script>
</section>
<section class="awe-section-10">
   <div class="section_blogs">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section_tour_last_hour_title">
                  <h2><a href="{{route('allListBlog')}}" title="Travel Blog">Travel Blog</a></h2>
               </div>
               <div class="row evo-blog-scroll">
                  <div class="owl-carousel owl-theme travel-blogs">
                     @foreach ($homeBlog as $blog)
                     <div class="evo-item-blogs">
                        <div class="evo-article-image">
                           <a href="{{route('detailBlog', ['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}">
                           <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$blog->image}}" alt="{{languageName($blog->title)}}" class="lazy img-responsive mx-auto d-block" />
                           </a>
                        </div>
                        <h3><a class="line-clamp" href="{{route('detailBlog', ['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}">{{languageName($blog->title)}}</a></h3>
                        <p class="desc-blog"> {{languageName($blog->description)}}</p>
                     </div>
                     @endforeach
                  </div>
               </div>
               {{-- <div class="row">
                  <div class="col-lg-12">
                     <div class="evo-index-tour-more">
                        <a href="{{route('allListBlog')}}" title="View All">View All</a>
                     </div>
                  </div>
               </div> --}}
            </div>
         </div>
      </div>
   </div>
   <script>
      $('.travel-blogs').owlCarousel({
         loop:true,
         margin:10,
         nav:true,
         dots: false,
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
</section>
<section class="awe-section-69">

</section>
<section class="awe-section-3">
   <div class="section_service_tab clearfix">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section_tour_last_hour_title">
                  <h2>Customer Feedback</h2>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="slide-reviewcus owl-carousel owl-theme">
               @foreach ($reviewCus as $review)
               <div class="item">
                  <div class="reviewcus p-3">
                     <div class="reviewcus-image text-center">
                        <img src="{{$review->avatar}}" alt="" loading="lazy">
                        <p><strong>{{languageName($review->name)}}</strong></p>
                        <p>{{languageName($review->position)}}</p>
                     </div>
                     <div class="reviewcus-content text-justify">
                        {!!languageName($review->content)!!}
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <script>
      $('.slide-reviewcus').owlCarousel({
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
</section>
@endsection