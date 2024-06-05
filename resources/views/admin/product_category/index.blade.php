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
                    <h1 class="h5 fw-semibold text-gray-900 mb-0">Manage Product Categories</h1>
                </div>
                <div class="mt-4 mt-sm-0">
                    <a href="{{ route('product-category.create') }}" class="btn me-2 rounded text-white" style="background-color: #052f8c;">Create product Category</a>
                </div>
            </div>


            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table align-middle">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Sub Categories</th>
            <th>Actions</th>
            </thead>

            <tbody>
            @forelse($product_categories as $product_category)
                <tr>
                    <td>{{ $product_category->id }}</td>
                    <td>{{ $product_category->name }}</td>
                    <td>{{ $product_category->slug }}</td>
                    <td>{{ $product_category->productSubCategory()->count() }}</td>
                    <td>
                        <div class="btn-group">
{{--                            <a href="{{ route('product-category.show', $product_category->id) }}"--}}
{{--                               class="btn btn-info me-2 rounded">Show</a>--}}
                            <a href="{{ route('product-category.edit', $product_category->id) }}"
                               class="btn me-2 rounded" style="background-color: #bde3fc;">Edit</a>
                            <form action="{{ route('product-category.destroy', $product_category->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn me-2 rounded" style="background-color: #bde3fc;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4">No categories found.</td>
                    </tr>
            @endforelse
            </tbody>
        </table>
                </div>
            </div>
            <div class="container">
                {{$product_categories->links() }}
            </div>
    </div>
    </div>


</x-app-layout>
