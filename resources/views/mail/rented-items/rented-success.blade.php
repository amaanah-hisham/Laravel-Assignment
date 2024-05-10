<x-mail::message>
# You have requested to rent {{ $rented_item->product->title }} for {{ $days_count }} days.
    Your total is LKR{{ $amount }}.


    You will be notified about the status of this request shortly.

<x-mail::table>
    | {{ $rented_item->product->title }} Details |                                             |
    | ------------------------------------------ | ---------------------------------------------- |
    |   Product Image                            | <a href="{{ route('dashboard') }}" target="_blank"><img src="{{ asset('storage/' . $rented_item->product->product_image) }}" alt="" style="height: 120px;"></a>  |
    |   Price                                    | LKR{{ $amount }} |
    |   Product Owner                            | {{ $rented_item->product->productOwner->name }} |
</x-mail::table>

<x-mail::table>
        | User Details | |
        | ------------ | --------------------------------------- |
        |   Borrowing Date   | {{ \Carbon\Carbon::parse($rented_item->renting_date)->toDateString() }} |
        |   Returning Date   | {{ \Carbon\Carbon::parse($rented_item->returning_date)->toDateString() }} |
        |   Mobile Number    | <a href="tel:{{ $rented_item->rented_metadata['mobile_number'] }}">{{ $rented_item->rented_metadata['mobile_number'] }}</a>  |
        |   NIC              | {{ $rented_item->rented_metadata['nic'] }} |
</x-mail::table>

<x-mail::button :url="$url">
View Rent Request
</x-mail::button>

Thanks,<br>
E-Wave Team
</x-mail::message>
