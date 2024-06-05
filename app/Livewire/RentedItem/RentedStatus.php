<?php

namespace App\Livewire\RentedItem;

use App\Models\Product;
use App\Models\RentedItem;
use Livewire\Component;

class RentedStatus extends Component
{
    public $rented_request;

    public function mount($rented_request_id){
        $this->rented_request = RentedItem::find($rented_request_id);
    }
    public function render()
    {
        return view('livewire.rented-item.rented-status')->layout('layouts.app');
    }

    public function rentedStatus(){
        $this->rented_request->update([
            'status' => 'rented'
        ]);

        return redirect()->route('dashboard');

    }

}
