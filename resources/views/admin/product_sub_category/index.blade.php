<x-app-layout>
    <div class="container-fluid">
        <h1 > Manage Product Categories</h1>
        <a href="{{ route('product-sub-categories.create') }}"
           class="btn btn-dark">
            Create Sub Category
        </a>

        <table class="table table-responsive ">
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
                            <a href="{{ "" }}"
                               class="btn btn-info me-2 rounded">Show</a>
                            <a href="{{ route('product-sub-categories.edit', ['slug' => $product_sub_category->slug]) }}"
                               class="btn btn-primary me-2 rounded">Edit</a>
                            <form action="{{ "route('product-sub-category.destroy', $product_sub_category->id)" }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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

        <div class="container">
            {{$product_sub_categories->links() }}
        </div>

    </div>

</x-app-layout>
