<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index() {
      $category = Category::orderBy('id', 'DESC')->get();
      $news_list = News::orderBy('id', 'DESC')->get();
      return view('news')->with([
        'category' => $category,
        'news' => $news_list
      ]);
    }

    public function addnews(Request $request) {
      $category_id = $request->category_id;
      $add_content = $request->news_content;
      $res = News::where('category_id', $category_id)->get('content');
      // dd($res);
      if(sizeof($res)) {
          return response()->json(['data'=>'0']);
      }
     
      News::create([
        'content' => $add_content,
        'category_id' => $category_id,
        'role'=>'0'
      ]);
      return response()->json(['data'=>'1']);
      
    }

    public function removenews(Request $request) {
      $id = $request->news_id;
      $res = News::where('id', $id)->delete();
      if($res == "1") {
        return response()->json(['data' => '1']);
      }
    }

    public function editnews(Request $request) {
        $id = $request->news_id;
        $news = $request->news_content;
        
        $res = News::where('id', $id)->update(['content'=>$news]);
        if($res == "1") {
          return response()->json(['data' => '1']);
        }
    }
}
