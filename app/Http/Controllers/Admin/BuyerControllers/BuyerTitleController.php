<?php

namespace App\Http\Controllers\Admin\BuyerControllers;
use App\Http\Controllers\Controller;
use App\Models\BuyerTitle;

use Illuminate\Http\Request;

class BuyerTitleController extends Controller
{
    public function index(){
        $titles = BuyerTitle::all();
       return view('admin.buyer-management.buyer-title.index',compact('titles')); 
    }

    public function store(Request $request){
        
        try {
            $is_active = $request->is_active;
            $title = new BuyerTitle();
            $title->name = $request->name;
            $title->is_active = isset($is_active) && !empty($is_active) ? 1 : 0;
            $title->save();

            notify()->success('Title has been created successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            notify()->error('An error occurred while creating the address type.');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
