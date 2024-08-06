<?php

namespace App\Http\Controllers\Admin\BuyerControllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\BuyerType;

class BuyerTypeController extends Controller
{
    public function index()
    {
        $buyers = BuyerType::all();
        return view('admin.buyer-management.buyer-types.index',compact('buyers'));
    }
}