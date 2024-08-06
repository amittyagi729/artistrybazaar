<?php

namespace App\Http\Controllers\Admin\BuyerControllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\BuyerAnnualRevenue;

class BuyerAnnualRevenueController extends Controller
{
    public function index()
    {
        $annualRevenue = BuyerAnnualRevenue::all();
        return view('admin.buyer-management.annual-revenue.index',compact('annualRevenue')); 
    }
}
























