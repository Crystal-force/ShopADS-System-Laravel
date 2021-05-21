<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Image;
use App\Models\Statu;

class UserController extends Controller
{
    public function index() {
      
      $company = Category::where('role', '1')->first();
      $images_one = Image::where('role', '1')->where('position', '1')->get();
      $images_two = Image::where('role', '1')->where('position', '2')->get();

      $images_one_time= Image::where('role', '1')->where('position', '1')->first('time');
      $images_two_time= Image::where('role', '1')->where('position', '2')->first('time');
      $news = News::where('role', '1')->first();
      
      // if(is_null($company) || isset($images_one) || isset($images_two) || is_null($images_one_time) || is_null($images_two_time) || is_null($news)) {
      //   return view('comming');
      // }
      return view('main')->with([
        'company'=>$company,
        'news'=>$news,
        'img_one'=>$images_one,
        'img_two'=>$images_two,
        'img_time_1'=>$images_one_time,
        'img_time_2'=>$images_two_time
      ]);
    }

    public function teststatu() {
      $statu = Statu::orderBy('id', 'DESC')->first();
      if($statu->statu == "1") {
        Statu::where('id', '1')->update(['statu'=>'0']);
        return response()->json(['data' => '1']);
      }
      if($statu->statu == "0") {
        return response()->json(['data'=>'0']);
      }
    }

  
}
