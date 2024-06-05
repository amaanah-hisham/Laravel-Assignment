<x-app-layout>

        <div class="container">
            <div class="row">



                <div class="col-lg-6">

                    <div>

                        <img src="{{ asset('assets/imgs/slider/admin.png') }}" class="w-80 h-80 rounded-full mx-auto mb-4">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Create Sub Category</h3>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{session()->get('success') }}
                                </div>

                            @endif

                            <form method="post" action="{{route('product-sub-categories.store')}}">

                                @csrf

                                <div class="form-group mb-3">
                                    <label for="category">Choose Category</label>
                                    <select name="category" id="" class="form-control @error('category') is-invalid @enderror">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <span class="invalid-feedback">{{$message}}</span>  @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Enter Sub Category</label>
                                    <input type="text"  name="sub_category" placeholder="Sub Category" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary" name="login">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


</x-app-layout>
