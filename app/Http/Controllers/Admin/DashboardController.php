<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getMonthlyUsers($year)
    {
        $userCounts = monthlyUsers($year);
        $formattedData = array_values($userCounts);
        return response()->json($formattedData);
    }
    public function getMonthlyOrders($year)
    {
        $userCounts = monthlyOrders($year);
        $formattedData = array_values($userCounts);
        return response()->json($formattedData);
    }
    public function getMonthlyRevenue($year)
    {
        $userCounts = monthlyRevenue($year);
        $formattedData = array_values($userCounts);
        return response()->json($formattedData);
    }
    public function getMonthlyShipping($year)
    {
        $userCounts = monthlyShipping($year);
        $formattedData = array_values($userCounts);
        return response()->json($formattedData);
    }
}
