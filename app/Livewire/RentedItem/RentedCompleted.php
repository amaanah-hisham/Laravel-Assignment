<?php

namespace App\Livewire\RentedItem;

use App\Models\RentedItem;
use Livewire\Component;
use App\Notifications\RentedItems\RentedFeedback;

class RentedCompleted extends Component
{
    public $rented_request;

    public function mount($rented_request_id){
        $this->rented_request = RentedItem::find($rented_request_id);
    }
    public function render()
    {
        return view('livewire.rented-item.rented-completed')->layout('layouts.app');
    }
    public function rentedStatus(){
        $this->rented_request->update([
            'status' => 'completed'
        ]);
        $rented_request_id = $this->rented_request->id;

        // notify the user
        $this->rented_request->user->notify(new RentedFeedback($rented_request_id));



        return redirect()->route('dashboard');

    }
}
