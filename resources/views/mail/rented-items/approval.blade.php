<x-mail::message>
#You request to rent {{ $rented_item->product->title }} for {{ $rented_item->rented_metadata['days_count'] }} days has been {{$status == "rented" ? "approved" : "rejected"}}.

@if($status == "rented")
    Your total is LKR{{ $rented_item->rented_metadata['amount'] }}.

Please contact the Renter to get the product delivered.

<x-mail::table>
   | {{ $rented_item->product->title }} Details |                                             |
   | ------------------------------------------ | ---------------------------------------------- |
   |   Product Image                            | <a href="{{ route('dashboard') }}" target="_blank"><img src="{{ asset('storage/' . $rented_item->product->product_image) }}" alt="" style="height: 120px;"></a>  |
   |   Price                                    | LKR{{ $rented_item->rented_metadata['amount'] }} |
   |   Product Owner                            | {{ $rented_item->product->productOwner->name }} |

</x-mail::table>

<x-mail::table>
   | Details      |                                         |
   | ------------ | --------------------------------------- |
   |   Borrowing Date   | {{ \Carbon\Carbon::parse($rented_item->renting_date)->toDateString() }} |
   |   Returning Date   | {{ \Carbon\Carbon::parse($rented_item->returning_date)->toDateString() }} |

</x-mail::table>

<x-mail::button :url="$url">
    View the Rented Item
</x-mail::button>

@endif

@if($status == "rejected")
    We are sorry to hear that your request to rent was not approved.
@endif

Thanks,<br>
E-Wave Team
</x-mail::message>
