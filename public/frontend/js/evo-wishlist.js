var _0xa1c3=["\x74\x68\x65\x6D\x65"];window[_0xa1c3[0]]= window[_0xa1c3[0]]|| {}
theme.wishlist = (function (){
	var wishlistButtonClass = '.js-btn-wishlist',
		wishlistRemoveButtonClass = '.js-remove-wishlist',
		$wishlistCount = $('.js-wishlist-count'),
		$wishlistContainer = $('.js-wishlist-content'),
		$wishlistSmall = $('.wish-list-small'),
		wishlistViewAll = $('.wish-list-button-all'),
		wishlistObject = JSON.parse(localStorage.getItem('localWishlist')) || [],
		wishlistPageUrl = $('.js-wishlist-link').attr('href'),
		loadNoResult = function (){
			$wishlistContainer.html('<div class="col text-center"><div class="alert alert-warning d-inline-block"><h3>Tour nào của chúng tôi bạn mong muốn sở hữu nhất?</h3><p>Hãy thêm vào danh sách Tour yêu thích ngay nhé!</p></div></div>');
			$wishlistSmall.html('<div class="empty-description"><span class="empty-icon"><i class="ico ico-favorite-heart"></i></span><div class="empty-text"><h3>Tour nào của chúng tôi bạn mong muốn sở hữu nhất?</h3><p>Hãy thêm vào danh sách Tour yêu thích ngay nhé!</p></div></div><style>.container--wishlist .js-wishlist-content{border:none;}</style>');
			wishlistViewAll.addClass('d-none');
		};
	function loadSmallWishList(){
		$wishlistSmall.html('');
		if(wishlistObject.length > 0){
			for (var i = 0; i < wishlistObject.length; i++) { 
				var productHandle = wishlistObject[i];
				Bizweb.getProduct(productHandle,function(product){
					var htmlSmallProduct = '';
					if(product.variants[0].price > 0 ){
						var productPrice = Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.variants[0].price);
					}else{
						var productPrice = "Liên hệ";
					}
					if(product.featured_image != null){
						var src = product.featured_image;
					}else{
						var src = "//bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif";
					}
					htmlSmallProduct += '<div class="wish-list-item-small js-wishlist-item clearfix">';
					htmlSmallProduct += '<a class="product-image" href="'+ product.url +'" title="'+ product.name +'">';
					htmlSmallProduct += '<img class="lazy" alt="'+ product.name +'" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="'+ src +'" width="80"></a>';
					htmlSmallProduct += '<div class="detail-item"><div class="product-details">';
					htmlSmallProduct += '<a href="javascript:;" data-handle="'+product.alias+'" title="Bỏ yêu thích" class="js-remove-wishlist">×</a>';
					htmlSmallProduct += '<p class="product-name">';
					htmlSmallProduct += '<a href="'+ product.url +'" title="'+ product.name +'">'+ product.name +'</a>';
					htmlSmallProduct += '</p></div><div class="product-details-bottom">';
					htmlSmallProduct += '<span class="price pricechange">' +productPrice+ '</span>';
					htmlSmallProduct += '</div></div></div>';
					$wishlistSmall.append(htmlSmallProduct);
					awe_lazyloadImage();
				});
			}
			wishlistViewAll.removeClass('d-none');
		}else{
			loadNoResult();
		}
	}
	function loadWishlist(){
		$wishlistContainer.html('');
		if (wishlistObject.length > 0){
			for (var i = 0; i < wishlistObject.length; i++) { 
				var productHandle = wishlistObject[i];
				Bizweb.getProduct(productHandle,function(product){
					var htmlProduct = '';
					var tag = '';
					var i;
					var tourTransport = '';
					var tourTagDate = '';
					if(product.variants[0].price > 0 ){
						var productPrice = Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.variants[0].price);
					}else{
						var productPrice = "Liên hệ";
					}
					if(product.variants[0].compare_at_price > product.variants[0].price ){
						var productPriceCompare = Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.variants[0].compare_at_price);
						var productDiscount = Math.round((product.variants[0].compare_at_price - product.variants[0].price)/product.variants[0].compare_at_price * 100);
					}
					if(product.featured_image != null){
						var src = Bizweb.resizeImage(product.featured_image, 'large');
					}else{
						var src = "//bizweb.dktcdn.net/thumb/large/assets/themes_support/noimage.gif";
					}
					tag = product.tags;
					for (i = 0; i < tag.length; i++){
						if(tag[i].includes("oto")){
										   tourTransport += '<li title="'+tag[i].split("_")[1]+'"><img src="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/tag_icon_1.svg?1629430857692" alt="'+tag[i].split("_")[1]+'"></li>';		
						   }
						   if(tag[i].includes("tauthuy")){
						   tourTransport += '<li title="'+tag[i].split("_")[1]+'"><img src="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/tag_icon_2.svg?1629430857692" alt="'+tag[i].split("_")[1]+'"></li>';		
					}
					if(tag[i].includes("maybay")){
									   tourTransport += '<li title="'+tag[i].split("_")[1]+'"><img src="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/tag_icon_3.svg?1629430857692" alt="'+tag[i].split("_")[1]+'"></li>';		
					   }
					   if(tag[i].includes("khoihanh")){
									   tourTagDate += '<li class="clearfix"><img src="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/tag_icon_4.svg?1629430857692" alt="'+tag[i].split("_")[1]+'">Lịch khởi hành: <span>'+tag[i].split("_")[1]+'</span></li>';		
					   }
					   if(tag[i].includes("thoigian")){
									   tourTagDate += '<li class="clearfix"><img src="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/tag_icon_5.svg?1629430857692" alt="'+tag[i].split("_")[1]+'">Thời gian: <span>'+tag[i].split("_")[1]+'</span></li>';		
					   }
					   }
					   htmlProduct += '<div class="col-12 col-sm-6 col-md-4 col-lg-3 js-wishlist-item">';
					   htmlProduct += '<div class="evo-product-block-item">';
					   htmlProduct += '<div class="img-tour"><a href="'+ product.url +'" title="'+ product.name +'">';
					   htmlProduct += '<img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="'+ src +'" alt="'+ product.name +'" />';
					   htmlProduct += '</a>';
					   htmlProduct += '<button type="button" class="favorites-btn js-favorites js-remove-wishlist cart-button" title="Bỏ yêu thích" data-handle="'+product.alias+'"><svg class="evo-added" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 51.997 51.997" style="enable-background:new 0 0 51.997 51.997;" xml:space="preserve"><path d="M51.911,16.242C51.152,7.888,45.239,1.827,37.839,1.827c-4.93,0-9.444,2.653-11.984,6.905c-2.517-4.307-6.846-6.906-11.697-6.906c-7.399,0-13.313,6.061-14.071,14.415c-0.06,0.369-0.306,2.311,0.442,5.478c1.078,4.568,3.568,8.723,7.199,12.013l18.115,16.439l18.426-16.438c3.631-3.291,6.121-7.445,7.199-12.014C52.216,18.553,51.97,16.611,51.911,16.242z M49.521,21.261c-0.984,4.172-3.265,7.973-6.59,10.985L25.855,47.481L9.072,32.25c-3.331-3.018-5.611-6.818-6.596-10.99c-0.708-2.997-0.417-4.69-0.416-4.701l0.015-0.101C2.725,9.139,7.806,3.826,14.158,3.826c4.687,0,8.813,2.88,10.771,7.515l0.921,2.183l0.921-2.183c1.927-4.564,6.271-7.514,11.069-7.514c6.351,0,11.433,5.313,12.096,12.727C49.938,16.57,50.229,18.264,49.521,21.261z"/></svg></button></div>';
					   htmlProduct += '<div class="info-tour clearfix"><h3><a href="'+ product.url +'" title="'+ product.name +'">'+ product.name +'</a></h3>';
					   htmlProduct += '<div class="vote-box"><div class="meta-vote"><ul class="ct_course_list">';
					   htmlProduct += tourTransport;
					   htmlProduct += '</ul></div>';
					   if(product.variants[0].compare_at_price > product.variants[0].price ){
						htmlProduct += '<div class="saleoff">' +productPriceCompare+ '</div>';
					}
					htmlProduct += '</div>';
					htmlProduct += '<div class="date-go"><ul class="ct_course_list">';
					htmlProduct += tourTagDate;
					htmlProduct += '</ul></div>';
					htmlProduct += '<div class="action-box"><div class="price-box clearfix">';
					htmlProduct += '' +productPrice+ '';
					htmlProduct += '</div>';
					htmlProduct += '<div class="booking-box">';
					htmlProduct += '<a title="Đặt Tour" type="button" href="'+ product.url +'" class="btn btn-sm action cart-button">Đặt Tour</a>';
					htmlProduct += '</div>';
					htmlProduct += '</div></div></div>';
					htmlProduct += '</div>';
					$wishlistContainer.append(htmlProduct);
					awe_lazyloadImage();
				});
			}
		}else{
			loadNoResult();
		}
		$wishlistCount.text(wishlistObject.length);
		$(wishlistButtonClass).each(function(){
			var productHandle = $(this).data('handle');
			var iconWishlist = $.inArray(productHandle,wishlistObject) !== -1 ? "<svg class='evo-added' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 51.997 51.997' style='enable-background:new 0 0 51.997 51.997;' xml:space='preserve'><path d='M51.911,16.242C51.152,7.888,45.239,1.827,37.839,1.827c-4.93,0-9.444,2.653-11.984,6.905c-2.517-4.307-6.846-6.906-11.697-6.906c-7.399,0-13.313,6.061-14.071,14.415c-0.06,0.369-0.306,2.311,0.442,5.478c1.078,4.568,3.568,8.723,7.199,12.013l18.115,16.439l18.426-16.438c3.631-3.291,6.121-7.445,7.199-12.014C52.216,18.553,51.97,16.611,51.911,16.242z M49.521,21.261c-0.984,4.172-3.265,7.973-6.59,10.985L25.855,47.481L9.072,32.25c-3.331-3.018-5.611-6.818-6.596-10.99c-0.708-2.997-0.417-4.69-0.416-4.701l0.015-0.101C2.725,9.139,7.806,3.826,14.158,3.826c4.687,0,8.813,2.88,10.771,7.515l0.921,2.183l0.921-2.183c1.927-4.564,6.271-7.514,11.069-7.514c6.351,0,11.433,5.313,12.096,12.727C49.938,16.57,50.229,18.264,49.521,21.261z'/></svg>" : "<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 51.997 51.997' style='enable-background:new 0 0 51.997 51.997;' xml:space='preserve'><path d='M51.911,16.242C51.152,7.888,45.239,1.827,37.839,1.827c-4.93,0-9.444,2.653-11.984,6.905c-2.517-4.307-6.846-6.906-11.697-6.906c-7.399,0-13.313,6.061-14.071,14.415c-0.06,0.369-0.306,2.311,0.442,5.478c1.078,4.568,3.568,8.723,7.199,12.013l18.115,16.439l18.426-16.438c3.631-3.291,6.121-7.445,7.199-12.014C52.216,18.553,51.97,16.611,51.911,16.242z M49.521,21.261c-0.984,4.172-3.265,7.973-6.59,10.985L25.855,47.481L9.072,32.25c-3.331-3.018-5.611-6.818-6.596-10.99c-0.708-2.997-0.417-4.69-0.416-4.701l0.015-0.101C2.725,9.139,7.806,3.826,14.158,3.826c4.687,0,8.813,2.88,10.771,7.515l0.921,2.183l0.921-2.183c1.927-4.564,6.271-7.514,11.069-7.514c6.351,0,11.433,5.313,12.096,12.727C49.938,16.57,50.229,18.264,49.521,21.261z'/></svg>";
			var textWishlist = $.inArray(productHandle,wishlistObject) !== -1 ? "Đến trang sản phẩm yêu thích" : "Thêm vào yêu thích";
			$(this).html(iconWishlist).attr('title',textWishlist);
		});
	}
	var _0xcd91=["\x68\x61\x6E\x64\x6C\x65","\x64\x61\x74\x61","\x5B\x64\x61\x74\x61\x2D\x68\x61\x6E\x64\x6C\x65\x3D\x22","\x22\x5D","\x69\x6E\x41\x72\x72\x61\x79","\x68\x72\x65\x66","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x70\x75\x73\x68","\x77\x69\x73\x68\x6C\x69\x73\x74\x49\x63\x6F\x6E\x41\x64\x64\x65\x64","\x73\x74\x72\x69\x6E\x67\x73","\x68\x74\x6D\x6C","\x66\x61\x73\x74","\x66\x61\x64\x65\x49\x6E","\x73\x6C\x6F\x77","\x66\x61\x64\x65\x4F\x75\x74","\x74\x69\x74\x6C\x65","\x77\x69\x73\x68\x6C\x69\x73\x74\x54\x65\x78\x74\x41\x64\x64\x65\x64","\x61\x74\x74\x72","\x6C\x6F\x63\x61\x6C\x57\x69\x73\x68\x6C\x69\x73\x74","\x73\x74\x72\x69\x6E\x67\x69\x66\x79","\x73\x65\x74\x49\x74\x65\x6D","\x6C\x65\x6E\x67\x74\x68","\x74\x65\x78\x74"];function updateWishlist(_0xfc06x2){var _0xfc06x3=$(_0xfc06x2)[_0xcd91[1]](_0xcd91[0]),_0xfc06x4=$(wishlistButtonClass+ _0xcd91[2]+ _0xfc06x3+ _0xcd91[3]);var _0xfc06x5=$[_0xcd91[4]](_0xfc06x3,wishlistObject)!==  -1?true:false;if(_0xfc06x5){window[_0xcd91[6]][_0xcd91[5]]= wishlistPageUrl}else {wishlistObject[_0xcd91[7]](_0xfc06x3);_0xfc06x4[_0xcd91[14]](_0xcd91[13])[_0xcd91[12]](_0xcd91[11])[_0xcd91[10]](theme[_0xcd91[9]][_0xcd91[8]]);_0xfc06x4[_0xcd91[17]](_0xcd91[15],theme[_0xcd91[9]][_0xcd91[16]])};localStorage[_0xcd91[20]](_0xcd91[18],JSON[_0xcd91[19]](wishlistObject));loadSmallWishList();$wishlistCount[_0xcd91[22]](wishlistObject[_0xcd91[21]])}
	var _0xd3ea=["\x63\x6C\x69\x63\x6B","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x6F\x6E","\x68\x61\x6E\x64\x6C\x65","\x64\x61\x74\x61","\x5B\x64\x61\x74\x61\x2D\x68\x61\x6E\x64\x6C\x65\x3D\x22","\x22\x5D","\x77\x69\x73\x68\x6C\x69\x73\x74\x49\x63\x6F\x6E","\x73\x74\x72\x69\x6E\x67\x73","\x68\x74\x6D\x6C","\x74\x69\x74\x6C\x65","\x77\x69\x73\x68\x6C\x69\x73\x74\x54\x65\x78\x74","\x61\x74\x74\x72","\x69\x6E\x64\x65\x78\x4F\x66","\x73\x70\x6C\x69\x63\x65","\x6C\x6F\x63\x61\x6C\x57\x69\x73\x68\x6C\x69\x73\x74","\x73\x74\x72\x69\x6E\x67\x69\x66\x79","\x73\x65\x74\x49\x74\x65\x6D","\x66\x61\x64\x65\x4F\x75\x74","\x2E\x6A\x73\x2D\x77\x69\x73\x68\x6C\x69\x73\x74\x2D\x69\x74\x65\x6D","\x63\x6C\x6F\x73\x65\x73\x74","\x6C\x65\x6E\x67\x74\x68","\x74\x65\x78\x74"];$(document)[_0xd3ea[2]](_0xd3ea[0],wishlistButtonClass,function(_0xdfa5x1){_0xdfa5x1[_0xd3ea[1]]();updateWishlist(this)});$(document)[_0xd3ea[2]](_0xd3ea[0],wishlistRemoveButtonClass,function(){var _0xdfa5x2=$(this)[_0xd3ea[4]](_0xd3ea[3]),_0xdfa5x3=$(wishlistButtonClass+ _0xd3ea[5]+ _0xdfa5x2+ _0xd3ea[6]);_0xdfa5x3[_0xd3ea[9]](theme[_0xd3ea[8]][_0xd3ea[7]]);_0xdfa5x3[_0xd3ea[12]](_0xd3ea[10],theme[_0xd3ea[8]][_0xd3ea[11]]);wishlistObject[_0xd3ea[14]](wishlistObject[_0xd3ea[13]](_0xdfa5x2),1);localStorage[_0xd3ea[17]](_0xd3ea[15],JSON[_0xd3ea[16]](wishlistObject));$(this)[_0xd3ea[20]](_0xd3ea[19])[_0xd3ea[18]]();$wishlistCount[_0xd3ea[22]](wishlistObject[_0xd3ea[21]]);if(wishlistObject[_0xd3ea[21]]=== 0){loadNoResult()}});loadWishlist();loadSmallWishList();return {load:loadWishlist}
})()
theme.strings = {
	wishlistNoResult: "<h3>Tour nào của chúng tôi bạn mong muốn sở hữu nhất?</h3><p>Hãy thêm vào danh sách Tour yêu thích ngay nhé!</p>",
	wishlistIcon: "<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 51.997 51.997' style='enable-background:new 0 0 51.997 51.997;' xml:space='preserve'><path d='M51.911,16.242C51.152,7.888,45.239,1.827,37.839,1.827c-4.93,0-9.444,2.653-11.984,6.905c-2.517-4.307-6.846-6.906-11.697-6.906c-7.399,0-13.313,6.061-14.071,14.415c-0.06,0.369-0.306,2.311,0.442,5.478c1.078,4.568,3.568,8.723,7.199,12.013l18.115,16.439l18.426-16.438c3.631-3.291,6.121-7.445,7.199-12.014C52.216,18.553,51.97,16.611,51.911,16.242z M49.521,21.261c-0.984,4.172-3.265,7.973-6.59,10.985L25.855,47.481L9.072,32.25c-3.331-3.018-5.611-6.818-6.596-10.99c-0.708-2.997-0.417-4.69-0.416-4.701l0.015-0.101C2.725,9.139,7.806,3.826,14.158,3.826c4.687,0,8.813,2.88,10.771,7.515l0.921,2.183l0.921-2.183c1.927-4.564,6.271-7.514,11.069-7.514c6.351,0,11.433,5.313,12.096,12.727C49.938,16.57,50.229,18.264,49.521,21.261z'/></svg>",
	wishlistIconAdded: "<svg class='evo-added' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 51.997 51.997' style='enable-background:new 0 0 51.997 51.997;' xml:space='preserve'><path d='M51.911,16.242C51.152,7.888,45.239,1.827,37.839,1.827c-4.93,0-9.444,2.653-11.984,6.905c-2.517-4.307-6.846-6.906-11.697-6.906c-7.399,0-13.313,6.061-14.071,14.415c-0.06,0.369-0.306,2.311,0.442,5.478c1.078,4.568,3.568,8.723,7.199,12.013l18.115,16.439l18.426-16.438c3.631-3.291,6.121-7.445,7.199-12.014C52.216,18.553,51.97,16.611,51.911,16.242z M49.521,21.261c-0.984,4.172-3.265,7.973-6.59,10.985L25.855,47.481L9.072,32.25c-3.331-3.018-5.611-6.818-6.596-10.99c-0.708-2.997-0.417-4.69-0.416-4.701l0.015-0.101C2.725,9.139,7.806,3.826,14.158,3.826c4.687,0,8.813,2.88,10.771,7.515l0.921,2.183l0.921-2.183c1.927-4.564,6.271-7.514,11.069-7.514c6.351,0,11.433,5.313,12.096,12.727C49.938,16.57,50.229,18.264,49.521,21.261z'/></svg>",
	wishlistText: "Thêm vào yêu thích",
	wishlistTextAdded: "Đến trang Tour yêu thích",
	wishlistRemove: "Xóa"
};