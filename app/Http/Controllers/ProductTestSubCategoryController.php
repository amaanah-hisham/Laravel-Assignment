<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductTestSubCategoryController extends Controller
{
    public function viewSubCategoryForm()
    {
        $categories = ProductCategory::orderBy('id', 'DESC')->get();

        return view('admin.product_sub_category.create-sub-category-form', [
            'categories' => $categories
        ]);
    }

    public function storeSubCategory(Request $request)
    {

        // validating sub category form inputs

        $validated = $request->validate([
            'category' => 'required|exists:product_categories,id',
            'sub_category' => 'required|unique:product_sub_categories,name|string|max:255',
        ]);


        ProductSubCategory::create([
            'category_id' => $request->category,
            'name' => $request->sub_category,
            'slug' => Str::slug($request->sub_category),
            'status' => 1,
        ]);

        return redirect()
            ->route('product-sub-categories-view')
            ->with('success', 'Product Sub Category successfully created!')
            ->withInput()
            ->withErrors($validated);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product_sub_category.create-sub-category-form', [

        ]);
    }

    public function viewEditSubCategoryForm($slug)
    {
        $subCategory = ProductSubCategory::where('slug', $slug)->first();
        $categories = ProductCategory::orderBy('id', 'DESC')->get();

        return view('admin.product_sub_category.edit-sub-category-form', [
            'subCategory' => $subCategory,
            'categories' => $categories
        ]);
    }

    public function updateSubCategory(Request $request, $slug)
    {
        $subCategory = ProductSubCategory::where('slug', $slug)->first();

        // https://stackoverflow.com/questions/28198897/laravel-check-for-unique-rule-without-itself-in-update

        $validated = $request->validate([
            'category' => 'required|exists:product_categories,id',
            'sub_category' => 'required|string|max:255|unique:product_sub_categories,name,'. $subCategory->id  // ignoring the same record trying to update by the id and keeping the uniqueness of the column type
        ]);


        $subCategory->update([
            'category_id' => $request->category,
            'name' => $request->sub_category,
            'slug' => Str::slug($request->sub_category),
            'status' => 1,
        ]);

        return redirect()
            ->route('product-sub-categories-view')
            ->with('success', 'Product Sub Category successfully updated!')
            ->withInput()
            ->withErrors($validated);
    }


    public function showSubCategories(){

        $subCategories = ProductSubCategory::orderBy('name', 'ASC')->paginate(10);
        return view('admin.product_sub_category.index', [
            'product_sub_categories' => $subCategories
        ]);

    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();



        return redirect()->route('product-category.index')->with('success', 'Product Category successfully deleted!');
    }

    public function destroySubCategory($slug)
    {
        $subCategory = ProductSubCategory::where('slug', $slug)->firstOrFail();

        $subCategory->delete();

        return redirect()->route('product-sub-categories-view')->with('success', 'Product Sub Category successfully deleted!');
    }


}
