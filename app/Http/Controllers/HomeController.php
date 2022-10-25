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
        $data['reviewCus'] = ReviewCus::where(['status'=>1])->orderBy('id', 'desc')->get();
        $data['aboutUs'] = PageContent::where(['status'=>1, 'type'=>'ve-chung-toi', 'language'=>'vi'])->first();
        $data['homeProduct'] = Product::where(['status'=>1, 'discountStatus'=>1])->get(['id','category','name','discount','price','images','slug','cate_slug','type_slug','date_tour', 'type_tour', 'preserve']);
        $data['homeBlog'] = Blog::where(['status'=>1, 'home_status'=>1])->orderBy('id', 'desc')->limit(4)->get(['id','title','image','description','created_at','slug','category']);
        return view('home',$data);
    }
    public function uploadImagePro()
    {
        $ds = DIRECTORY_SEPARATOR;  //1
        $storeFolder = 'uploads';   //2
        if (!empty($_FILES)) {
            $tempFile = $_FILES['files']['tmp_name'];
            $file_name = $_FILES['files']['name'];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if(filesize($tempFile) > 5000000){
                echo 'FAILED';
                die();
            }

            if($ext == 'jpg' || $ext == 'png' || $ext == 'JPG' || $ext == 'PNG'){
                $new_file_name = time().'.'.$ext;
                $targetPath = 'uploads/images/';  //4
                $targetFile =  $targetPath. $new_file_name;  //5

                if ($img = @imagecreatefromstring(file_get_contents($tempFile))) {
                    $upload_result = move_uploaded_file($tempFile,$targetFile); //6
                    echo $new_file_name;
                }else{
                    echo 'FAILED';
                }
            }else{
                echo 'FAILED';
            }
        }
    }
    public function deleteImagePro(Request $request)
    {
        $file= str_replace('http://localhost:8080','',$request->avatar);
        $filename = public_path().$file;
        if(file_exists( public_path().$file ) ){
            \File::delete($filename);
        }
        return response()->json(['message'=>'Delete Success'],200);
    }
    public function uploadReviewCus(Request $request, ReviewCus $rev)
    {
        $data['query'] = $rev->saveReviewCus($request);
        $data['reviewCus'] = ReviewCus::where(['status'=>1])->orderBy('id', 'desc')->get();
        $html = view('layouts.product.review-cus', $data)->render();
        return response()->json([
    		'message' => 'Save Success',
    		'html'=> $html
    	],200);
    }
}
