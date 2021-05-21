<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use File;

class ImageController extends Controller
{
    public function index() {
      $categories = Category::orderBy('id', 'DESC')->get();
      $images = Image::orderBy('id', 'DESC')->get();
      return view('screen')->with([
        'category' => $categories,
        'image' => $images
      ]);
    }

    public function screensupload(Request $request) {
      
      $target_dir = 'upload/screens/';

        if (!is_dir($target_dir)) {
          mkdir($target_dir, 0777, true);
        }
        $random_name = md5(uniqid(rand(), true));
        $target_file = $target_dir . $random_name.basename($_FILES["file"]["name"]);
        $msg = "";
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
          $msg = "Successfully uploaded";
        } else {
          $msg = "Error while uploading";
        }
        echo $msg;
    }

    public function screenssave(Request $request) {
      $category_id = $request->c_id;
      $screens_id = $request->s_id;
      $source_dir = 'upload/screens/';
      $target_dir = 'storage/screens/';
     
      if (!is_dir($target_dir)) {
        if (!mkdir($target_dir, 0777, true)) {
          echo 'fail';
          exit;
        }
      }
      
      foreach (scandir($source_dir) as $key => $file) {
        if ($file == '.' || $file == '..')
          continue;
        copy($source_dir . $file, $target_dir . $file);
        unlink($source_dir . $file);
        if(File::exists($source_dir)) {
            File::delete($source_dir);
        }
        $screensimage = $target_dir . $file;
        $res = Image::create([
          'image' => $screensimage,
          'role'=>'0',
          'time'=>'3000',
          'position'=>$screens_id,
          'category_id' =>$category_id
        ]);
      }
      return response()->json(['data'=>'1']);
    }

    public function screensremove(Request $request) {
        $id = $request->id;
        $image_name = Image::where('id', $id)->first('image');
        
        if(\File::exists(public_path($image_name->image))){
          \File::delete(public_path($image_name->image));
          $res = Image::where('id',$id)->delete();
          if($res == "1") {
            return response()->json(['data' => '1']);
          }

        }else{
          return response()->json(['data' => "0"]);
        }
    }
}
