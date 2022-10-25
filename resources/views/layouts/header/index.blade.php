<header class="header">
   <div class="header-top">
      <div class="container">
         <div class="row">
            <div class="col-md-7">
               <div class="info-imation">
                  <a href="https://www.google.com/maps/place/{{$setting->address1}}"><i class="fa-solid fa-location-dot"></i> {{$setting->address1}}</a>
                  <a href="tel:{{$setting->phone1}}"><i class="fa-solid fa-phone"></i> {{$setting->phone1}}</a>
               </div>
            </div>
            <div class="col-md-5">
               <ul>
                  <li><a href="{{route('aboutUs')}}">About Us</a></li>
                  <li><a href="{{route('allListBlog')}}">Blogs</a></li>
                  <li><a href="{{route('lienHe')}}">Contact</a></li>
                  <div id="translate_select" style="display: none"></div>
                  <li class="image-item ">
                     <a href="javascript:;" class="flag_link" rel="" title="" data-lang="vi">
                     <img src="{{url('frontend/images/flag-vn.png')}}" alt="" loading="lazy">
                     </a>
                     <a href="javascript:;" class="flag_link" rel="" title="" data-lang="en">
                     <img src="{{url('frontend/images/flag-en.png')}}" alt="" loading="lazy">
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="evo-main-nav">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-3 col-12 logo evo-header-mobile">
               <a href="{{route('home')}}" class="logo-wrapper" title="{{$setting->company}}">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$setting->logo}}" alt="{{$setting->company}}" class="lazy img-responsive center-block" loading="lazy" />
               </a>
               <button type="button" class="evo-flexitem evo-flexitem-fill d-sm-inline-block d-lg-none" id="trigger-mobile" aria-label="Menu Mobile">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            </div>
            <div class="col-lg-5 col-12 evo-search">
               <form action="{{route('search_result')}}" method="post" class="evo-search-form" role="search">
                  @csrf
                  <div class="input-group">
                     <input type="text" aria-label="Enter the name of the destination or city you want to visit" name="keyword" class="search-auto form-control" placeholder="Enter the name of the destination or city you want to visit" autocomplete="off" />
                     <span class="input-group-append">
                        <button class="btn btn-default" type="submit" aria-label="Tìm kiếm">
                           <svg viewBox="0 0 451 451" style="width:20px;">
                              <g fill="#000">
                                 <path d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3
                                    s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4
                                    C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3
                                    s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z"/>
                              </g>
                           </svg>
                        </button>
                     </span>
                  </div>
               </form>
            </div>
            <div class="col-lg-4 evo-account-and-cart d-lg-block d-none">
               <div class="evo-cart mini-cart">
                  <a href="tel:{{$setting->phone1}}" title="Hotline" aria-label="Hotline" rel="nofollow">
                     <img src="{{url('frontend/images/hotline.png')}}" alt="" loading="lazy">
                     <p>{{$setting->phone1}}</p>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="evo-main-menu d-lg-block d-none">
      <div class="container">
         <ul id="nav" class="nav">
            @foreach ($categoryhome as $cate)
            <li class=" nav-item has-childs   has-mega">
               <a href="{{route('allListProCate', ['cate'=>$cate->slug])}}" class="nav-link" title="{{languageName($cate->name)}}">
                  {{languageName($cate->name)}} 
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px">
                     <path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#141414"/>
                  </svg>
               </a>
               @if (count($cate->typeCate) > 0)
                  <div class="mega-content">
                     <div class="col-lg-3 no-padding">
                        <ul class="level0">
                           @foreach ($cate->typeCate as $typeCate)
                           <li class="level1 parent item fix-navs ">
                              <a class="hmega" href="{{route('allListProType', ['cate'=>$typeCate->cate_slug, 'typeCate'=>$typeCate->slug])}}" title="{{languageName($typeCate->name)}}"><span>{{languageName($typeCate->name)}}</span></a>
                              <div class="evo-sub-cate-1">
                                 <div class="row fix-padding">
                                    <div class="col-lg-9">
                                       @if (count($typeCate->products) > 0)
                                       <ul class="level1 row">
                                          @foreach ($typeCate->products as $product)
                                          <li class="level2 col-lg-4">
                                             <a href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" title="{{languageName($product->name)}}">{{languageName($product->name)}}</a>
                                          </li>
                                          @endforeach
                                       </ul>
                                       @endif
                                    </div>
                                    <div class="col-lg-3">
                                       <a href="{{route('allListProType', ['cate'=>$typeCate->cate_slug, 'typeCate'=>$typeCate->slug])}}" title="{{languageName($typeCate->name)}}">
                                       <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$typeCate->avatar}}" alt="{{languageName($typeCate->name)}}" class="lazy img-responsive mx-auto d-block" loading="lazy" />
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               @endif
            </li>
            @endforeach
            <li class="nav-item has-childs ">
               <a class="nav-link" href="#" title="Travel Services">Travel Services
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px">
                     <path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#141414"/>
                  </svg>
               </a>
               <div class="mega-content mega-content-more">
                  <div>
                     <div class="level0-wrapper2">
                        <div class="nav-block nav-block-center">
                           <ul class="level0">
                              @foreach ($servicehome as $service)
                                 <li class="level1 item">
                                    <a href="{{route('serviceDetail', ['slug'=>$service->slug])}}" title="{{$service->name}}"><span>{{$service->name}}</span></a>
                                 </li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
            <li class="nav-item has-childs ">
               <a class="nav-link" href="{{route('allListBlog')}}" title="Travel Blog">Travel Blog
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px">
                     <path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#141414"/>
                  </svg>
               </a>
               <div class="mega-content mega-content-more">
                  <div>
                     <div class="level0-wrapper2">
                        <div class="nav-block nav-block-center">
                           <ul class="level0">
                              @foreach ($blogCate as $cate)
                                 <li class="level1 item">
                                    <a href="{{route('listCateBlog', ['slug'=>$cate->slug])}}" title="{{languageName($cate->name)}}"><span>{{languageName($cate->name)}}</span></a>
                                 </li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </div>
