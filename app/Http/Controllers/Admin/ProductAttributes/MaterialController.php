<?php

namespace App\Http\Controllers\Admin\ProductAttributes;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\MaterialType;

class MaterialController extends Controller
{
    public function index(){
        $types = MaterialType::all();
        return view('admin.product-attributes.material.index',compact('types'));
    }

    public function store(Request $request){
        try {
            $is_active = $request->is_active;
            $type = new MaterialType();
            $type->name = $request->name;
            $type->is_active = isset($is_active) && !empty($is_active) ? 1 : 0;
            $type->save();

            notify()->success('Material type has been created successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            notify()->error('An error occurred while creating the Material type.');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
       $material = MaterialType::findOrFail($id);
       $material->delete();
       notify()->success('Material has been deleted successfully.');
       return redirect()->back();
        } catch (\Exception $e) {
            notify()->error('An error occurred while deleting the Material type.');
            return redirect()->back();
        }
    }
}
