<x-app-layout>

    <div class="container mt-1">
        <div class="p-4 bg-white pt-4">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h1 class="h5 fw-semibold text-gray-900 mb-0">Manage Products</h1>
                </div>
                <div class="mt-4 mt-sm-0">
                    <a href="{{ route('product.create') }}" class="btn me-2 rounded text-white" style="background-color: #052f8c;">Create Product</a>
                </div>
            </div>


            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table align-middle">

            <thead>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Slug</th>
            <th scope="col">Category</th>
            <th scope="col">Sub Category</th>
@role('Admin')
            <th>Posted By</th>
            @endrole


            <th>Actions</th>
            </thead>

            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <img class="default-img img-fluid" src="{{ asset('storage/' . $product->product_image) }}" alt="" style="height:80px">
                    </td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ Str::limit($product->description, 50, '...') }}</td>
                    {{--<td>{{ $product->productSubCategory->productCategory->slug }}</td>--}}
                    <td>{{ $product->productCategory->slug }}</td>
                    <td>{{ $product->productCategory->name }}</td>
                    <td>{{ $product->productSubCategory->name }}</td>

                    @role('Admin')
                    <td> <a href="{{ route('user.show', $product->productOwner->id) }}">
                            {{ $product->productOwner->name }}
                        </a> </td>
                    @endrole
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('products.view-by-slug', ['slug' => $product->slug]) }}"
                               class="btn me-2 rounded" style="background-color: #bde3fc;">Show</a>
                            <a href="{{ route('product.edit', ['slug' => $product->slug]) }}"
                               class="btn me-2 rounded" style="background-color: #bde3fc;">Edit</a>
                            <form action="{{ route('product.edit', ['slug' => $product->slug]) }}"
                                  method="POST">
                                @csrf
                                <button type="submit" class="btn me-2 rounded" style="background-color: #bde3fc;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Products found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
                </div>
            </div>

    </div>
    </div>
</x-app-layout>
