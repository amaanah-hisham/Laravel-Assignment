<div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">Update Product</h3>

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

                            <div class="form-group mb-3">
                                <label for="sub_category">Choose Sub Category</label>
                                <select wire:model.defer="sub_category" id=""
                                        class="form-control @error('sub_category') is-invalid @enderror">
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                                @error('sub_category') <span class="invalid-feedback">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Enter Product Title</label>
                                <input type="text" wire:model.defer="title" placeholder="Product Title" class="form-control">
                            </div>
                            <div class="mb-3">
                                @if($image_db && empty($image))
                                    <img src="{{ $image_db }}" class="img-fluid" alt="Product Image"
                                         style="height: 200px;">
                                    <br>
                                @endif

                                @if($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid" alt="Product Image"
                                         style="height: 200px;">
                                    <br>
                                @endif

                                <label for="formFile" class="form-label">Enter Product Image</label>
                                <input class="form-control" type="file" id="formFile" wire:model.defer="image">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Enter Hourly Rate</label>
                                <input type="text" wire:model.defer="price" placeholder="Product Price"
                                       class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Enter Description</label>
                                <textarea wire:model.defer="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-dark">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
