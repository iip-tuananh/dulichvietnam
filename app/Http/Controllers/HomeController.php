<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\product\Category;
use App\models\product\Product;
use App\models\blog\Blog;
use Session;
use App\models\website\Partner;
use App\models\blog\BlogCategory;
use App\models\BannerAds;
use App\models\PageContent;
use  App\models\ReviewCus;
use App\models\website\Prize;

class HomeController extends Controller
{
    public function home()
    {
        $data['partner'] = Partner::where(['status'=>1])->get(['id','image','name','link']);
        $data['prizes'] = Prize::where(['status'=>1])->get();
        $data['reviewCus'] = ReviewCus::where(['status'=>1])->get();
        $data['aboutUs'] = PageContent::where(['status'=>1, 'type'=>'ve-chung-toi', 'language'=>'vi'])->first();
        $data['homeProduct'] = Product::where(['status'=>1, 'discountStatus'=>1])->get(['id','category','name','discount','price','images','slug','cate_slug','type_slug','date_tour', 'type_tour', 'preserve']);
        $data['homeBlog'] = Blog::where(['status'=>1, 'home_status'=>1])->orderBy('id', 'desc')->limit(4)->get(['id','title','image','description','created_at','slug','category']);
        return view('home',$data);
    }
}
