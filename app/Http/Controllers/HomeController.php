<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //$category = ProductCategory::find(4);
        //$subCategory = $category->productSubCategory;
        //dd($subCategory);

        $categories = ProductCategory::orderBy('name','ASC')->get();

        return view('home')
            ->with(['categories' => $categories]);
    }
}
