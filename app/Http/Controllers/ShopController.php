<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {


//        $products = Product::paginate(4);
//        $productCatogories = ProductCategory::orderBy('name', 'ASC')->get();
//        $productCount = Product::count();
//        return view('shop', ['products' => $products, 'productCount' => $productCount, 'product_categories' => $productCatogories]);
        return view('shop')->with('search_term', request()->search_term ?? null);

    }
}
