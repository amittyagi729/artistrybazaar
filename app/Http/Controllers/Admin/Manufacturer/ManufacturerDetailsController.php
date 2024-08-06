<?php

namespace App\Http\Controllers\Admin\Manufacturer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ManufacturerDetailsController extends Controller
{
    public function index(){
        return view('admin.manufacturer.details.index');
    }
}
