<?php

namespace App\Providers;

use App\models\BannerAds;
use App\models\blog\Blog;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Session,View;
use App\models\website\Setting;
use App\models\website\Banner;
use Cart,Auth;
use App\models\PageContent;
use Laravel\Dusk\DuskServiceProvider;
use App\models\product\Category;
use App\models\language\Language;
use App\models\Province;
use App\models\Services;
use App\models\Promotion;
use App\models\blog\BlogCategory;
use App\models\product\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) 
        {
            if(Auth::guard('customer')->user() != null){
                $profile = Auth::guard('customer')->user();
            }else{
                $profile = "";
            }
            $language_current = Session::get('locale');
            $promotio = Promotion::where('status',1)->orderBy('id','DESC')->get();
            $servicehome = Services::where('status',1)->orderBy('id','DESC')->get();
            $bannerAds = BannerAds::where('status',1)->get(['name','image','id']);
            $setting = Setting::first();
            $lang = Language::get();
            $categoryhome = Category::with([
                'typeCate' => function ($query) {
                    $query->with(['typetwo'])->where('status',1)->orderBy('id','DESC')->select('cate_id','id', 'name','avatar','slug','cate_slug'); 
                }
            ])->where('status',1)->orderBy('id','asc')->get(['id','name','imagehome','avatar','slug'])->map(function ($query) {
                $query->setRelation('product', $query->product->take(10));
                return $query;
            });
            $banners = Banner::where(['status'=>1])->get(['id','image','link','title','description']);
            $cartcontent = session()->get('cart', []);
            $viewold = session()->get('viewoldpro', []);
            $compare = session()->get('compareProduct', []);
            $blogCate = BlogCategory::with([
                'typeCate' => function ($query){
                    $query->select('id','slug','name','avatar','category_slug');
                },
                'listBlog' => function ($query){
                    $query->where(['status'=>1, 'home_status'=>1])->get();
                }
            ])
            ->where('status',1)
            ->orderBy('id','asc')
            ->get(['id','name','slug','avatar']);
            $hotBlogs = Blog::where([
                'status'=>1, 'home_status'=>1
            ])->orderBy('id','DESC')->get(['id','title','slug','image','description']);
            $hotProduct = Product::where(['status'=>1, 'discountStatus'=>1])->limit(8)->get(['id', 'name', 'cate_slug', 'slug', 'price', 'images']);
            $view->with([
                'promotio' => $promotio,
                'setting' => $setting,
                'lang' => $lang,
                'banners'=>$banners,
                'profile' =>$profile,
                'categoryhome'=> $categoryhome,
                'cartcontent'=>$cartcontent,
                'viewold'=>$viewold,
                'compare'=>$compare,
                'blogCate'=>$blogCate,
                'servicehome'=>$servicehome,
                'hotBlogs'=>$hotBlogs,
                'hotProduct'=>$hotProduct,
                'bannerAds'=>$bannerAds
                ]);    
        });  
    }
}
