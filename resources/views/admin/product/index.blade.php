<x-app-layout>

    <div class="container-fluid">
        <h1 > Manage Products</h1>
        <a href="{{ route('product.create') }}"
           class="btn btn-dark">
            Create Product
        </a>

        <table class="table table-responsive ">
            <thead>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Sub Category</th>
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
                               class="btn btn-info me-2 rounded">Show</a>
                            <a href="{{ route('product.edit', ['slug' => $product->slug]) }}"
                               class="btn btn-primary me-2 rounded">Edit</a>
                            <form action="{{ route('product.edit', ['slug' => $product->slug]) }}"
                                  method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
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
</x-app-layout>
