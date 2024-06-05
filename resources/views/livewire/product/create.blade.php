<div>
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

                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif



                        <form wire:submit.prevent="save">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="sub_category">Choose Sub Category</label>
                                <select wire:model.defer="sub_category" id="" class="form-control @error('sub_category') is-invalid @enderror">
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                                @error('sub_category') <span class="invalid-feedback">{{$message}}</span>  @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Enter Product Title</label>
                                <input type="text"  wire:model="title" placeholder="Product Title" class="form-control">
                            </div>
                            <div class="mb-3" >
                                @if($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid" alt="Product Image" style="height: 200px;">
                                @endif
                                <label for="formFile" class="form-label">Enter Product Image</label>
                                <input class="form-control" type="file" id="formFile" wire:model.defer="image">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Enter Rate (LKR/Per Day)</label>
                                <input type="text"  wire:model.defer="price" placeholder="Product Price" class="form-control">
                            </div>

                            <div class="alert alert-info text-primary">
                                Please enter the following information in the description:
                                <ul>
                                    <li>Advance payment details</li>
                                    <li>Transport details</li>
                                </ul>
                            </div>


                            <div class="form-group mb-3">
                                <label for="">Enter Description</label>
                                <textarea wire:model.defer="description"  class="form-control" rows="3" placeholder="Please enter a description"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary" >Create Product</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
