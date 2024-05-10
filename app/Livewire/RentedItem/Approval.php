<?php

namespace App\Livewire\RentedItem;

use App\Models\Product;
use App\Models\RentedItem;
use App\Models\User;
use Livewire\Component;
use App\Notifications\RentedItems\Approval as ApprovalNotification;

class Approval extends Component
{

    public $product;

    public function mount($product_id)
    {
        $this->product = Product::find($product_id);
    }

    public function render()
    {
        return view('livewire.rented-item.approval')->layout('layouts.app');
    }

    public function approve()
    {

        // rent request form validation rules should be updated

        // change the rented item record status to rented
//        $rented_request = RentedItem::where("product_id", $this->product->id)
//            ->update([
//                'status' => 'rented'
//            ]);

        $rented_request = RentedItem::where("product_id", $this->product->id)->first();
//
//
//        // notify the requested rentee that the product request is approved
//        $user = User::find($rented_request->rentee_id);
//        $rented_request_id =  $rented_request->id;
//        $user->notify(new ApprovalNotification($rented_request_id, "approved"));


        // cross check for the rentee's borrowed dates and reject all the lapping requests, also notify the requested people
        $cross_check_for_rented_item_dates = RentedItem::where('product_id', $this->product->id)
            ->where('renting_date', '<=', $rented_request->renting_date)
            ->where('returning_date', '>=', $rented_request->returning_date)
            ->get();

        foreach ($cross_check_for_rented_item_dates as $cross_check_for_rented_item_date) {
            $cross_check_for_rented_item_date->update([
                'status' => 'rejected'
            ]);

          // notify the requested rentee that the product request is rejexted
            $rejected_user = User::find($cross_check_for_rented_item_date->rentee_id);
//        $rented_request_id =  $rented_request->id;
//        $user->notify(new ApprovalNotification($rented_request_id, "rejected"));


        }

//    dd($cross_check_for_rented_item_dates);


    }
}
