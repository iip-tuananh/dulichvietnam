@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
<link href="{{asset('frontend/css/evo-collections.scss.css')}}" rel="stylesheet" type="text/css" />
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
			<strong itemprop="name">{{$title}}</strong>
			<meta itemprop="position" content="2" />
		</li>
	</ul>
	</div>
</section>
<div class="banner-cate">
	<div class="category-gallery">
	<div class="slide-collection">
		<div class="item">
			<a href="#" title="Evo Tour"><img data-lazy="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/cat-banner-2.jpg?1663906214480" alt="Evo Tour" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" class="img-responsive center-block" /></a>
		</div>
	</div>
	</div>
</div>
{{-- <div class="evo-tour-search-all">
	<div class="container">
	<div class="row no-margin">
		<div class="col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="input_group group_a">
				<img src="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/place-localizer.svg?1663906214480" alt="Địa điểm" />
				<input type="text" aria-label="Bạn muốn đi đâu?" autocomplete="off" placeholder="Bạn muốn đi đâu?" id="name" class="form-control form-hai form-control-lg" />
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-5 col-12 fix-ipad1">
			<div class="group-search abs">
				<div class="group-search-icon">
				<img src="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/date.svg?1663906214480" alt="Tìm kiếm" />
				</div>
				<div class="group-search-content">
				<p>Ngày khởi hành</p>
				<input class="tourmaster-datepicker" id="dates" type="text" placeholder="Chọn Ngày khởi hành" data-date-format="dd MM yyyy" readonly="readonly" />
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-5 col-12 fix-ipad2">
			<div class="group-search ab">
				<div class="group-search-icon">
				<img src="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/paper-plane.svg?1663906214480" alt="Tìm kiếm" />
				</div>
				<div class="group-search-content">
				<p>Khởi hành từ</p>
				<select name="garden" class="tag-select" required>
					<option value="">Tất cả</option>
					<option value="product_type:(Hồ Chí Minh)">Hồ Chí Minh</option>
					<option value="product_type:(Sài Gòn)">Sài Gòn</option>
					<option value="product_type:(TP. Huế)">TP. Huế</option>
				</select>
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-12 fix-ipad">
			<button class="hs-submit btn-style btn btn-default btn-blues" aria-label="Tìm">Tìm</button>	
		</div>
	</div>
	</div>
</div> --}}
<div class="container margin-bottom-15 padding-top-15">
	<div class="row">
	<section class="main_container collection col-md-12 col-lg-12">
		<h1 class="col-title d-none">{{$title}}</h1>
		<div class="category-products products category-products-grids clearfix">
			<section class="products-view products-view-grid row">
				@foreach ($list as $product)
					<div class="col-12 col-sm-6 col-md-4 col-lg-4">
						@include('layouts.product.item', ['product'=>$product])
					</div>
				@endforeach
			</section>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-12 margin-top-20 fix-pag">
				<nav class="text-center">
					{{$list->links()}}
				</nav>
				</div>
			</div>
		</div>
	</section>
	</div>
</div>
@endsection