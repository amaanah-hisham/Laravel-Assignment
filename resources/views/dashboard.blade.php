<x-app-layout>

    @section('title', 'Dashboard')

    @role('Admin')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-blue rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1">{{ $renter_count ?? '--' }}</h3>
                                    <p class="text-muted mb-1 text-truncate">Total Renters</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target <span class="float-end">90%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                    <span class="visually-hidden">90% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-success rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1">{{ $rentee_count ?? '--' }}</h3>
                                    <p class="text-muted mb-1 text-truncate">Total Rentees</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target <span class="float-end">80%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    <span class="visually-hidden">80% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-warning rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1">{{ $rent_requests_count ?? '--' }}</h3>
                                    <p class="text-muted mb-1 text-truncate">Rent Requests</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target <span class="float-end">80%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    <span class="visually-hidden">80% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-dark rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1">{{ $rented_items_count ?? '--' }}</h3>
                                    <p class="text-muted mb-1 text-truncate">Rented Items</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target <span class="float-end">50%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                    <span class="visually-hidden">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-teal rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1">{{ $completed_rents ?? '--' }}</h3>
                                    <p class="text-muted mb-1 text-truncate">Completed Rents</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target <span class="float-end">100%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    <span class="visually-hidden">100% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-secondary rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1">{{ $approved_rents ?? '--' }}</h3>
                                    <p class="text-muted mb-1 text-truncate">Approved Rents</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target <span class="float-end">75%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                    <span class="visually-hidden">75% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-purple rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1">{{ $users_for_last_30_days ?? '--' }}</h3>
                                    <p class="text-muted mb-1 ">Users 30 days</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target <span class="float-end">60%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="visually-hidden">60% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-sm bg-info rounded">
                                    <i class="fe-aperture avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark my-1">{{ $product_counts ?? '--' }}</h3>
                                    <p class="text-muted mb-1 text-truncate">Listed Products</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="text-uppercase">Target <span class="float-end">70%</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                    <span class="visually-hidden">70% Complete</span>
                                </div>
                            </div>
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


    </div>

