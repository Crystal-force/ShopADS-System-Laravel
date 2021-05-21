<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Image;
use App\Models\Statu;

class PublishController extends Controller
{
    public function index() {
      $category = Category::orderBy('id', 'DESC')->get();
      return view('publish')->with([
        'category' => $category
        ]);
    }

    public function publishpage(Request $request) {
        $id = $request->id;
        $role = "1";
        $slide_one = $request->slide_time_1;
        $slide_two = $request->slide_time_2;

        Statu::where('id', '1')->update([
          'statu' => '1'
        ]);
        Category::where('role', '1')->update(['role'=>'0']);
        News::where('role', '1')->update(['role'=>'0']);
        Image::where('role', '1')->update(['role'=>'0']);

        $res_1 = Category::where('id', $id)->update(['role'=>$role]);
        $res_2 = News::where('category_id', $id)->update(['role'=>$role]);
        $res_3 = Image::where('category_id', $id)->update(['role'=>$role]);
        $res_4 = Image::where('category_id', $id)->where('position', '1')->update(['time'=>$slide_one]);
        $res_5 = Image::where('category_id', $id)->where('position', '2')->update(['time'=>$slide_two]);

        return response()->json(['data'=>'1']);
    }

    public function selectedimages(Request $request) {
       $category_id = $request->id;

        $images = Image::where('category_id', $category_id)->get();
        if(sizeof($images)) {
          return response()->json(['data'=>$images]);
        }
        return response()->json(['data'=>'0']);
    }

}
