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
                    <h1 class="h5 fw-semibold text-gray-900 mb-0">Manage Sub Categories</h1>
                </div>
                <div class="mt-4 mt-sm-0">
                    <a href="{{ route('product-sub-categories.create') }}" class="btn me-2 rounded text-white" style="background-color: #052f8c;">Create Sub Category</a>
                </div>
            </div>

                <div class="mt-4">
                    <div class="table-responsive">
                        <table class="table align-middle">
            <thead>
            <th>ID</th>
            <th>Sub Category</th>
            <th>Category-slug</th>
            <th>Actions</th>
            </thead>

            <tbody>
            @forelse($product_sub_categories as $product_sub_category)
                <tr>
                    <td>{{ $product_sub_category->id }}</td>
                    <td>{{ $product_sub_category->name }}</td>
                    <td>{{ $product_sub_category->productCategory->name }} - {{ $product_sub_category->productCategory->slug }}</td>

                    <td>
                        <div class="btn-group">
{{--                            <a href="{{ "" }}"--}}
{{--                               class="btn btn-success me-2 rounded">Show</a>--}}
                            <a href="{{ route('product-sub-categories.edit', ['slug' => $product_sub_category->slug]) }}"
                               class="btn me-2 rounded" style="background-color: #bde3fc;">Edit</a>
{{--                            <form action="{{ "route('product-sub-categories.delete', $product_sub_category->slug)" }}"--}}
{{--                                  method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                            </form>--}}
{{--                            --}}
                            <form action="{{ route('product-sub-categories.delete', ['slug' => $product_sub_category->slug]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this sub-category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn me-2 rounded" style="background-color: #bde3fc;">Delete</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No sub categories found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
                    </div>
                </div>


        <div class="container">
            {{$product_sub_categories->links() }}
        </div>

    </div>
    </div>
</x-app-layout>