{{--    <p>--}}
{{--        Inline Sparkline: <span class="inlinesparkline">1,4,4,7,5,9,10</span>.--}}
{{--    </p>--}}
{{--    <p>--}}
{{--        Sparkline with dynamic data: <span id="lifetime-sales">Loading..</span>--}}
{{--    </p>--}}
{{--    <p>--}}
{{--        Bar chart with dynamic data: <span class="dynamicbar">Loading..</span>--}}
{{--    </p>--}}
{{--    <p>--}}
{{--        Bar chart with inline data: <span class="inlinebar">1,3,4,5,3,5</span>--}}
{{--    </p>--}}


        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card rounded shadow-sm" style="height: 420px;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">Registered Users</h5>
                            <canvas id="registered-users" style="height: 100%; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card rounded shadow-sm" style="height: 420px;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">User Types</h5>
                            <canvas id="user-types-chart" style="height: 100%; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded shadow-sm" style="height: 420px;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title">Listed Products</h5>
                            <canvas id="listed-products" style="height: 100%; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        @push("styles")
            <style>
                .jqstooltip {
                    height: 30px !important;
                    width: 50px !important;
                }
            </style>

        @endpush

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
            <script src="{{ asset('admin/assets/jquery.sparkline.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Add Chart.js library -->

            <script type="text/javascript">

                var users_chart_by_date_pluck_date = {{ Js::from($users_chart_by_date_pluck_date) }};
                var users_chart_by_date_pluck_user_count = {{ Js::from($users_chart_by_date_pluck_user_count) }};

                var users_chart_by_rentee_date = {{ Js::from($users_chart_by_rentee_date) }};
                var users_chart_by_rentee_user_count = {{ Js::from($users_chart_by_rentee_user_count) }};

                var renter_count = {{ $renter_count }};
                var rentee_count = {{ $rentee_count }};
                var admin_count = {{ $admin_count }};

                var rent_request_by_date = {{ Js::from($rent_request_by_date) }};
                var rent_request_by_date_pluck_date = {{ Js::from($rent_request_by_date_pluck_date) }};
                var rent_request_count = {{ Js::from($rent_request_count) }};

                var listed_products_by_date_pluck_date = {{ Js::from($listed_products_by_date_pluck_date) }};
                var listed_products_by_date = {{ Js::from($listed_products_by_date) }};
                var listed_products_count = {{ Js::from($listed_products_count) }};


                $(function() {

                    const ctx = document.getElementById('registered-users');

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: users_chart_by_date_pluck_date,
                            datasets: [
                                {
                                    label: 'Total Users',
                                    data: users_chart_by_date_pluck_user_count,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Registered Rentees',
                                    data: users_chart_by_rentee_user_count,
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    const user_types = document.getElementById('user-types-chart');

                    new Chart(user_types, {
                        type: 'pie',
                        data: {
                            labels: ["Admins", "Rentees", "Renters"],
                            datasets: [
                                {
                                    label: 'User Count',
                                    data: [admin_count, rentee_count, renter_count],
                                    borderWidth: 1
                                },

                            ]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    // text: ''
                                }
                            }
                        },
                    });

                    const listed_products = document.getElementById('listed-products');

                    new Chart(listed_products, {
                        type: 'line',
                        data: {
                            labels: listed_products_by_date_pluck_date,
                            datasets: [
                                {
                                    label: 'Product Count',
                                    data: listed_products_count,
                                    borderWidth: 1
                                }

                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    const rent_requests = document.getElementById('rent-requests');

                    new Chart(rent_requests, {
                        type: 'line',
                        data: {
                            labels: rent_request_by_date_pluck_date,
                            datasets: [
                                {
                                    label: 'Rent Requests',
                                    data: rent_request_count,
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });


                });
            </script>
        @endpush


        <div class="row my-5">
            <div class="col-lg-6">
                <div class="card mb-3 shadow-sm">
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
            <div class="col-md-6">
                <div class="card rounded shadow-sm" style="height: 420px;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title">Rent Requests</h5>
                        <canvas id="rent-requests" style="height: 100%; width: 100%;"></canvas>
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
            <button class="nav-link active" id="nav-rent-requests-tab" data-bs-toggle="tab" data-bs-target="#nav-rent-requests" type="button" role="tab" aria-controls="nav-rent-requests" aria-selected="true">Ongoing Rents</button>
            <button class="nav-link" id="nav-approved-rents-tab" data-bs-toggle="tab" data-bs-target="#nav-approved-rents" type="button" role="tab" aria-controls="nav-approved-rents" aria-selected="false">Approved Rent Requests</button>
            <button class="nav-link" id="nav-completed-rents-tab" data-bs-toggle="tab" data-bs-target="#nav-completed-rents" type="button" role="tab" aria-controls="nav-completed-rents" aria-selected="false">Completed Rents</button>
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
                                                <th scope="row">Rentee name</th>
                                                <td>{{ $rented_item->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Rentee email</th>
                                                <td>{{ $rented_item->user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Rentee address</th>
                                                <td>{{ $rented_item->user->address }}</td>
                                            </tbody>
                                        </table>

                                        <div class="d-flex justify-content-end">
                                            {{--                                                    <a href="{{ route('rent-requests', $approved_rent->id) }}" class="btn btn-primary">Change status to rented</a>--}}
                                            @livewire('rented-item.rented-completed', ['rented_request_id' => $rented_item->id])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info" role="alert">
                                No ongoing rents found.
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

        <div class="tab-pane fade " id="nav-approved-rents" role="tabpanel"  aria-labelledby="nav-approved-rents-tab">

            <div class="container ">
                <div class="row justify-content-center">


                <div class="card">
                        <div class="card-body">

                            <div class="accordion" id="accordionExample">
                                @forelse($approved_rents as $approved_rent)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $approved_rent->id }}">
                                            <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $approved_rent->id }}" aria-expanded="true" aria-controls="collapse{{ $approved_rent->id }}">
                                                {{ $approved_rent->product->title }} - requested on {{ \Carbon\Carbon::parse($approved_rent->created_at)->toFormattedDayDateString() }} at {{ \Carbon\Carbon::parse($approved_rent->created_at)->format('h:i A')}}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $approved_rent->id }}" class="accordion-collapse collapse @if($loop->first)  show  @endif" aria-labelledby="heading{{ $approved_rent->id }}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">Product Image</th>
                                                        <td><img src="{{ asset('storage/' . $approved_rent->product->product_image) }}" alt="{{ $approved_rent->product->title }}" style="max-width: 200px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Amount</th>
                                                        <td>{{ $approved_rent->rented_metadata['amount'] ?? 'N/A' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Status</th>
                                                        <td>{{ $approved_rent->status }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Borrowing Date</th>
                                                        <td>{{ \Carbon\Carbon::parse($approved_rent->renting_date)->toFormattedDayDateString()}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Returning Date</th>
                                                        <td>{{ \Carbon\Carbon::parse($approved_rent->returning_date)->toFormattedDayDateString()}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile Number</th>
                                                        <td>{{ $approved_rent->rented_metadata['mobile_number'] ?? 'N/A' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">Rentee name</th>
                                                        <td>{{ $approved_rent->user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Rentee email</th>
                                                        <td>{{ $approved_rent->user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Rentee address</th>
                                                        <td>{{ $approved_rent->user->address }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <div class="d-flex justify-content-end">
                                                  @livewire('rented-item.rented-status', ['rented_request_id' => $approved_rent->id])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-info" role="alert">
                                        No approved requests found.
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
            </div>
        </div>

        <div class="tab-pane fade" id="nav-completed-rents" role="tabpanel" aria-labelledby="nav-completed-rents-tab">
            <div class="card">
                <div class="card-body">

                    <div class="accordion" id="accordionExample">
                        @forelse($completed_rents as $completed_rent)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $completed_rent->id }}">
                                    <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $completed_rent->id }}" aria-expanded="true" aria-controls="collapse{{ $completed_rent->id }}">
                                        {{ $completed_rent->product->title }} - requested on {{ \Carbon\Carbon::parse($completed_rent->created_at)->toFormattedDayDateString() }} at {{ \Carbon\Carbon::parse($completed_rent->created_at)->format('h:i A')}}
                                    </button>
                                </h2>
                                <div id="collapse{{ $completed_rent->id }}" class="accordion-collapse collapse @if($loop->first)  show  @endif" aria-labelledby="heading{{ $completed_rent->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th scope="row">Product Image</th>
                                                <td><img src="{{ asset('storage/' . $completed_rent->product->product_image) }}" alt="{{ $completed_rent->product->title }}" style="max-width: 200px;"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Amount</th>
                                                <td>{{ $completed_rent->rented_metadata['amount'] ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $completed_rent->status }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Borrowing Date</th>
                                                <td>{{ \Carbon\Carbon::parse($completed_rent->renting_date)->toFormattedDayDateString()}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Returning Date</th>
                                                <td>{{ \Carbon\Carbon::parse($completed_rent->returning_date)->toFormattedDayDateString()}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Mobile Number</th>
                                                <td>{{ $completed_rent->rented_metadata['mobile_number'] ?? 'N/A' }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Rentee name</th>
                                                <td>{{ $completed_rent->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Rentee email</th>
                                                <td>{{ $completed_rent->user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Rentee address</th>
                                                <td>{{ $completed_rent->user->address }}</td>
                                            </tr>

                                            </tbody>
                                        </table>

                                        <div class="d-flex justify-content-end">
{{--                                                                                                <a href="{{ route('rent-requests', $approved_rent->id) }}" class="btn btn-primary">Change status to rented</a>--}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info" role="alert">
                                No Completed rents found.
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
                                                        <th>Price</th>
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
            <button class="nav-link active" id="nav-rented-items-tab" data-bs-toggle="tab" data-bs-target="#nav-rented-items" type="button" role="tab" aria-controls="nav-rented-items" aria-selected="true">Ongoing and Approved Rents</button>
            <button class="nav-link" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed" aria-selected="false">Completed Rents</button>
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
                                                <th scope="row">Renter Name</th>
                                                <td>{{ $rented_item->product->productOwner->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Renter Contact Number</th>
                                                <td>{{ $rented_item->product->productOwner->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Renter Email</th>
                                                <td>{{ $rented_item->product->productOwner->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Renter Address</th>
                                                <td>{{ $rented_item->product->productOwner->address }}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info" role="alert">
                                No Ongoing rents found.
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
        <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">
            <div class="card">
                <div class="card-body">

                    <div class="accordion" id="accordionExample">
                        @forelse($completed_rents as $completed_rent)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $completed_rent->id }}">
                                    <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $completed_rent->id }}" aria-expanded="true" aria-controls="collapse{{ $completed_rent->id }}">
                                        {{ $completed_rent->product->title }} - requested on {{ \Carbon\Carbon::parse($completed_rent->created_at)->toFormattedDayDateString() }} at {{ \Carbon\Carbon::parse($completed_rent->created_at)->format('h:i A')}}
                                    </button>
                                </h2>
                                <div id="collapse{{ $completed_rent->id }}" class="accordion-collapse collapse @if($loop->first)  show  @endif" aria-labelledby="heading{{ $completed_rent->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th scope="row">Product Image</th>
                                                <td><img src="{{ asset('storage/' . $completed_rent->product->product_image) }}" alt="{{ $completed_rent->product->title }}" style="max-width: 200px;"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Amount</th>
                                                <td>{{ $completed_rent->rented_metadata['amount'] ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>{{ $completed_rent->status }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Borrowing Date</th>
                                                <td>{{ \Carbon\Carbon::parse($completed_rent->renting_date)->toFormattedDayDateString()}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Returning Date</th>
                                                <td>{{ \Carbon\Carbon::parse($completed_rent->returning_date)->toFormattedDayDateString()}}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Renter Name</th>
                                                <td>{{ $completed_rent->product->productOwner->name }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Renter Email</th>
                                                <td>{{ $completed_rent->product->productOwner->email }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Renter Address</th>
                                                <td>{{ $completed_rent->product->productOwner->address }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Renter Contact Number</th>
                                                <td>{{ $completed_rent->product->productOwner->mobile }}</td>
                                            </tr>

                                            </tbody>
                                        </table>

                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('product-details', ['category' => $completed_rent->product->productCategory->slug, 'sub_category' => $completed_rent->product->productSubCategory->slug ,'slug' => $completed_rent->product->slug]) }}" class="btn btn-primary" >Provide Feedback</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info" role="alert">
                                No Completed rents found.
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


                <div class="container ">
                    <div class="row justify-content-center">


                        <div class="card">
                            <div class="card-body">

                                <div class="accordion" id="accordionExample">
                                    @forelse($rent_requests as $rent_request)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $rent_request->id }}">
                                                <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $rent_request->id }}" aria-expanded="true" aria-controls="collapse{{ $rent_request->id }}">
                                                    {{ $rent_request->product->title }} - requested on {{ \Carbon\Carbon::parse($rent_request->created_at)->toFormattedDayDateString() }} at {{ \Carbon\Carbon::parse($rent_request->created_at)->format('h:i A')}}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $rent_request->id }}" class="accordion-collapse collapse @if($loop->first)  show  @endif" aria-labelledby="heading{{ $rent_request->id }}" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">Product Image</th>
                                                            <td><img src="{{ asset('storage/' . $rent_request->product->product_image) }}" alt="{{ $rent_request->product->title }}" style="max-width: 200px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Amount</th>
                                                            <td>{{ $rent_request->rented_metadata['amount'] ?? 'N/A' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Status</th>
                                                            <td>{{ $rent_request->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Borrowing Date</th>
                                                            <td>{{ \Carbon\Carbon::parse($rent_request->renting_date)->toFormattedDayDateString()}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Returning Date</th>
                                                            <td>{{ \Carbon\Carbon::parse($rent_request->returning_date)->toFormattedDayDateString()}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Product Owner</th>
                                                            <td>{{ $rent_request->product->productOwner->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Renter Contact Number</th>
                                                            <td>{{ $rent_request->product->productOwner->mobile }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Renter Email</th>
                                                            <td>{{ $rent_request->product->productOwner->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Renter Address</th>
                                                            <td>{{ $rent_request->product->productOwner->address }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-info" role="alert">
                                            No Rent Requests Found.
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
                </div>


        </div>


    </div>
    @endrole

</x-app-layout>
