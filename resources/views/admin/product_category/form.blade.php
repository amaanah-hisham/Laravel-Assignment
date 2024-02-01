<x-app-layout>
    <div class="container mx-auto mt-20">
        <div class="space-y-10 divide-y divide-gray-900/10">

     <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
             <div class="flex items-center justify-center px-4 sm:px-0">
                  <div>

                       <img src="{{ asset('assets/imgs/slider/admin.png') }}" class="w-80 h-80 rounded-full mx-auto mb-4">


                        <h2 class="text-base font-semibold leading-7 text-gray-900">
                             Create Categories
                        </h2>
                         <p class="mt-1 text-sm leading-6 text-gray-600">
                             Create electronic product categories for electronic items.
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
   action="{{  route('product-category.store') }}" method="post" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        @csrf
        <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        <div class="col-span-full">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                    Item Category Name
            </label>
            <label for="name" value="{{ __('Name') }}" / >
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
                         <button type="button" onclick="window.location='{{ route('product-category.index') }}'"
                            class="rounded-md bg-indigo-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                             Back
                        </button>
                    </div>
    </form>
    </div>

</div>
</div>
</x-app-layout>