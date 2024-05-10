<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;


class ShopFilter extends Component
{
    use withPagination;

    public $search_term = '';
    public $filter;
    public $price = [];
    public $category;
    public $product_categories;
    public $selectedCategories = [];


    public function mount()
    {
        $this->search_term = request()->search_term;
        $this->product_categories = ProductCategory::orderBy('name', 'ASC')->get();
    }

    public function render()
    {

        return view('livewire.shop-filter')
            ->layout('layouts.base')
            ->with(['products' => $this->filterProducts()]);

    }

    public function filterProducts()
    {
//       dd($this->price);



        if ($this->search_term == null) {

            return Product::when($this->price, function($query) {
                $query->where(function ($query) {

                    foreach ($this->price as $price) {
                        switch ($price) {
                            case "500":
                                $query->orWhere('price', '<', 500);
                                break;
                            case "1500":
                                $query->orWhere('price', '>=', 500)->where('price', '<', 1500);
                                break;
                            case "2500":
                                $query->orWhere('price', '>=', 1500)->where('price', '<', 2500);
                                break;
                            case "above2500":
                                $query->orWhere('price', '>=', 2500);
                                break;
                            default:
                                break;
                        }

                    }

                });
            })->when($this->selectedCategories, function($query) {
                $query->whereHas('productCategory', function ($query) {
                    $query->whereIn('id', $this->selectedCategories);
                });
            })
                ->latest()->paginate(9);
        } else {

            return Product::where("title", "like", "%" . $this->search_term . "%")
                ->latest()->paginate(9);
        }




    }

    public function clearFilter()
    {
        if ($this->search_term == null) {
            $this->reset("price", "selectedCategories");
        } else {
            $this->reset("search_term");
            return redirect()->route('shop');
        }


    }
}
