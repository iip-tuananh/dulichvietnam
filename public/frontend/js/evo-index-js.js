$(document).ready(function ($) {
	$('.home-slider').slick({
		lazyLoad: 'ondemand',
		autoplay: true,
		autoplaySpeed: 6000,
		fade: true,
		cssEase:'linear',
		dots: false,
		arrows: false,
		infinite: true
	});
});