<x-app-layout>

    @section('title', 'Dashboard')

    @role('Admin')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-3">
                <div class="card border-primary mb-3">
                    <div class="card-body text-primary text-center">
                        <h5 class="card-title">{{ $renter_count ?? '--' }}</h5>
                        <p class="card-text">Users Count</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card border-primary mb-3">
                    <div class="card-body text-primary text-center">
                        <h5 class="card-title">{{ $rentee_count ?? '--' }}</h5>
                        <p class="card-text">Users Count</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card border-info mb-3">
                    <div class="card-body text-primary text-center">
                        <h5 class="card-title">{{ $rent_requests_count ?? '--' }}</h5>
                        <p class="card-text">Rent Requests</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card border-info mb-3">
                    <div class="card-body text-primary text-center">
                        <h5 class="card-title">{{ $rented_items_count ?? '--' }}</h5>
                        <p class="card-text">Rented Items</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card border-info mb-3">
                    <div class="card-body text-primary text-center">
                        <h5 class="card-title">{{ $users_for_last_30_days ?? '--' }}</h5>
                        <p class="card-text">Users registered within 30 days</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card border-primary mb-3">
                    <div class="card-body text-primary text-center">
                        <h5 class="card-title">{{ $product_counts ?? '--' }}</h5>
                        <p class="card-text">Listed Products</p>
                    </div>
                </div>
            </div>
        </div>

        {{--    <div class="row my-5">--}}
        {{--        <div class="col-lg-3">--}}
        {{--            <div class="card border-info mb-3" style="max-width: 18rem;">--}}
        {{--                <div class="card-body text-primary text-center">--}}
        {{--                    <h5 class="card-title">{{ $mostly_requested->product->title ?? '--' }}</h5> <!-- Output user count -->--}}
        {{--                    <p class="card-text">Rent Requests</p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}

        <div class="row my-5">
            <div class="col-lg-4">
                <div class="card border-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Products per Category</h5>
                        <table class="table table-borderless">
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->products->count()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole


    @role("Renter")

    {{--    Test table--}}
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
{{--            <table class="table">--}}
{{--                <thead>--}}
{{--                <th>Image</th>--}}
{{--                <th>Title</th>--}}
{{--                <th>...</th>--}}
{{--                <th>Requested At</th>--}}
{{--                <th>Approval</th>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @php--}}
{{--                    $product = \App\Models\Product::find(16);--}}
{{--                @endphp--}}

{{--                @for($i = 0; $i < 3; $i++)--}}
{{--                    <tr>--}}
{{--                        <td><img src="" alt=""></td>--}}
{{--                        <td>{{$product->title}}</td>--}}
{{--                        <td>...</td>--}}
{{--                        <td>Date and Time</td>--}}
{{--                        <td>--}}
{{--                            @livewire('rented-item.approval', ['product_id' => $product->id])--}}
{{--                        </td>--}}
{{--                    </tr>--}}

{{--                @endfor--}}
{{--                </tbody>--}}

{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}


    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-rent-requests-tab" data-bs-toggle="tab" data-bs-target="#nav-rent-requests" type="button" role="tab" aria-controls="nav-rent-requests" aria-selected="true">Approved Rent Requests</button>
            <button class="nav-link" id="nav-listed-products-tab" data-bs-toggle="tab" data-bs-target="#nav-listed-products" type="button" role="tab" aria-controls="nav-listed-products" aria-selected="false">Listed Products</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-rent-requests" role="tabpanel" aria-labelledby="nav-rent-requests-tab">
            <div class="card">
                <div class="card-body">

                    <div class="accordion" id="accordionExample">
                                                @forelse($rented_items as $rented_item)
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
                                                                        <td>{{ \Carbon\Carbon::parse($rented_item->renting_date)->toFormattedDayDateString()}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Returning Date</th>
                                                                        <td>{{ \Carbon\Carbon::parse($rented_item->returning_date)->toFormattedDayDateString()}}</td>
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
                                                @empty
                                                    <div class="alert alert-info" role="alert">
                                                        No rent requests found.
                                                    </div>
                                                @endforelse

                    </div>


                    <div class="mt-4"></div>
                    <div class="d-flex justify-content-center">
                    </div>

                    <div class="pagination-container d-flex justify-content-center mt-4">
                        {{--                        {{ $rented_items->links('pagination::bootstrap-5') }}--}}
                    </div>


                </div>
            </div>
        </div>

        <div class="tab-pane fade " id="nav-listed-products" role="tabpanel"  aria-labelledby="nav-listed-products-tab">



            <div class="container ">
                <div class="row justify-content-center">



                    <div class="card">
                        <div class="card-body">

                            <div class="accordion" id="accordionExample">

                                @forelse($userProducts as $userProduct)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $userProduct->id }}">
                                            <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $userProduct->id }}" aria-expanded="true" aria-controls="collapse{{ $userProduct->id }}">
                                                {{ $userProduct->title }} - Rent Requests: {{ $userProduct->rented_items_count }}
                                            </button>


                                        </h2>
                                        <div id="collapse{{ $userProduct->id }}" class="accordion-collapse collapse @if($loop->first)  show  @endif" aria-labelledby="heading{{ $userProduct->id }}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <table class="table">
                                                    <tbody>

                                                    <tr>
                                                        <th>ID</th>
                                                        <td>{{$userProduct->id}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Image</th>
                                                        <td>
                                                            <img class="default-img img-fluid" src="{{ asset('storage/' . $userProduct->product_image) }}" alt="" style="height:120px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Hourly Price</th>
                                                        <td>{{$userProduct->price}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Product Category</th>
                                                        <td>{{$userProduct->productCategory-> name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Sub Category</th>
                                                        <td>{{$userProduct->productSubCategory-> name}}</td>
                                                    </tr>
                                                    @role('Admin')
                                                    <tr>
                                                        <th>Posted By</th>

                                                        <td> <a href="{{ route('user.show', $userProduct->productOwner->id) }}">
                                                                {{ $userProduct->productOwner->name }}
                                                            </a> </td>

                                                    </tr>
                                                    @endrole
                                                    <tr>
                                                        <th>Description</th>
                                                        <td style="text-align: justify;">{{$userProduct->description}}</td>
                                                    </tr>


                                                    </tbody>
                                                </table>

                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('rent-requests', $userProduct->id) }}" class="btn btn-primary">View Rent Requests</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-info" role="alert">
                                        No products found. Add your first product by clicking <a href="{{ route('product.create') }}">here</a>
                                    </div>
                                @endforelse

                            </div>


                            <div class="mt-4"></div>
                            <div class="d-flex justify-content-center">
                            </div>

                            <div class="pagination-container d-flex justify-content-center mt-4">
                                {{ $userProducts->links('pagination::bootstrap-5') }}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    @endrole

    @role("Rentee")

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-rented-items-tab" data-bs-toggle="tab" data-bs-target="#nav-rented-items" type="button" role="tab" aria-controls="nav-rented-items" aria-selected="true">Rented Items</button>
            <button class="nav-link" id="nav-rent-request-tab" data-bs-toggle="tab" data-bs-target="#nav-rent-requests" type="button" role="tab" aria-controls="nav-rent-requests" aria-selected="false">Rent Requests</button>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-rented-items" role="tabpanel" aria-labelledby="nav-rented-items-tab">
            <div class="card">
                <div class="card-body">

                    <div class="accordion" id="accordionExample">
                                                @forelse($rented_items as $rented_item)
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
                                                                        <td>{{ \Carbon\Carbon::parse($rented_item->renting_date)->toFormattedDayDateString()}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Returning Date</th>
                                                                        <td>{{ \Carbon\Carbon::parse($rented_item->returning_date)->toFormattedDayDateString()}}</td>
                                                                    </tr>
                                                                    <tr>

                                                                    <tr>

                                                                    <tr>
                                                                        <th scope="row">Product Owner</th>
                                                                        <td>{{ $rented_item->product->productOwner->name }}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="alert alert-info" role="alert">
                                                        No rent requests found.
                                                    </div>
                                                @endforelse

                    </div>


                    <div class="mt-4"></div>
                    <div class="d-flex justify-content-center">
                    </div>

                    <div class="pagination-container d-flex justify-content-center mt-4">
                        {{--                        {{ $rented_items->links('pagination::bootstrap-5') }}--}}
                    </div>


                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-rent-requests" role="tabpanel" aria-labelledby="nav-rent-request-tab">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Borrowing Date</th>
                            <th>Returning Date</th>
                            <th>Requested on</th>
                            <th>Total Price</th>
                            <th>Renter Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rent_requests as $request)
                            <tr>
                                <td>{{ $request->product->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($request->renting_date)->toFormattedDayDateString()}}</td>
                                <td>{{ \Carbon\Carbon::parse($request->returning_date)->toFormattedDayDateString()}}</td>
                                <td>{{ \Carbon\Carbon::parse($request->created_at)->format('M j, Y \a\t g:i A') }}</td>




                                <td>LKR {{ $request->rented_metadata['amount'] }}</td>

                                <td>{{ $request->product->productOwner->name }}</td>
                                <td>{{ $request->status }}</td>
                                <td>

                                    <button class="btn btn-primary">Cancel Request</button>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endrole

</x-app-layout>
