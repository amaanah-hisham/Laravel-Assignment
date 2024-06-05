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
                        <h3 class="mb-3">Create Products</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="sub_category">Choose Sub Category</label>
                                <select name="sub_category" id="" class="form-control @error('sub_category') is-invalid @enderror">
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                                @error('sub_category') <span class="invalid-feedback">{{$message}}</span>  @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Enter Product Title</label>
                                <input type="text"  name="title" placeholder="Product Title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Enter Product Image</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Enter Rate (Per Day)</label>
                                <input type="text"  name="price" placeholder="Product Price" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Enter Description</label>
                                <input type="text"  name="description" placeholder="Product Description" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-dark" name="login">Create Product</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


</x-app-layout>
