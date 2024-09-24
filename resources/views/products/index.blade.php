<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-semibold">{{ __('Products') }}</h1>
                       <x-link-button href="{{ route('product.create') }}">
                            {{ __('Create Product') }}
                        </x-link-button>
                    </div>

                        <table class="w-full text-sm text-left rtl:text-right dark:text-gray-50 text-gray-900">
                            <thead class="ext-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                            <tr class="text-gray-50">
                                <th class="px-6 py-3">{{ __('Name') }}</th>
                                <th class="px-6 py-3 text-center">{{ __('Category') }}</th>
                                <th class="px-6 py-3 text-center">{{ __('Sub Category') }}</th>
                                <th class="px-6 py-3 text-center">{{ __('Description') }}</th>
                                <th class="px-6 py-3 text-center">{{ __('Image') }}</th>
                                <th class="px-6 py-3 text-center">{{ __('Price') }}</th>
                                <th class="px-6 py-3 text-end">{{ __('Created By') }}</th>
                                <th class="px-6 py-3 text-end">{{ __('Updated By') }}</th>
                                <th class="px-6 py-3 text-end">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($products as $product)
                                <tr class="odd:bg-white odd:dark:bg-gray-900/10 even:bg-gray-50 even:dark:bg-slate-800 border-b dark:border-gray-700">
                                    <td class="px-6 py-3">{{ $product->name }}</td>
                                    <td class=" px-6 py-3 text-center ">{{ $product->subCategory->category->name }}</td>
                                    <td class=" px-6 py-3 text-center ">{{ $product->subCategory->name }}</td>
                                    <td class=" px-6 py-3 text-center ">{{ $product->description }}</td>
                                    <td class="px-6 py-3 text-center">
                                        <img src="{{ asset('/'.$product->image) }}" class="w-10 h-10 m-auto" alt="image">
                                    </td>
                                    <td class="px-6 py-3 text-center ">{{ $product->price }}</td>
                                    <td class="px-6 py-3 text-center ">{{ $product->createdBy->name }}</td>
                                    <td class="px-6 py-3 text-center ">{{ $product->updatedBy->name }}</td>
                                    <td class="px-6 py-3 text-end">
                                        <x-link-button href="{{ route('product.edit', $product) }}">
                                            {{ __('Edit') }}
                                        </x-link-button>
                                        <form method="post" action="{{ route('product.destroy', $product) }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button>
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-6 py-3 text-center" colspan="5">{{ __('No products found.') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
