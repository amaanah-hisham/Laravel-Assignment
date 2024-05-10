<?php

namespace App\Http\Controllers;

use App\Models\RentedItem;
use App\Http\Requests\StoreRentedItemRequest;
use App\Http\Requests\UpdateRentedItemRequest;

class RentedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRentedItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RentedItem $rentedItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RentedItem $rentedItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentedItemRequest $request, RentedItem $rentedItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RentedItem $rentedItem)
    {
        //
    }
}
