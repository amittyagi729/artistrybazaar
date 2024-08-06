<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\TermRelationships;
use DB;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $cat = $request->input('k');
        if(isset($cat)){
            $categoryId = Category::where('slug', $cat)->first();
           $products = TermRelationships::where('term_taxonomy_id', $categoryId->id)->pluck('product_id')->toArray();
           $filteredProducts = Product::whereIn('id', $products)->where('title', 'LIKE', "%$q%")->paginate(28);
           $filteredProducts->appends(['q' => $q, 'cat' => $cat]);
           return view('frontend.search-products',['products'=>$filteredProducts]);
        }
        

        $products = Product::where('upc', 'LIKE', "%$q%")->orWhere('title', 'LIKE', "%$q%")->paginate(28);
        $products->appends(['q' => $q]);
        return view('frontend.search-products',['products'=>$products]);
    }

public function mbSearch($input){

        $query = "
            SELECT *
            FROM tbl_categories
            WHERE (meta_title LIKE ? OR meta_description LIKE ?)
            AND deleted_at IS NULL
            AND is_active = 1
            LIMIT 5
        ";

        $results = DB::select($query, ["%$input%", "%$input%"]);

    return response()->json($results);
}
}
