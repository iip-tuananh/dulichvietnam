@extends('layouts.main.master')
@section('title')
Giỏ hàng của bạn
@endsection
@section('description')
@endsection
@section('image')
{{url(''.$banners[0]->image)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/cartpage.scss.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
<script>
$(function() {
   $('.submit-pc').on('click', function(e) {
      e.preventDefault();
      let urlUpdateCart = $('.input_qty_pr').data('url');
      let id = $(this).parent('.input_qty_pr').data('id');
      let quantityPc = $(this).parent('.input_qty_pr').find('input#qtyItem'+id).val();
      // alert(quantityPc);
      if (quantityPc){
         $.ajax({
            type: 'get',
            url: urlUpdateCart,
            data :{
                  id: id,
                  quantity : quantityPc
            },
            success: function(data){
                  window.location.reload();
            },
            error: function(data){

            }
         });
      };
   });
   $('.submit-mobile').on('click', function(e) {
      e.preventDefault();
      let urlUpdateCart = $('.txt_center').data('url');
      let id = $(this).parent('.txt_center').data('id');
      let quantityMb = $(this).parent('.txt_center').find('input#qtyMobile'+id).val();
      // alert(quantityMb);
      if (quantityMb){
         $.ajax({
            type: 'get',
            url: urlUpdateCart,
            data :{
                  id: id,
                  quantity : quantityMb
            },
            success: function(data){
                  window.location.reload();
            },
            error: function(data){

            }
         });
      };
   });
   $('.delete-from-cart').on('click', function(e) {
      e.preventDefault();
      let urlRemoveCart = $('.main-cart-page').data('url');
      let id = $(this).data('id');
      $.ajax({
         type: 'get',
         url: urlRemoveCart,
         data: {
            id: id
         },
         success: function(data) {
            window.location.reload();
            $.notify("Xóa sản phẩm thành công!", "success");
         },
         error: function(data) {

         }
      })
   });
})
</script>
@endsection
@section('content')
<div class="bodywrap clearfix">
   <section class="bread-crumb" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.2) 0%,rgba(255,255,255,0.2) 100%), url({{$banners[0]->image}});">
      <span class="crumb-border"></span>
      <div class="container">
         <div class="rows">
            <div class="col-xs-12 a-left">
               <p class="title_h1 clearfix">
                  Giỏ hàng
               </p>
               <ul class="breadcrumb" >
                  <li class="home">
                     <a  href="/" ><span >Trang chủ</span></a>						
                     <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
                  </li>
                  <li><strong ><span>Giỏ hàng</span></strong></li>
               </ul>
            </div>
         </div>
      </div>
   </section>
   @if (isset($cart))
   <section class="main-cart-page main-container col1-layout" data-url="{{ route('removeCart')}}">
      <div class="main container cartpcstyle">
         <div class="wrap_background_aside">
            <div class="header-cart">
               <div class="header-cart title_cart_pc hidden-sm hidden-xs">
               </div>
            </div>
            <div class="col-main cart_desktop_page cart-page">
               <div class="cart page_cart hidden-xs hidden-sm ">
                  <div class="col-lg-12 col-xl-12 col-md-12">
                     <h1 class="title_cart">
                        <span>Giỏ hàng của bạn</span>
                     </h1>
                  </div>
                     <div class="bg-scroll">
                        <div class="cart-thead hidden">
                           <div style="width: 22%" class="a-left">Ảnh sản phẩm</div>
                           <div style="width: 28%" class="a-left">Tên sản phẩm</div>
                           <div style="width: 15%" class="a-left">Giá bán lẻ</div>
                           <div style="width: 10%" class="a-center">Số lượng</div>
                           <div style="width: 15%" class="a-center">Tạm tính</div>
                           <div style="width: 10%" class="a-center"></div>
                        </div>
                        <div class="cart-tbody">
                           @php
                              $totalPrice = 0;
                              $priceItem = 0;
                              $countPro = 0;
                           @endphp
                           @foreach ($cart as $item)
                           @php
                              $pricePro = $item['price'] - $item['price'] * ($item['discount']/100);
                              $totalPrice += $item['quantity'] * $pricePro ;
                           @endphp
                              <div class="item-cart productid-{{$item['id']}}">
                                 <div style="width: 15%" class="image">
                                    <a class="product-image a-left" title="{{languageName($item['name'])}}" href="{{route('detailProduct',['cate'=>$item['cate_slug'], 'slug'=>$item['slug']])}}">
                                    <img width="75" height="auto" alt="{{languageName($item['name'])}}" src="{{$item['image']}}">
                                    </a>
                                 </div>
                                 <div style="width: 30%" class="a-left contentcart">
                                    <h3 class="product-name"> <a class="text2line" href="{{route('detailProduct',['cate'=>$item['cate_slug'], 'slug'=>$item['slug']])}}" title="{{languageName($item['name'])}}">{{languageName($item['name'])}}</a> </h3>
                                    <span class="cart-prices">
                                    <span class="prices">{{number_format($pricePro)}}₫</span> 
                                    </span>
                                    @if (isset($item['color']))
                                    <span class="variant-title">{{$item['color']}}</span>
                                    @endif
                                 </div>
                                 <div style="width: 25%" class="a-center">
                                    <div class="input_qty_pr" data-id="{{$item['id']}}" data-url="{{route('updateCart')}}">
                                       <input type="text" maxlength="3" readonly="" min="0" class="check_number_here input-text number-sidebar input_pop input_pop qtyItem{{$item['id']}}" id="qtyItem{{$item['id']}}" name="Lines" size="4" value="{{$item['quantity']}}">
                                       <button onclick="var result = document.getElementById('qtyItem{{$item['id']}}'); var qtyItem{{$item['id']}} = result.value; if( !isNaN( qtyItem{{$item['id']}} )) result.value++;return false;" class="increase_pop items-count btn-plus submit-pc" type="button"><i class="fas fa-plus-circle"></i></button>
                                       <button onclick="var result = document.getElementById('qtyItem{{$item['id']}}'); var qtyItem{{$item['id']}} = result.value; if( !isNaN( qtyItem{{$item['id']}} ) &amp;&amp; qtyItem{{$item['id']}} > 1 ) result.value--;return false;" class="reduced_pop items-count btn-minus submit-pc" type="button"><i class="fas fa-minus-circle"></i></button>
                                    </div>
                                 </div>
                                 <div style="width: 12%" class="a-center">
                                    <span class="cart-price">
                                    <span class="price">{{number_format($pricePro * $item['quantity'])}}₫</span> 
                                    </span>
                                 </div>
                                 <div style="width: 18%" class="a-center">
                                    <a class="remove-itemx remove-item-cart delete-from-cart" title="Xóa" href="javascript:;" data-id="{{$item['id']}}">
                                    <span><i class="fa fa-times"></i></span>
                                    </a>
                                 </div>
                              </div>
                           @endforeach
                        </div>
                     </div>
                  <div class="col-lg-12 col-xl-12 col-md-12">
                     <div class="wrapbottomcart">
                        <div class="section continued">
                           <div class="bg_cart shopping-cart-table-total">
                              <div class="table-total">
                                 <table class="table">
                                    <tbody>
                                       <tr>
                                          <td class="total-text f-left">Tổng tiền</td>
                                          <td class="txt-right totals_price price_end f-right">{{number_format($totalPrice)}}₫</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <a href="{{route('allProduct')}}" class="form-cart-continue"><i class="fas fa-reply"></i>Tiếp tục mua hàng</a>
                              <a href="{{ route('checkout') }}" class="btn-checkout-cart button_checkfor_buy"><i class="fas fa-check"></i>Tiến hành thanh toán</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="wrap_background_aside padding-top-15 margin-bottom-40 padding-left-0 padding-right-0 cartmbstyle">
         <div class="cart-mobile container">
               <div class="header-cart">
                  <div class="title-cart title_cart_mobile">
                     <h3>Giỏ hàng</h3>
                  </div>
               </div>
               <div class="header-cart-content" style="background:#fff;">
                  <div class="cart_page_mobile content-product-list">
                     @foreach ($cart as $item)
                     @php
                        $pricePro = $item['price'] - $item['price'] * ($item['discount']/100);
                     @endphp
                     <div class="item-product item productid-{{$item['id']}} ">
                        <div class="item-product-cart-mobile">
                           <a href="{{route('detailProduct',['cate'=>$item['cate_slug'], 'slug'=>$item['slug']])}}">	
                           </a><a class="product-images1" href="" title="{{languageName($item['name'])}}">
                           <img width="80" height="150" src="{{$item['image']}}" alt="{{languageName($item['name'])}}">
                           </a>
                        </div>
                        <div class="title-product-cart-mobile">
                           <h3>
                              <a href="{{route('detailProduct',['cate'=>$item['cate_slug'], 'slug'=>$item['slug']])}}" title="{{languageName($item['name'])}}">{{languageName($item['name'])}}</a>
                              @if (isset($item['color']))
                              <em style="font-size:11px; display:block">{{$item['color']}}</em>
                              @endif
                           </h3>
                           <p>
                              Giá: <span>{{number_format($pricePro)}}₫</span>
                           </p>
                        </div>
                        <div class="select-item-qty-mobile">
                           <div class="txt_center" data-id="{{$item['id']}}" data-url="{{route('updateCart')}}">
                              <button onclick="var result = document.getElementById('qtyMobile{{$item['id']}}'); var qtyMobile{{$item['id']}} = result.value; if( !isNaN( qtyMobile{{$item['id']}} ) &amp;&amp; qtyMobile{{$item['id']}} > 1 ) result.value--;return false;" class="reduced items-count btn-minus submit-mobile" type="button"><i class="fas fa-minus-circle"></i></button>
                              <input type="text" maxlength="3" min="1" class="input-text number-sidebar qtyMobile{{$item['id']}}" id="qtyMobile{{$item['id']}}" name="Lines" size="4" value="{{$item['quantity']}}">
                              <button onclick="var result = document.getElementById('qtyMobile{{$item['id']}}'); var qtyMobile{{$item['id']}} = result.value; if( !isNaN( qtyMobile{{$item['id']}} )) result.value++;return false;" class="increase items-count btn-plus submit-mobile" type="button"><i class="fas fa-plus-circle"></i></button>
                           </div>
                           <a class="button remove-item remove-item-cart delete-from-cart" href="javascript:;" data-id="{{$item['id']}}">Xoá</a>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <div class="header-cart-price">
                     <div class="title-cart">
                        <h3 class="text-xs-left">Tổng tiền</h3>
                        <a class="text-xs-right  totals_price_mobile">{{number_format($totalPrice)}}₫</a>
                     </div>
                     <div class="checkout">
                        <button class="btn-proceed-checkout-mobile" title="Tiến hành thanh toán" type="button" onclick="window.location.href='{{ route('checkout') }}'">
                        <span>Tiến hành thanh toán</span></button>
                        <button href="" class="btn btn-white f-left" title="Tiếp tục mua hàng" type="button" onclick="window.location.href='{{ route('allProduct') }}'">
                        <span>Tiếp tục mua hàng</span>
                        </button>
                     </div>
                  </div>
               </div>
         </div>
      </div>
   </section>
   @else
   <section class="main-cart-page main-container col1-layout" data-url="{{ route('removeCart')}}">
      <div class="main container cartpcstyle">
         <div class="wrap_background_aside">
            <div class="header-cart">
               <div class="header-cart title_cart_pc hidden-sm hidden-xs">
               </div>
            </div>
            <div class="col-main cart_desktop_page cart-page">
               <div class="cart page_cart hidden-xs hidden-sm row ">
                  <div class="col-lg-12 col-xl-12 col-md-12">
                     <h1 class="title_cart">
                        <span>Chưa có sản phẩm nào trong giỏ hàng của bạn!</span>
                     </h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   @endif
</div>
@endsection