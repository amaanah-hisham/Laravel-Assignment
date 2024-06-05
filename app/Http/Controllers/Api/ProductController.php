<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        $product_existence = Product::where("user_id", auth()->user()->id)->exists();

        if($product_existence) {

            $products = Product::where("user_id", auth()->user()->id)->get();

            return response()->json([
                'products' => $products,
            ]);
        } else {

            return response()->json([
                'error' => 'No products to be shown'
            ]);
        }


    }

    public function getProductsl(Request $request)
    {


            $products = Product::all();

            return response()->json([
                'products' => $products,
            ]);


    }
}
