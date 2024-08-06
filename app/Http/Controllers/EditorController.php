<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
   public function uploadImage(Request $request){
        $originName=$request->file('file')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $name = uniqid() . '_' . trim($originName);
        $imgpath = $request->file('file')->move(public_path('assets/uploads/media/'), $name);
        $url = asset('/assets/uploads/media/'.$name); 
        return response()->json(['location'=>$url]); 
        

    }
}
