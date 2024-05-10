<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
    }

    public function view(Request $request, $category, $sub_category, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();  //to check if slug exists
        $category = $product->productSubCategory->productCategory->name;
        $sub_category = $product->productSubCategory->name;

        $similar_subcategories = ProductSubCategory::where('category_id', $product->category_id)->get();


        //to set the url parameters when a product is lead to the details page
        return view('product-details',[
            'product' => $product,
            'category' => $category,
            'sub_category' => $sub_category,
            'similar_subcategories' => $similar_subcategories
        ]);

    }

    public function viewProducts()
    {
        if (auth()->user()->hasRole('Admin')) {
            $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $products = Product::where('user_id', auth()->id)
                            ->orderBy('created_at', 'DESC')->paginate(10);
        }


        return view('admin.product.index', [
            'products' => $products
        ]);
    }



    public function viewUserProducts()
    {
        $userProducts = Product::where('user_id', auth()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('dashboard', ['userProducts' => $userProducts]);
    }





    public function viewProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('admin.product.view-product', [
            'product' => $product
        ]);
    }
}
