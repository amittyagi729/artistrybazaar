<?php

namespace App\Http\Controllers\Admin\Shipping;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PriceTable;
use App\Models\ShippingPrice;

use Illuminate\Http\Request;

class ShippingPriceController extends Controller
{
    public function index(){
        $price = ShippingPrice::where('is_active','1')->get();
        return view('admin.shipping.shipping-price.index',compact('price'));
    }
    public function importExcel(){
        return view('admin.shipping.shipping-price.import-excel');
    }

    public function storeExcel(Request $request)
    {
        try{
            $file = $request->file;
            Excel::import(new PriceTable,$file);
            notify()->success('Prices Added successfully.');
            return redirect()->back();
        }catch(\Exception $e){
            notify()->error('Something went wrong');
            return redirect()->back();
        }
        
    }
}
