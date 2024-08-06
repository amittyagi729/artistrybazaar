<?php

namespace App\Http\Controllers\Admin\AddressControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DefaultAddress;
use App\Exports\DatabaseExporter;

class DefaultAddressController extends Controller
{
    public function index(){
        return view('admin.addresses.defaultaddress.index');
    }
}