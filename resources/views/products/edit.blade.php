<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-6">{{ __('Edit Product') }}</h1>

                    <form method="post" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="">
                                <x-input-label for="category_id" :value="__('Sub Category')" />
                                <x-select-input id="sub_category_id" name="sub_category_id" :options="$subCategories->pluck('name', 'id')" :selected="old('Sub_category_id', $product->sub_category_id)" class="block mt-1 w-full" required />
                                <x-input-error :messages="$errors->get('sub_category_id')" for="category_id" class="mt-2" />
                            </div>
                            <div class="">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $product->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" for="name" class="mt-2" />
                            </div>

                            <div class="">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full" name="description" :value="old('description', $product->description)" />
                                <x-input-error :messages="$errors->get('description')" for="description" class="mt-2" />
                            </div>

                            <div class="">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $product->price)" required />
                                <x-input-error :messages="$errors->get('price')" for="price" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <x-image-input id="image" class="block mt-1 w-full" name="image" :value="old('image', $product->image)"  />
                                <x-input-error :messages="$errors->get('image')" for="image" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update Product') }}
                            </x-primary-button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
