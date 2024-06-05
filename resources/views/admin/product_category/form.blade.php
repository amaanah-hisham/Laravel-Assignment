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
                                <h3 class="mb-3">Create Category</h3>
{{--                                <form method="post" action="{{route('product-categories.store') }}" >--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-group mb-4">--}}
{{--                                        <label for="category">Category Title</label>--}}
{{--                                        <input type="text" name="title" placeholder="Category Title" class="form-control">--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group mb-4">--}}
{{--                                        <label for="category">Category Slug</label>--}}
{{--                                        <input type="text" name="slug" placeholder="Category Slug" class="form-control">--}}
{{--                                    </div>--}}

{{--                                    <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                                </form>--}}
                                <form method="post" action="{{route('product-category.store') }}" x-data="{
    name : '',
    slug: ''
   }"
                                      x-init="$watch('name', value => {

         str = value.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'\\|\/,.<>?\s]/g, ' ').toLowerCase();
                 str = str.replace(/^\s+|\s+$/gm, '');

  str = str.replace(/\s+/g, '-');

        slug = str;
   })"


                                @csrf
                                {{--                        <div class="form-group mb-3">--}}
                                {{--                            <label for="category">Category Name</label>--}}
                                {{--                            <input type="text"  name="name" placeholder="Category Name" class="form-control" x-model="name">--}}
                                {{--                        </div>--}}


                                <div class="form-group mb-4">
                                    <label for="category">Category Title</label>
                                    <input type="text" name="title" placeholder="Category Title" class="form-control">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="category">Category Slug</label>
                                    <input type="text" name="slug" placeholder="Category Slug" class="form-control">
                                </div>

                                <div>
                                    <div class="form-group mb-4 d-flex">
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        <div class="form-group mb-3" style="padding: 0 10px;">
                                            <button type="button" onclick="" class="btn btn-primary">Back</button>

                                        </div>
                                    </div>
                                    {{--                            <label for="category">Category Name</label>--}}
                                    {{--            <label for="slug" value="{{ __('Slug') }}" />--}}
                                    {{--            <input id="slug" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"--}}
                                    {{--            x-model="slug"--}}
                                    {{--            type="text" name="slug" value="old('slug')" required--}}
                                    {{--                autofocus autocomplete="slug" />--}}
                                    {{--                <p class="mt-3 text-sm leading-6 text-gray-600">--}}
                                    {{--                                    Name of the Slug--}}
                                    {{--                </p>--}}
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
