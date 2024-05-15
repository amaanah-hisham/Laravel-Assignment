<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class RentRequest extends Controller
{
    public function show($productId)
    {
        // Retrieve the product with its rent requests
        $product = Product::findOrFail($productId);
        $rentRequests = $product->rentedItem()->where('status', 'requested')->get();


        return view('rent-requests', compact('product', 'rentRequests'));
    }


}
