<x-base-layout>

    @section('content')
        <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="index.html" rel="nofollow">Home</a>
                        <span></span> Register
                    </div>
                </div>
            </div>
            <section class="pt-150 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                        <div class="padding_eight_all bg-white">
                                            <div class="heading_s1">
                                                <h3 class="mb-30">Create an Account</h3>
                                            </div>

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <form method="post" action="{{route('product-sub-categories.store')}}">

                                                @csrf

                                                <div class="form-group">
                                                    <select name="category" id="" class="form-control">
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text"  name="sub_category" placeholder="Sub Category">
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Create Sub Category</button>
                                                </div>
                                            </form>
                                            <div class="text-muted text-center">Already have an account? <a href="#">Sign in now</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img src="assets/imgs/login.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

    @endsection


    <div class="container mx-auto mt-20">
        <div class="space-y-10 divide-y divide-gray-900/10">

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="flex items-center justify-center px-4 sm:px-0">
                    <div>

                        <img src="{{ asset('assets/imgs/slider/admin.png') }}" class="w-80 h-80 rounded-full mx-auto mb-4">


                        <h2 class="text-base font-semibold leading-7 text-gray-900">
                            Create Sub Categories
                        </h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">
                            Create electronic product sub categories for electronic items.
                        </p>
                    </div>
                </div>
                <form x-data="{
    name : '',
    slug: ''
   }"
                      x-init="$watch('name', value => {

         str = value.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'\\|\/,.<>?\s]/g, ' ').toLowerCase();
                 str = str.replace(/^\s+|\s+$/gm, '');

  str = str.replace(/\s+/g, '-');

        slug = str;
   })"
                      action="{{  route('product-sub-categories.store') }}" method="post" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    @csrf
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                            <div class="col-span-full">
                                <label for="category" class="block text-sm font-medium leading-6 text-gray-900">
                                    Item Category
                                </label>
                                <label for="category" value="{{ __('Category') }}" />
                                <div x-data="select" class="relative w-[30rem]" @click.outside="open = false">
                                    <button @click="toggle" :class="(open) && 'ring-blue-600'" class="flex w-full items-center justify-between rounded bg-white p-2 ring-1 ring-gray-300">
                                        <span x-text="(category == '') ? 'Choose Category' : category"></span>
                                        <i class="fas fa-chevron-down text-xl"></i>
                                    </button>

                                    <ul class="z-2 absolute mt-1 w-full rounded bg-gray-50 ring-1 ring-gray-300" x-show="open">
                                        @foreach($categories as $category)
                                            <li class="cursor-pointer select-none p-2 hover:bg-gray-200" @click="setCategory('{{$category->name}}')">{{$category->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                    Item Category Name
                                </label>
                                <label for="name" value="{{ __('Name') }}" />
                                <input id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="name" value="old('name')" required
                                       autofocus autocomplete="name" x-model="name" />
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Name of the Electronic Product Category
                                </p>

                            </div>



                            <div class="col-span-full">
                                <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">
                                    Slug
                                </label>
                                <label for="slug" value="{{ __('Slug') }}" />
                                <input id="slug" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                       x-model="slug"
                                       type="text" name="slug" value="old('slug')" required
                                       autofocus autocomplete="slug" />
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Name of the Slug
                                </p>
                            </div>

                        </div>
                    </div>

                    <!--button type="submit">
                        Save
                    </button-->
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">

                        <button type="submit"
                                class="rounded-md bg-indigo-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
{{--                        <button type="button" onclick="window.location='{{ route('product-sub-category.create') }}'"--}}
{{--                                class="rounded-md bg-indigo-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">--}}
{{--                            Back--}}
{{--                        </button>--}}
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("select", () => ({
                open: false,
                category: "",

                toggle() {
                    this.open = !this.open;
                },

                setCategory(val) {
                    this.category = val;
                    this.open = false;
                },
            }));
        });
    </script>
</x-base-layout>
