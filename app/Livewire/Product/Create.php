<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $sub_category;
    public $title;
    public $price;
    public $description;
    public $image;
    public $sub_categories;


    public function mount()
    {


    }


    public function render()
    {
        $this->sub_categories = ProductSubCategory::orderBy('name', 'ASC')->get();

        return view('livewire.product.create')
            ->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'sub_category' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sub_category_id = $this->sub_category;
        $sub_category = ProductSubCategory::find($sub_category_id);

//        $filename = 'products/product_image.' . $this->image->getClientOriginalExtension();
        $filename = $this->image->store('products', 'public');

        // unique slug
        $slug = $this->title . '-' . $sub_category->productCategory->name . '-' . Str::lower( Str::random(4));


        Product::create([
           'category_id' => $sub_category->productCategory->id,
            'sub_category_id' => $sub_category->id,
            'user_id' => auth()->id(),
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'product_image' => $filename,
            'slug' => Str::slug($slug),
            'status'  => true,
        ]);

        session()->flash('success', 'Product created successfully.');

        $this->reset();

        return redirect()->route('product.create');
    }




}
