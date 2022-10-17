
@php
$img = json_decode($product->images);
$discountPrice = $product->price - $product->price * ($product->discount / 100);
@endphp
<div class="evo-product-block-item">
   <div class="img-tour">
      <a href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" title="{{languageName($product->name)}}">
      <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$img[0]}}" alt="{{languageName($product->name)}}" loading="lazy" />
      </a>
   </div>
   <div class="info-tour clearfix">
      <h3><a href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" title="{{languageName($product->name)}}">{{languageName($product->name)}}</a></h3>
      <div class="date-go">
         <ul class="ct_course_list">
            <li class="clearfix tour-route">
               <img src="{{url('frontend/images/tag_icon_5.svg')}}" alt="Tour Route" /> Tour Route: 
               @foreach (json_decode($product->preserve) as $item)
               <span>{{$item->detail}} <i class="fas fa-arrow-right"></i></span>
               @endforeach
            </li>
            <li class="clearfix">
               <img src="{{url('frontend/images/tag_icon_4.svg')}}" alt="Duration" /> Duration: <span>{{$product->date_tour}}</span>
            </li>
         </ul>
      </div>
      <div class="action-box">
         @if ($product->discount > 0)
         <div class="price-box clearfix">
            {{$discountPrice}} USD
            <span class="old-price">{{$product->price}} USD</span>
         </div>
         @else
         <div class="price-box clearfix">
            {{$product->price}} USD
         </div>
         @endif
         
         <div class="booking-box">
            <a href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" title="View detail" class="btn btn-sm">View detail</a>
         </div>
      </div>
   </div>
</div>
<style>
   .evo-product-block-item .action-box .price-box .old-price {
      font-size: 13px;
      margin-left: 20px;
      text-decoration: line-through;
      color: #787878;
   }
   .evo-product-block-item .date-go .tour-route span:last-child i{
      display: none;
   }
</style>
