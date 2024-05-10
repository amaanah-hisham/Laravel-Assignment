<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\RentedItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Notifications\RentedItems\RentedSuccess;


class RentItem extends Component
{

    public $product;
    public $borrowing_date;
    public $returning_date;
    public $amount;
    public $days_count = 0;

    public $mobileNumber;
    public $nic;
    public function mount($product_id){

        $this->product = Product::find($product_id);
        $this->amount = $this->product->price;
    }

    public function render()
    {
        //$this->rented_items = RentedItem::where('rentee_id', auth()->id())->get();

        return view('livewire.rent-item')->layout('layouts.app');
    }

    public function save()
    {

        $this->validate([
            'borrowing_date' => 'required|date|after_or_equal:today',
            'returning_date' => 'required|date|after_or_equal:borrowing_date',
            'mobileNumber' => 'required|digits:10',
            'nic' => 'required'
        ],[
            'borrowing_date.required' => 'The borrowing date field is required.',
            'borrowing_date.after_or_equal' => 'Please choose a borrowing date that is today or in the future.',
            'returning_date.required' => 'The returning date field is required.',
            'returning_date.after_or_equal' => 'Please choose a returning date that is subsequent to the borrowing date.',
            'mobileNumber.required' => 'The mobile number field is required.',
            'mobileNumber.digits' => 'The mobile number must be 10 digits.',
            'nic.required' => 'The NIC field is required.',
        ]);


        $already_rented_check = RentedItem::where('product_id', $this->product->id)
            ->where('status', 'rented')
            ->where('returning_date', '>=', $this->borrowing_date)
            ->where('borrowing_date', '<=', $this->returning_date)
            ->exists();

        if ($already_rented_check) {
            $this->addError('borrowing_date_error', 'This product is already rented for the selected dates.');

        }

        $rented_metadata = [
            'days_count' => $this->days_count,
            'amount' => $this->amount,
            'mobile_number' => $this->mobileNumber,
            'nic' => $this->nic
        ];


        // Statuses: requested, advance-paid, rented, returned, cancelled

        $rented_item = RentedItem::create([
            'renter_id' => $this->product->user_id,
            'rentee_id' => auth()->id(),
            'product_id' => $this->product->id,
            'message' => '',
            'renting_date' => $this->borrowing_date,
            'returning_date' => $this->returning_date,
            'rented_metadata' => $rented_metadata,
            'status' => 'requested'
        ]);



        // post a success message
        $user = auth()->user();
        $rented_item_id = $rented_item->id;
        $user->notify(new RentedSuccess($rented_item_id));

        session()->flash('success', 'Your request has been sent successfully. You will be notified once the owner accepts your request.');

        return redirect()->route('home');

    }



    public function calculateAmount()
    {

        if ($this->borrowing_date && $this->returning_date) {

            $f_borrowing_date = Carbon::parse($this->borrowing_date);
            $f_returning_date = Carbon::parse($this->returning_date);
            $this->days_count = $f_borrowing_date->diffInDays($f_returning_date);
            $this->amount = $this->product->price * $this->days_count;
        }

    }


}
