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
                    <h1 class="h5 fw-semibold text-gray-900 mb-0">Manage Users</h1>
                </div>
                <div class="mt-4 mt-sm-0">
                    <a href="{{ route('user.create') }}" class="btn me-2 rounded text-white" style="background-color: #052f8c;">Create User</a>
                </div>
            </div>

            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                        <tr>
                            <th scope="col" class="text-sm fw-semibold">ID</th>
                            <th scope="col" class="text-sm fw-semibold">Name</th>
                            <th scope="col" class="text-sm fw-semibold">Email</th>

                            <th scope="col" class="text-sm fw-semibold">Role</th>

                            @role('Admin')
                            <th scope="col" class="text-sm fw-semibold">Rent Requests</th>
                            <th scope="col" class="text-sm fw-semibold">Listed Products</th>
                            @endrole

                            <th scope="col" class="text-sm fw-semibold">Actions</th>
                            <th scope="col"><span class="visually-hidden">Edit</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>{{ $user->getRoleNames()->first() }}</td>

                                @role('Admin')
                                <td>{{ $user->rentedItemsAsRentee->count() }}</td>
                                <td>{{ $user->userproducts->count() }}</td>
                                @endrole

                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="btn-group">
                                        <a href="{{ route('user.show', $user->id) }}" class="btn me-2 rounded" style="background-color: #bde3fc;">Show</a>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn me-2 rounded" style="background-color: #bde3fc;">Edit</a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn me-2 rounded" style="background-color: #bde3fc;">Delete</button>
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{ $users->links('pagination::bootstrap-4') }} <!-- Adjust the pagination view to use Bootstrap 4 styles -->
    </div>
</x-app-layout>

























