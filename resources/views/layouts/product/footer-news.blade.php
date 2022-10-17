<section class="fw-main-row "  >
   <div class="fw-container">
      <div class="fw-row">
         <div class="fw-col-xs-12">
         <div class="box-tintuc-template py-5 position-relative tamgia-trang">
               <div class="container">
                  <div class="full-box-products-template-body">
                     <div class="title-body text-center font-weight-bold text-uppercase position-relative">
                     <h2 class="bg-white text-xanhduong p-3 d-table border-xanhduong text-center m-auto position-relative"><a href="{{route('allListBlog')}}" class="text-xanhduong">Tin tức nổi bật</a></h2>
                     </div>
                     <div class="slider-box-tintuc owl-carousel owl-theme pt-5">
                        @foreach ($hotBlogs as $blog)
                        <div class="items">
                              <div class="full-box-tintuc-template">
                                 <div class="img-box-tintuc-template img-full-items-products position-relative">
                                    <a href="{{route('detailBlog', ['slug'=>$blog->slug])}}"><img width="956" height="1276" src="{{$blog->image}}" class="attachment-full size-full wp-post-image" alt="{{languageName($blog->title)}}" /></a>
                                    {{-- <div class="date-time-line position-absolute">
                                    <div class="flex-col mr-half">
                                          <div class="badge post-date badge-small badge-outline">
                                             <div class="badge-inner bg-fill p-2 bg-white">
                                                <span class="post-date-day">04</span><br>
                                                <span class="post-date-month is-xsmall">Tháng Tư</span>
                                             </div>
                                          </div>
                                    </div>
                                    </div> --}}
                                 </div>
                                 <div class="title-box-tintuc text-center font-weight-bold py-2">
                                    <a href="{{route('detailBlog', ['slug'=>$blog->slug])}}">{{languageName($blog->title)}}</a>
                                 </div>
                                 <div class="desc-box-tintuc text-dark">
                                    {{languageName($blog->description)}}						
                                 </div>
                              </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
         </div>
         </div>
      </div>
   </div>
</section>