<x-app-layout>

    <h4>Rent Requests for {{ $product->title }}</h4>
    <div class="card">
        <div class="card-body">
            <table class="table">
        <thead>
        <tr>
{{--            <th>Rentee Name</th>--}}
            <th>Borrowing Date</th>
            <th>Returning Date</th>
            <th>Requested on</th>
            <th>Total Price</th>
            <th>Mobile Number</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rentRequests as $request)
            <tr>
{{--                <td>{{ $request->rentee_id->rentedItemsAsRentee->name }}</td> --}}
                <td>{{ \Carbon\Carbon::parse($request->renting_date)->toFormattedDayDateString()}}</td>
                <td>{{ \Carbon\Carbon::parse($request->returning_date)->toFormattedDayDateString()}}</td>
                <td>{{ \Carbon\Carbon::parse($request->created_at)->format('M j, Y \a\t g:i A') }}</td>




                <td>LKR {{ $request->rented_metadata['amount'] }}</td>
                <td>{{ $request->rented_metadata['mobile_number'] }}</td>
                <td>
                    @livewire('rented-item.approval', ['product_id' => $product->id])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>

</x-app-layout>
