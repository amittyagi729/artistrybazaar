<?php

namespace App\Http\Controllers\Admin\ProductAttributes;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ColorModel;

class ColorController extends Controller
{
    public function index(){
        $types = ColorModel::all();
        return view('admin.product-attributes.color.index',compact('types'));
    }

    public function store(Request $request){
        try {
            $is_active = $request->is_active;
            $type = new ColorModel();
            $type->name = $request->name;
            $type->is_active = isset($is_active) && !empty($is_active) ? 1 : 0;
            $type->save();

            notify()->success('Color type has been created successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            notify()->error('An error occurred while creating the Color.');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
