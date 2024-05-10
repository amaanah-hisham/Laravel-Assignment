<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\RentedItem;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRentedItemRequest;
use App\Http\Requests\UpdateRentedItemRequest;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //$category = ProductCategory::find(4);
        //$subCategory = $category->productSubCategory;
        //dd($subCategory);

        $categories = ProductCategory::orderBy('name','ASC')->get();
        $products = Product::orderBy('created_at', 'DESC')->paginate(8);

        return view('home')
            ->with([
                'categories' => $categories,
                'products' => $products
            ]);

    }

    public function viewDashboard()
    {
        if (auth()->user()->hasRole('Renter')) {


            $userProducts = Product::where('user_id', auth()->id())
                ->orderBy('created_at', 'DESC')
                ->paginate(10);

            return view('dashboard', [

                'userProducts' => $userProducts
            ]);
        }

        if (auth()->user()->hasRole('Rentee')) {

            $rented_items = RentedItem::where('rentee_id', auth()->id())->paginate(5);

            return view('dashboard', [
                'rented_items' => $rented_items
            ]);
        }

        if (auth()->user()->hasRole('Admin')) {

            $users_counts = User::count();
            $product_counts = Product::count();
            $rented_items_count = RentedItem::where('status', 'rented')->count();
            $rent_requests_count = RentedItem::where('status', 'requested')->count();
            $users_for_last_30_days = User::where('created_at', '>=', now()->subDays(30))->count();

            $categories = ProductCategory::orderBy('name','ASC')->get();

            $mostly_requested = Product::withCount(['rentedItem' => function ($query) {
                $query->where('status', 'requested');
            }])->orderBy('rented_item_count', "desc")->get();

            return view("dashboard")->with([
                'users_counts' => $users_counts,
                'product_counts' => $product_counts,
                'rented_items_count' => $rented_items_count,
                'rent_requests_count' => $rent_requests_count,
                'users_for_last_30_days' => $users_for_last_30_days,
                'categories' => $categories,
                'mostly_requested' => $mostly_requested
            ]);
        }

//        https://stackoverflow.com/a/72083289/7964905  - rent requests popular count nested where

//        return view('dashboard', [
//            'rented_items' => $rented_items,
//            'userProducts' => $userProducts,
//            'users_counts' => $users_counts,
//            'categories' => $categories,
//            'users_for_last_30_days' => $users_for_last_30_days,
//            'rented_items_count' => $rented_items_count,
//            'rent_requests_count' => $rent_requests_count,
//            'product_counts' => $product_counts,
//            'mostly_requested' => $mostly_requested
//        ]);


    }


}
