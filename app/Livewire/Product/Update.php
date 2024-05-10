<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\ProductSubCategory;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $product;
    public $sub_category;
    public $title;
    public $price;
    public $description;
    public $image;
    public $image_db;
//    public $sub_categories;


    public function mount($slug) //To pass data to the component
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();

        $this->title = $this->product->title;
        $this->price = $this->product->price;
        $this->description = $this->product->description;

        $this->image_db = asset('storage/' . $this->product->product_image);

    }

    public function render() // to return a Blade view
    {
        $sub_categories = ProductSubCategory::orderBy('name', 'ASC')->get();
        $this->sub_category = $this->product->productSubCategory->id;


        return view('livewire.product.update')->layout('layouts.app')->with(['sub_categories' => $sub_categories]);
    }

    public function save()
    {
        $this->validate([
            'sub_category' => 'required|exists:product_sub_categories,id',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sub_category = ProductSubCategory::find($this->sub_category);

        if ($this->image) {

            $filename = $this->image->store('products', 'public');
        }



        $title_db = $this->product->title;

        // unique slug
        if ($title_db != $this->title) {
            $slug = $this->title . '-' . $sub_category->productCategory->name . '-' . Str::lower( Str::random(4));
        } else {
            $slug = $this->product->slug;
        }

        //coalescing operator ??  - ?:

        $this->product->update([
            'category_id' => $sub_category->productCategory->id,
            'sub_category_id' => $sub_category->id,
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'product_image' => $filename ?? $this->product->product_image,
            'slug' => Str::slug($slug),
            'status'  => true,

        ]);



        session()->flash('success', 'Product updated successfully.');
    }
}
