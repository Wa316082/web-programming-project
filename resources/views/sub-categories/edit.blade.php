<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Sub Category') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('sub-category.update', $subCategory) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $subCategory->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" for="name" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="slug" :value="__('slug')" />
                                <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug', $subCategory->slug)" required />
                                <x-input-error :messages="$errors->get('slug')" for="slug" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $subCategory->description)" required />
                                <x-input-error :messages="$errors->get('description')" for="description" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="category_id" :value="__('Category')" />
                                <x-select-input id="category_id" name="category_id" :options="$categories->pluck('name', 'id')" :selected="old('category_id', $subCategory->category_id)" class="block mt-1 w-full" />
                                <x-input-error :messages="$errors->get('category_id')" for="category_id" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update Sub Category') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
