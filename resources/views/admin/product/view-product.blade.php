<x-app-layout>

    <div class="container-fluid" mx-auto >

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url()->previous() }}" class="btn btn-dark">Go Back</a>
                        <table class="table">

                            <thead>
                            <h1 class="text-center" style="margin-bottom: 35px;"> {{$product->title}}</h1>
                            </thead>
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{$product->id}}</td>
                            </tr>

                            <tr>
                                <th>Image</th>
                                <td>
                                    <img class="default-img img-fluid" src="{{ asset('storage/' . $product->product_image) }}" alt="" style="height:120px">
                                </td>
                            </tr>
                            <tr>
                                <th>Hourly Price</th>
                                <td>{{$product->price}}</td>
                            </tr>

                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->productCategory-> name}}</td>
                            </tr>
                            <tr>
                                <th>Product Sub Category</th>
                                <td>{{$product->productSubCategory-> name}}</td>
                            </tr>
                            @role('Admin')
                            <tr>
                                <th>Posted By</th>

                                <td> <a href="{{ route('user.show', $product->productOwner->id) }}">
                                        {{ $product->productOwner->name }}
                                    </a> </td>
                            </tr>
                            @endrole
                            <tr>
                                <th>Description</th>
                                <td style="text-align: justify;">{{$product->description}}</td>
                            </tr>

                            </tbody>

                            <tbody>
                            {{--            @forelse($products as $product)--}}
                            {{--                <tr>--}}
                            {{--                    <td>{{ $product->id }}</td>--}}
                            {{--                    <td>--}}
                            {{--                        <img class="default-img img-fluid" src="{{ asset('storage/' . $product->product_image) }}" alt="" style="height:120px">--}}
                            {{--                    </td>--}}
                            {{--                    <td>{{ $product->title }}</td>--}}
                            {{--                    <td>{{ $product->price }}</td>--}}
                            {{--                    <td>{{ Str::limit($product->description, 25, '...') }}</td>--}}
                            {{--                    <td>{{ $product->productSubCategory->productCategory->slug }}</td>--}}
                            {{--                    <td>{{ $product->productSubCategory->name }}</td>--}}


                            {{--                    <td>--}}
                            {{--                        <div class="btn-group">--}}
                            {{--                            <a href="{{ route('products.view-by-slug', ['slug' => $product->slug]) }}"--}}
                            {{--                               class="btn btn-info">Show</a>--}}
                            {{--                            <a href="{{ route('product.edit', ['slug' => $product->slug]) }}"--}}
                            {{--                               class="btn btn-primary">Edit</a>--}}
                            {{--                            <form action="{{ route('product.edit', ['slug' => $product->slug]) }}"--}}
                            {{--                                  method="POST">--}}
                            {{--                                @csrf--}}
                            {{--                                <button type="submit" class="btn btn-danger">Delete</button>--}}
                            {{--                            </form>--}}
                            {{--                        </div>--}}
                            {{--                    </td>--}}
                            {{--                </tr>--}}
                            {{--            @empty--}}
                            {{--                <tr>--}}
                            {{--                    <td colspan="4">No Products found.</td>--}}
                            {{--                </tr>--}}
                            {{--            @endforelse--}}
                            </tbody>
                        </table>


                        <div class="mt-4 text-end">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Back to Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</x-app-layout>
