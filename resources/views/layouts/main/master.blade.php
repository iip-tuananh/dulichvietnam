<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <title>@yield('title')</title>
      <meta name="description" content="">
      <meta name="keywords" content="@yield('title')"/>
      <meta name="robots" content="noodp,index,follow" />
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="description" content="@yield('description')" />
      <link rel="canonical" href="{{url()->current()}}" />
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:type" content="article" />
      <meta property="og:title" content="@yield('title')" />
      <meta property="og:description" content="@yield('description')" />
      <meta property="og:url" content="{{url()->current()}}" />
      <meta property="og:site_name" content="ahometh.vn" />
      <meta property="og:updated_time" content="2021-08-28T22:06:30+07:00" />
      <meta property="og:image" content="@yield('image')" />
      <meta property="og:image:secure_url" content="@yield('image')" />
      <meta property="og:image:width" content="598" />
      <meta property="og:image:height" content="333" />
      <meta property="og:image:alt" content="ahome-noi-that" />
      <meta property="og:image:type" content="image/jpeg" />
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:title" content="@yield('title')" />
      <meta name="twitter:description" content="@yield('description')" />
      <meta name="twitter:image" content="@yield('image')" />
      <meta name="google-site-verification" content="sMWsnNB2ZaZUwFC6cDCKmvDFuIFZF1G3im6th_2ZmcI" />
      <!-- Fav Icon -->
      <link rel="icon" href="{{url(''.$setting->favicon)}}" type="image/x-icon">
      <link rel="preload" as="style" type="text/css" href="{{asset('frontend/css/bootstrapmin.css')}}" />
      <link href="{{asset('frontend/css/bootstrapmin.css')}}" rel="stylesheet" type="text/css" />
      <link rel="preload" as="style" type="text/css" href="{{asset('frontend/css/evo-main.scss.css')}}" />
      <link href="{{asset('frontend/css/evo-main.scss.css')}}" rel="stylesheet" type="text/css" />
      <link rel="preload" as="style" type="text/css" href="{{asset('frontend/css/evo-index.scss.css')}}" />
      <link href="{{asset('frontend/css/evo-index.scss.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('frontend/css/callbuttom.css')}}" rel="stylesheet" type="text/css" />
      @yield('css')

      <link rel="preload" as="script" href="{{asset('frontend/js/jquery.js')}}" />
      <script src="{{asset('frontend/js/jquery.js')}}" type="text/javascript"></script>

      <script src="{{asset('frontend/js/owl.carousel.min.js')}}" type="text/javascript"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script>
         (function () {
            function asyncLoad() {
               var urls = [];
               for (var i = 0; i < urls.length; i++) {
                  var s = document.createElement('script');
                  s.type = 'text/javascript';
                  s.async = true;
                  s.src = urls[i];
                  var x = document.getElementsByTagName('script')[0];
                  x.parentNode.insertBefore(s, x);
               }
            };
            window.attachEvent ? window.attachEvent('onload', asyncLoad) : window.addEventListener('load', asyncLoad, false);
         })();
      </script>
   </head>
   <body class="index">
      @include('layouts.header.index')
      @yield('content')
      @include('layouts.footer.index')
      <div class="backdrop__body-backdrop___1rvky"></div>
      <link rel="preload" as="script" href="{{asset('frontend/js/api.jquery.js')}}" />
      <script src="{{asset('frontend/js/api.jquery.js')}}" type="text/javascript"></script>
      <link rel="preload" as="script" href="{{asset('frontend/js/evo-index-js.js')}}" />
      <script src="{{asset('frontend/js/evo-index-js.js')}}" type="text/javascript"></script>
      
      {{-- //js gg translate --}}
      <script type="text/javascript" 
      src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
      </script>
      <script type="text/javascript">
         function googleTranslateElementInit() {
         new google.translate.TranslateElement({
         pageLanguage: 'en',
         includedLanguages:'en,vi', 
         }, 'translate_select');
         }
      </script>
      <script>
         var flags = document.getElementsByClassName('flag_link');
         Array.prototype.forEach.call(flags, function(e){
         e.addEventListener('click', function(){
         var lang = e.getAttribute('data-lang'); 
         var languageSelect = document.querySelector("select.goog-te-combo");
         // console.log(document.querySelector("select.goog-te-combo"));
         languageSelect.value = lang; 
         languageSelect.dispatchEvent(new Event("change"));
         }); 
         });
      </script>
   <style type="text/css">
      .image-item .flag_link img{
         width: 30px;
         height: 28px;
      }
      /*google translate Dropdown */
      
      #translate_select select{
      background:#f6edfd;
      color:#383ffa;
      border: none;
      border-radius:3px;
      padding:6px 8px
      }
      /*google translate link | logo */
      .goog-logo-link{
      display:none!important;
      }
      .goog-te-gadget{
      color:transparent!important;
      }
      
      /* google translate banner-frame */
      
      .goog-te-banner-frame{
      display:none !important;
      }
      
      #goog-gt-tt, .goog-te-balloon-frame{display: none !important;}
      .goog-text-highlight { background: none !important; box-shadow: none !important;}
      
      body{top:0!important;}
      </style>
      <script>$.validate({});</script>
      <link rel="preload" as="script" href="{{asset('frontend/js/main.js')}}" />
      <script src="{{asset('frontend/js/main.js')}}" type="text/javascript"></script>
      <link rel="preload" as="script" href="{{asset('frontend/js/evo-wishlist.js')}}" />
      <script src="{{asset('frontend/js/evo-wishlist.js')}}" type="text/javascript"></script>
      @yield('js')
      <div class="hotline-phone-ring-wrap3">
         <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
            <a href="https://wa.me/{{$setting->phone1}}" class="pps-btn-img" target="_blank">
            <img src="{{url('frontend/images/whatsapp.png')}}" alt="Call" width="50" loading="lazy">
            </a>
            </div>
         </div>
      </div>
      <div class="hotline-phone-ring-wrap2">
         <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
            <a href="https://zalo.me/{{$setting->phone1}}" class="pps-btn-img" target="_blank">
            <img src="{{url('frontend/images/zalo.png')}}" alt="Call" width="50" loading="lazy">
            </a>
            </div>
         </div>
      </div>
   </body>
</html>