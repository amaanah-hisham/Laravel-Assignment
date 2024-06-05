<x-app-layout>
    <div class="container-fluid" mx-auto >

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url()->previous() }}" class="btn btn-dark">Go Back</a>

                    <table class="table">
                        <thead>
                        <h1 class="text-center" style="margin-bottom: 35px;"> {{ $user->name }}</h1>
                        </thead>

                        <tbody>

                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $user->mobile }}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th>Rent Requests:</th>
                            <td>{{ $user->rentedItemsAsRentee->count() }}</td>
                        </tr>
                        <tr>
                            <th>Products listed:</th>
                            <td>{{ $user->userproducts->count() }}</td>
                        </tr>
                        <tr>
                            <th>Role:</th>
                            <td>{{ ucwords(str_replace('_', ' ', Str::snake($user->role->name))) }}</td>
                        </tr>
                        </tbody>
                    </table>

                        <div class="card">
                            <div class="card-body">
                                <h6>Rent Requests</h6>
                                <div class="accordion" id="accordionExample">
                                    @foreach($rented_items as $rented_item)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $rented_item->id }}">
                                                <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $rented_item->id }}" aria-expanded="true" aria-controls="collapse{{ $rented_item->id }}">
                                                    {{ $rented_item->product->title }} - requested on {{ \Carbon\Carbon::parse($rented_item->created_at)->toFormattedDayDateString() }} at {{ \Carbon\Carbon::parse($rented_item->created_at)->format('h:i A')}}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $rented_item->id }}" class="accordion-collapse collapse @if($loop->first)  show  @endif" aria-labelledby="heading{{ $rented_item->id }}" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">Product Image</th>
                                                            <td><img src="{{ asset('storage/' . $rented_item->product->product_image) }}" alt="{{ $rented_item->product->title }}" style="max-width: 200px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Amount</th>
                                                            <td>{{ $rented_item->rented_metadata['amount'] ?? 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Status</th>
                                                            <td>{{ $rented_item->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Borrowing Date</th>
                                                            <td>{{ $rented_item->renting_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Returning Date</th>
                                                            <td>{{ $rented_item->returning_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Mobile Number</th>
                                                            <td>{{ $rented_item->rented_metadata['mobile_number'] ?? 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">NIC</th>
                                                            <td>{{ $rented_item->rented_metadata['nic'] ?? 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Product Owner</th>
                                                            <td>{{ $rented_item->product->productOwner->name }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>


                                <div class="mt-4"></div>
                                <div class="d-flex justify-content-center">
                                </div>

                                <div class="pagination-container d-flex justify-content-center mt-4">
                                    {{ $rented_items->links('pagination::bootstrap-5') }}
                                </div>


                            </div>
                        </div>





                        <div class="mt-4 text-end">
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Back to Users</a>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