</header>
<div class="mobile-main-menu">
   <div class="ul-first-menu clearfix">
      {{-- <div><a rel="nofollow" href="/account/login" title="Đăng nhập">Đăng nhập</a></div>
      <div><a rel="nofollow" href="/account/register" title="Đăng ký">Đăng ký</a></div> --}}
   </div>
   <div class="la-scroll-fix-infor-user">
      <ul class="la-nav-list-items">
         <li class="ng-scope">
            <a href="{{route('home')}}" title="Home">Home</a>
         </li>
         <li class="ng-scope">
            <a href="{{route('aboutUs')}}" title="About Us">About Us</a>
         </li>
         @foreach ($categoryhome as $cate)
         <li class="ng-scope ng-has-child1">
            <a href="{{route('allListProCate', ['cate'=>$cate->slug])}}" title="{{languageName($cate->name)}}">
               {{languageName($cate->name)}} 
               <svg class="svg1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px">
                  <path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838"/>
               </svg>
            </a>
            @if (count($cate->typeCate) > 0)
            <ul class="ul-has-child1">
               @foreach ($cate->typeCate as $typeCate)
               <li class="ng-scope ng-has-child2">
                  <a href="{{route('allListProType', ['cate'=>$typeCate->cate_slug, 'typeCate'=>$typeCate->slug])}}" title="{{languageName($typeCate->name)}}">
                     {{languageName($typeCate->name)}} 
                  </a>
               </li>
               @endforeach
            </ul>
            @endif
         </li>
         @endforeach
         <li class="ng-scope ng-has-child1">
            <a href="" title="Travel Services">
               Travel Services
               <svg class="svg1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px">
                  <path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838"/>
               </svg>
            </a>
            <ul class="ul-has-child1">
               @foreach ($servicehome as $service)
               <li class="ng-scope ng-has-child2">
                  <a href="{{route('serviceDetail', ['slug'=>$service->slug])}}" title="{{$service->name}}">
                     {{$service->name}} 
                  </a>
               </li>
               @endforeach
            </ul>
         </li>
         <li class="ng-scope ng-has-child1">
            <a href="" title="Travel Blog">
               Travel Blog
               <svg class="svg1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px">
                  <path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838"/>
               </svg>
            </a>
            <ul class="ul-has-child1">
               @foreach ($blogCate as $cate)
               <li class="ng-scope ng-has-child2">
                  <a href="{{route('listCateBlog', ['slug'=>$cate->slug])}}" title="{{languageName($cate->name)}}">
                     {{languageName($cate->name)}} 
                  </a>
               </li>
               @endforeach
            </ul>
         </li>
      </ul>
   </div>
   <div class="mobile-support">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 473.806 473.806" style="enable-background:new 0 0 473.806 473.806;" xml:space="preserve" width="20px" height="20px">
         <path d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4    c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8    c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6    c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5    c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26    c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9    c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806    C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20    c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6    c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1    c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3    c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5    c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8    c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9    l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1    C420.456,377.706,420.456,388.206,410.256,398.806z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
         <path d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2    c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11    S248.656,111.506,256.056,112.706z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
         <path d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11    c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2    c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
      </svg>
      Hotline: <a href="tel:{{$setting->phone1}}" title="{{$setting->phone1}}">{{$setting->phone1}}</a>
   </div>
</div>