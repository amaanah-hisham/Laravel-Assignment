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
    public $rented_request;

    public function mount($product_id)
    {
        $this->product = Product::find($product_id);
        $this->rented_request = RentedItem::where('product_id', $product_id)
            ->where('status', 'requested')
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.rented-item.approval')->layout('layouts.app');
    }

    public function approve()
    {
        // 1. Update rent request form validation rules if needed

        // 2. Change the status of the rented item record to "rented"
        $this->rented_request->update([
            'status' => 'rented'
        ]);

        // 3. Notify the requested rentee that the product request is approved
        $rented_request_id = $this->rented_request->id;
        $user = $this->rented_request->user;
        $user->notify(new ApprovalNotification($rented_request_id, "approved"));

        // 4. Cross-check for rentee's borrowed dates and reject overlapping requests
        $cross_check_for_rented_item_dates = RentedItem::where('product_id', $this->product->id)
            ->where('id', '!=', $this->rented_request->id) // Exclude the current rented item
            ->where('renting_date', '<=', $this->rented_request->renting_date)
            ->where('returning_date', '>=', $this->rented_request->returning_date)
            ->get();

        foreach ($cross_check_for_rented_item_dates as $cross_check_for_rented_item_date) {
            $cross_check_for_rented_item_date->update([
                'status' => 'rejected'
            ]);

            // Notify the requested rentee that the product request is rejected
            $cross_check_for_rented_item_date->user->notify(new ApprovalNotification($cross_check_for_rented_item_date->id, "rejected"));
        }


        //success message
        session()->flash('message', 'Rent request approved successfully!');
        return redirect()->route('dashboard');
    }

}
