<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <div>

                    <img src="{{ asset('assets/imgs/slider/admin.png') }}" class="w-80 h-80 rounded-full mx-auto mb-4">

                </div>
            </div>
                <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3 text-center">Register Users</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif




                <form method="post"
                    @if($user->id)
                    action="{{ route('user.update', $user->id) }}"
                    @else
                    action="{{ route('user.store') }}"
                    @endif

                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" style="padding: 10px 30px;">

                    @csrf
                    @if ($user->id)
                        @method('PUT')
                    @endif



                    <div class="form-group mb-4">
                        <label for="">Enter User's Name</label>
                        <input type="name"  name="name" placeholder="Name" class="form-control" value="{{ $user->id ? $user->name : '' }}">
                    </div>

                    <div class="form-group mb-4">
                        <label for="">Enter User's Email</label>
                        <input type="email"  name="email" placeholder="Email" class="form-control" value="{{ $user->id ? $user->email : '' }}">
                    </div>

                    <div class="form-group  mb-4">
                        <label for="">Enter User's Phone</label>
                        <input type="text"  name="mobile" placeholder="Phone" class="form-control" value="{{ $user->id ? $user->mobile : '' }}">
                    </div>

                    <div class="form-group mb-4">
                        <label for="">Enter User's Address</label>
                        <input type="text"  name="address" placeholder="Address" class="form-control" value="{{ $user->id ? $user->address : '' }}"ad>
                    </div>

                    <div class="form-group  mb-4">
                        <label for="role">Enter User's Role</label>
                        <select name="role" id="role" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}"
                                    {{ ($user && old('role', $user?->hasRole($role) ? 'selected' : '')) }}>
                                    {{ ucwords($role) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="">Enter User's Password</label>
                        <input type="password"  name="password" placeholder="Password" class="form-control">
                    </div>

                    <div class="form-group mb-4 d-flex">
                    <div class="form-group mb-3" >
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>


                    <div class="form-group mb-3" style="padding: 0 10px;">
                        <button type="button" onclick="window.location='{{ route('user.index') }}'" class="btn btn-primary">Back</button>

                        </div>
                    </div>

                </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
