<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\RentedItem;
use Livewire\Component;
use Livewire\WithPagination;

class UserFeedback extends Component
{

    use withPagination;

    public $product;
    public $comment;
    public $rating;

    public function mount($product_id){
        $this->product = Product::find($product_id);
    }

    public function render()
    {
        // check if the product has been rented by the user and had been completed
        $product_check_if_rented_by_user = RentedItem::where([
            "product_id" => $this->product->id,
            "rentee_id" => auth()->id(),
            "status" => "completed"
        ])->exists();

        // check if the user has already given feedback for the product
        $review_existence = ProductReview::where([
            "product_id" => $this->product->id,
            "user_id" => auth()->id()
        ])->exists();

        // view all the reviews for the item
        $reviews_for_product = ProductReview::where("product_id", $this->product->id)->paginate(3);

        $total_reviews_count = ProductReview::where("product_id", $this->product->id)->count();

//        dd($product_check_if_rented_by_user);

        return view('livewire.user-feedback')
            ->layout('layouts.base')
            ->with([
                "product_check_if_rented_by_user" => $product_check_if_rented_by_user,
                "review_existence" => $review_existence,
                "reviews" => $reviews_for_product,
                "total_reviews_count" => $total_reviews_count
            ]);
    }

    public function save()
    {
        $this->validate([
            'comment' => 'required|string|max:4500',
            'rating' => 'required|integer|between:1,5'
        ]);

        $review = ProductReview::create([
            "user_id" => auth()->id(),
            "product_id" => $this->product->id,
            "rating" => $this->rating,
            "comment" => $this->comment
        ]);

        return redirect()->route('product-details', ["category" => $this->product->productCategory->slug, "sub_category" => $this->product->productSubCategory->slug, "slug" => $this->product->slug]);
    }



}
