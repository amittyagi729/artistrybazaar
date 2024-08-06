<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CitiesTable;

use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function getCityByCountryId($id){
        try {
            $city = Cities::active()->where('state_id', $id)->orderBy('name')->get();

            return response()->json([
                'status' => 'success',
                'data' => $city
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving states.'
            ]);
        }
    }

    public function importExcel() {
        return view('admin.location.importCities');
    }

    public function storeExcel(Request $request) {
            $file = $request->file;
            Excel::import(new CitiesTable,$file);
            notify()->success('Cities Added successfully.');
            return redirect()->back();
    }
}