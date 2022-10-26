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
<script src="{{asset('frontend/js/jquery.ui.widget.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/jquery.iframe-transport.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/jquery.fileupload.js')}}" type="text/javascript"></script>
<script src="https://cdn.tiny.cloud/1/izjaaarfloqy7atb198pws5iop2okp8e13xpwis8rej692kx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>
      var editor_config = {
         path_absolute : "/",
         selector: 'textarea.my-editor',
         height: 200,
         relative_urls: false,
         plugins: [
            "advlist autolink lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime nonbreaking save table directionality",
            "emoticons template paste textpattern","toc",
         ],
         toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview media | forecolor backcolor emoticons | toc ",
         file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
            } else {
            cmsURL = cmsURL + "&type=Files";
            }
      
            tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
               callback(message.content);
            }
            });
         }
      };
      tinymce.init(editor_config);
      </script>
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
   <script>
      $('.click-here-review').on('click', function(){
         $('#form-review-cus').show();
         $('.close-here-review').show();
         $('.click-here-review').hide();
      })
      $('.close-here-review').on('click', function(){
         $('#form-review-cus').hide();
         $('.close-here-review').hide();
         $('.click-here-review').show();
      })
   </script>
   <script>
      /*jslint unparam: true */
      /*global window, $ */
   
      var max_uploads = 1
   
      $(function () {
         'use strict';
   
         // Change this to the location of your server-side upload handler:
         var url = $('#fileuploadavatar').data('url');
         $('#fileuploadavatar').fileupload({
            url: url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'html',
            done: function (e, data) {
   
                  if(data['result'] == 'FAILED'){
                     alert('Invalid File');
                  }else{
                     $('#uploaded_file_name').val(data['result']);
                     $('#uploaded_images').html('<div class="uploaded_image"> <input type="text" value="/uploads/images/'+data['result']+'" name="avatar" id="uploaded_image_name" hidden> <img src="/uploads/images/'+data['result']+'" /> <a href="#" class="img_rmv btn"><i class="fa fa-times-circle"></i></a> </div>');
   
                     if($('.uploaded_image').length >= max_uploads){
                        $('#select_file').hide();
                     }else{
                        $('#select_file').show();
                     }
                  }
   
                  $('#progress .progress-bar').css(
                     'width',
                     0 + '%'
                  );
   
                  $.each(data.result.files, function (index, file) {
                     $('<p/>').text(file.name).appendTo('#files');
                  });
   
            },
            progressall: function (e, data) {
                  var progress = parseInt(data.loaded / data.total * 100, 10);
                  $('#progress .progress-bar').css(
                     'width',
                     progress + '%'
                  );
            }
         }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
      });
   
      $( "#uploaded_images" ).on( "click", ".img_rmv", function(e) {
         e.preventDefault();
         var avatar = $(this).parent().find('input[name=avatar]').val();
         var urlDelete = $('#uploaded_images').data('url');
         // console.log(avatar);
         $.ajax({
            type: 'post',
            url: urlDelete,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               avatar :avatar
            },
            success: function(data) {

            }
         })
         $(this).parent().remove();
         if($('.uploaded_image').length > max_uploads){
            $('#select_file').hide();
         }else{
            $('#select_file').show();
         }
      });
   </script>
   <script>
      $('.submit-review-cus').click(function(e) {
         e.preventDefault();
         var url = $(this).data('url');
         var name = $('#form-review-cus').find("input[name=name]").val();
         var phone = $('#form-review-cus').find("input[name=phone]").val();
         var email = $('#form-review-cus').find("input[name=email]").val();
         var avatar = $('#form-review-cus').find("input[name=avatar]").val();
         var position = $('#form-review-cus').find("input[name=position]").val();
         var content = tinymce.get("my-editor").getContent();
         $.ajax({
            type: 'post',
            url: url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               name: [
                  {
                  lang_code: "vi",
                  content: name,
               },
               ],
               phone: phone,
               email: email,
               position: [
                        {
                  lang_code: "vi",
                  content: position,
               },
               ],
               avatar: avatar,
               content: [
                        {
                  lang_code: "vi",
                  content: content,
               },
               ],
               status: 1
            },
            success: function(data) {
               $('#review-customer').html(data.html);
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
            }
         })
      })
   </script>
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
               @if (isset($bannerAds[0]))
               <a href="{{$bannerAds[0]->name}}" title="" target="_blank">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$bannerAds[0]->image}}" alt="" class="lazy img-responsive mx-auto d-block" loading="lazy" />
               </a>
               @endif
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               @if (isset($bannerAds[1]))
               <a href="{{$bannerAds[1]->name}}" title="" target="_blank">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$bannerAds[1]->image}}" alt="" class="lazy img-responsive mx-auto d-block" loading="lazy" />
               </a>
               @endif
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
         <div class="row mt-3" id="review-customer">
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
         <div class="row">
            <button class="click-here-review">Please, leave your comments here. Thank you !!!</button>
            <button class="close-here-review">Close comment</button>
         </div>
         <div id="form-review-cus">
            <div class="row" >
                  <div class="col-md-8">
                     <div class="row">
                        <div class="col-md-6">
                           <fieldset class="form-group">
                              <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="lastName"  placeholder="Your Full Name" required >
                              <p id="error-name" class="error"></p>
                           </fieldset>
                           <fieldset class="form-group">
                              <input type="text" class="form-control" value="{{ old('position') }}" name="position" id="lastName"  placeholder="Your Position" required >
                              <p id="error-position" class="error"></p>
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <fieldset class="form-group">
                              <input type="text" class="form-control" value="{{ old('email') }}" name="email" id="lastName"  placeholder="Your Email Address" required >
                              <p id="error-email" class="error"></p>
                           </fieldset>
                           <fieldset class="form-group">
                              <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" id="lastName"  placeholder="Your Phone Number" required >
                              <p id="error-phone" class="error"></p>
                           </fieldset>
                        </div>
                        <div class="col-md-12">
                           <fieldset class="form-group">
                              <textarea class="my-editor" name="content" id="my-editor" cols="30" rows="5" placeholder="Your Feedback Content" required ></textarea>
                              <p id="error-content" class="error"></p>
                           </fieldset>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <fieldset class="form-group">
                        <div class="load-img">
                           <div id="uploaded_images" data-url="{{route('deleteImagePro')}}">
                              
                           </div>
                        </div>
                        <br>
                        <div id="select_file">
                           <div class="form-group">
                              <label for="fileuploadavatar">
                                 <span class="plus-icon" aria-hidden="true"><span>Click for upload image</span></span>
                                 <input id="fileuploadavatar" type="file" name="files" accept="image/x-png, image/gif, image/jpeg" data-url="{{route('uploadImagePro')}}" title="Picture" style="display:none">
                              </label>
                           </div>
                        </div>
                     </fieldset>
                     <button type="submit" class=" submit-review-cus" data-url="{{route('uploadReviewCus')}}">Submit</button>
                  </div>
               
            </div>
         </div>
      </div>
   </div>
   <style>
      #form-review-cus {
         display: none;
      }
      #form-review-cus .form-control{
         border-radius: 10px;
         height: 45px; 
      }
      #form-review-cus .tox-tinymce{
         border-radius: 10px; 
      }
      .close-here-review {
         display: none;
      }
      .click-here-review, .close-here-review, .submit-review-cus {
         padding: 10px 20px;
         border-radius: 20px;
         background-color: #1ba0e2;
         border: none;
         margin-bottom: 20px;
         color: #ffff;
      }
      .load-img {
         position: relative;
         /* border: 1px dashed gray; */
         height: 250px;
         background-color: white;
         padding: 20px;
      }
      .load-img img{
         width: 100%;
         height: 210px;
         border-radius: 10px;
      }
      .load-img:hover .img_rmv{
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 248px;
         background-color: #ffffff4a;
      }
      .load-img:hover .img_rmv i{
         font-size: 48px;
         color: #fff;
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         z-index: 1;
      }
      .img_rmv i{
         font-size: 48px;
         color: #fff;
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         z-index: -1;
      }
      #fileuploadavatar {
         height: 250px;
         display: grid;
         width: 95%;
         cursor: pointer;
         padding: 0;
         position: absolute;
         /* bottom: 66%; */
         /* left: 40%; */
         top: 26px;
         border: none;
      }
      .plus-icon::before {
         font-family: "Font Awesome 5 Free";
         content: "";
         display: inline-block;
         border-radius: 3px;
         padding: 5px 8px;
         outline: none;
         white-space: nowrap;
         -webkit-user-select: none;
         cursor: pointer;
         font-weight: 700;
         font-size: 40px;
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
      }
      .plus-icon {
         position: absolute;
         top: 18px;
         left: 22px;
         width: 89%;
         height: 215px;
         border: 1px dashed gray;
         border-radius: 10px;
      }
      .plus-icon span{
         position: absolute;
         top: 65%;
         left: 50%;
         transform: translate(-50%, -50%);
         opacity: 0.6;
      }
   </style>
</section>
@endsection