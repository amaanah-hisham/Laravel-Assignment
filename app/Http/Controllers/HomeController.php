<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\RentedItem;
use App\Models\User;
use Carbon\Carbon;
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
                ->withCount(['rentedItem as rented_items_count' => function ($query) {
                    $query->where('status', 'requested');
                }])
                ->orderBy('created_at', 'DESC')
                ->paginate(10);

//            $productId = $userProducts->first()->id;
//            $product = Product::findOrFail($productId);
            $rent_requests_count = RentedItem::where('status', 'requested')->orderBy('created_at', 'desc')->count();
            $approved_rents = RentedItem::where('renter_id', auth()->id())->where('status', 'approved')->orderBy('created_at', 'desc')->paginate(5);
            $rented_items = RentedItem::where('renter_id', auth()->id())->where('status', 'rented')->orderBy('created_at', 'desc')->paginate(5);
            $completed_rents = RentedItem::where('renter_id', auth()->id())->where('status', 'completed')->orderBy('created_at', 'desc')->paginate(5);

            return view('dashboard', [
                'userProducts' => $userProducts,
                'rent_requests_count' => $rent_requests_count,
                'rented_items' => $rented_items,
                'approved_rents' => $approved_rents,
//                'product' => $product,
                'completed_rents' => $completed_rents
            ]);
        }

        if (auth()->user()->hasRole('Rentee')) {

            $rented_items = RentedItem::where('rentee_id', auth()->id())
                ->whereIn('status', ['rented', 'approved'])
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            $rent_requests = RentedItem::where('rentee_id', auth()->id())
                ->where('status', 'requested')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            $completed_rents = RentedItem::where('rentee_id', auth()->id())
                ->where('status', 'completed')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

//            $rented_items = RentedItem::where('rentee_id', auth()->id())
//                ->whereIn('status', ['rented', 'approved'])
//                ->paginate(5);
//            $rent_requests = RentedItem::where('rentee_id', auth()->id())->where('status', 'requested')->paginate(5);
//            $completed_rents = RentedItem::where('rentee_id', auth()->id())->where('status', 'completed')->paginate(5);
//

            return view('dashboard', [
                'rented_items' => $rented_items,
                'rent_requests' => $rent_requests,
                'completed_rents' => $completed_rents,
            ]);
        }

        if (auth()->user()->hasRole('Admin')) {

            $product_counts = Product::count();
            $rented_items_count = RentedItem::where('status', 'rented')->count();
            $rent_requests_count = RentedItem::where('status', 'requested')->count();
            $users_for_last_30_days = User::where('created_at', '>=', now()->subDays(30))->count();
            $completed_rents = RentedItem::where('status', 'completed')->count();
            $approved_rents = RentedItem::where('status', 'approved')->count();

            $categories = ProductCategory::orderBy('name','ASC')->get();

//            $mostly_requested = Product::withCount(['rentedItem' => function ($query) {
//                $query->where('status', 'requested');
//            }])->orderBy('rented_item_count', "desc")->get();

            $users_chart_by_date = User::withoutRole("Admin")->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as user_count'))
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            $users_chart_by_date_pluck_date =  $users_chart_by_date->pluck("date")->toArray();
            $users_chart_by_date_pluck_user_count =  $users_chart_by_date->pluck("user_count")->toArray();

            $users_renter_chart_by_date = User::role("Renter")->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as user_count'))
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            $users_chart_by_rentee_date = $users_renter_chart_by_date->pluck("date")->toArray();
            $users_chart_by_rentee_user_count = $users_renter_chart_by_date->pluck("user_count")->toArray();

            $rentee_count = User::role("Rentee")->count();
            $renter_count = User::role("Renter")->count();
            $admin_count = User::role("Admin")->count();

            $rent_request_by_date = RentedItem::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as rent_request_count')
            )
//                ->where('status', 'completed')
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            $rent_request_by_date_pluck_date = $rent_request_by_date->pluck("date")->toArray();
            $rent_request_count = $rent_request_by_date->pluck("rent_request_count")->toArray();

            $listed_products_by_date = Product::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as product_count')
            )
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            $listed_products_by_date_pluck_date = $listed_products_by_date->pluck("date")->toArray();

            $listed_products_count= $listed_products_by_date->pluck("product_count")->toArray();

            return view("dashboard")->with([
                'renter_count' => $renter_count,
                'rentee_count' => $rentee_count,
                'admin_count' => $admin_count,
                'product_counts' => $product_counts,
                'rented_items_count' => $rented_items_count,
                'rent_requests_count' => $rent_requests_count,
                'users_for_last_30_days' => $users_for_last_30_days,
                'categories' => $categories,
                'completed_rents' => $completed_rents,
                'approved_rents' => $approved_rents,
                "users_chart_by_date_pluck_date" => $users_chart_by_date_pluck_date,
                "users_chart_by_date_pluck_user_count" => $users_chart_by_date_pluck_user_count,
                'users_chart_by_rentee_date' => $users_chart_by_rentee_date,
                'users_chart_by_rentee_user_count' => $users_chart_by_rentee_user_count,
                'rent_request_by_date' => $rent_request_by_date,
                'rent_request_by_date_pluck_date' => $rent_request_by_date_pluck_date,
                'rent_request_count' => $rent_request_count,
                'listed_products_by_date' => $listed_products_by_date,
                'listed_products_by_date_pluck_date' => $listed_products_by_date_pluck_date,
                'listed_products_count' => $listed_products_count

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
