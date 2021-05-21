<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use App\Models\News;
use App\User;

class DashboardController extends Controller
{
    public function index() {
      $images = Image::orderBy('id', 'DESC')->get();
      $categories = Category::orderBy('id', 'DESC')->get();
      $image_count = count($images);
      $category_count = count($categories);
      $news_count = count(News::get());
      $admin_count = count(User::get());
      
      return view('dashboard')->with([
        'image' => $images,
        'category' => $categories,
        'img_count' => $image_count,
        'ca_count' => $category_count,
        'news_count' => $news_count,
        'admin_count' => $admin_count
      ]);
    }
}
