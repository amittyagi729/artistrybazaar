<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Events;
use App\Models\EventsProduct;
use App\Models\MaterialType;

class EventController extends Controller
{
    public function index($slug)
    {
        $event = Events::where('custom_url', $slug)->first();
    
        if (!$event) {
            abort(404);
        }
    
        $eventProducts = EventsProduct::where('event_id', $event->id)->pluck('product_id')->toArray();
    
        $products = Product::whereIn('id', $eventProducts)->get();
    
        $materialTypes = MaterialType::where('is_active', true)
            ->whereIn('id', $products->pluck('material')->toArray())
            ->distinct()
            ->get();
            
        return view('frontend.search1', [
            'products' => $products,
            'custom_url' => $slug,
            'materialTypes' => $materialTypes 
        ]);
    }
    
}
