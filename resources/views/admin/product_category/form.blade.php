<x-app-layout>
    <div class="container mx-auto mt-5">
        <div class="space-y-10 divide-y divide-gray-900/10">

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">
                        Create Category
                    </h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Create different product categories.
                    </p>
                </div>
            <form action="{{  route('product-category.store') }}" method="post" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        @csrf
        <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        <div class="col-span-full">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                    Category Name
            </label>
            <label for="name" value="{{ __('Name') }}" / >
            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Name of the Category
                </p>
                
        </div>

        <div class="col-span-full">
           <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">
                                    Slug
            </label>
            <label for="slug" value="{{ __('Slug') }}" />
            <input id="slug" class="block mt-1 w-full"
            type="text" name="slug" :value="old('slug')" required
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
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
    </div>

</div>
</div>
</x-app-layout>