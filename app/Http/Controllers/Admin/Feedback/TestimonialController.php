<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Models\Product;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonials::all();
        return view('admin.feedbacks.testimonials.index',
        ['testimonials' => $testimonials]);
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.feedbacks.testimonials.create',compact('products'));
    }

    public function store(Request $request)
    {
        try{
            $approved = $request->approved;
            $userId = $request->user_id;
            $user = isset($userId) ? getUser($userId) : null;
            $testimonial = new Testimonials();
            $testimonial->name =  $user->first_name ?? null;
            $testimonial->email = $user->email ?? null;
            $testimonial->message = $request->message;
            $testimonial->product_id = $request->product_id;
            $testimonial->user_id = $request->userId;
            $testimonial->approved = isset($approved) && !empty($approved) ? 1 : 0;
            $testimonial->save();
            notify()->success('Testimonial Added successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            notify()->error('Something went wrong');
            return redirect()->back();
        }
    
    }
}
