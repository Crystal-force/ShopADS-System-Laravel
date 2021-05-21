<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
      $all_category = Category::orderBy('id', 'DESC')->get();
      
      return view('category')->with([
        'category' => $all_category
      ]);
    }

    public function addcategory(Request $request) {
      $category = $request->category;
      
      if (!is_null(Category::where('name', $category)->first())) {
        return response()->json(['data' => '0']);
      }
      else {
        Category::create([
          'name' => $category,
          'role' => '0'
        ]);
        return response()->json(['data'=>'1']);
      }
    }

    public function removecategory(Request $request) {
      $category_id = $request->id;
      $res = Category::where('id', $category_id)->delete();
      if($res == "1") {
        return response()->json(['data' => '1']);
      }

    }

    public function editcategory(Request $request) {
      $category_id = $request->id;
      $category_name = $request->name;

      if($category_name == null) {
        return response()->json(['data'=>'0']);
      }
      else {
        $res = Category::where('id',$category_id)->update(['name' => $category_name]);
        if($res == "1") {
          return response()->json(['data'=>'1']);
        }
      }
    }
}
