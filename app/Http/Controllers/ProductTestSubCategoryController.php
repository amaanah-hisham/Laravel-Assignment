<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductTestSubCategoryController extends Controller
{
    public function viewSubCategoryForm()
    {
        $categories = ProductCategory::orderBy('id', 'DESC')->get();

        return view('admin.product_sub_category.form', [
            'categories' => $categories
        ]);
    }

    public function storeSubCategory(Request $request)
    {
        dd($request->all());
    }
}
