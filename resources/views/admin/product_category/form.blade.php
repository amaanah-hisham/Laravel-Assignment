<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">Create Sub Category</h3>
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
                        <div class="form-group mb-3">
                            <label for="category">Category Name</label>
                            <input type="text"  name="name" placeholder="Category Name" class="form-control" x-model="name">
                        </div>

                        <div>

                            <label for="category">Category Name</label>
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
                         <button type="button" onclick="window.location='{{ route('product-category.index') }}'"
                            class="rounded-md bg-indigo-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                             Back
                        </button>
                    </div>
    </form>
    </div>

</div>
</div>
        </div>
    </div>
</x-app-layout>
