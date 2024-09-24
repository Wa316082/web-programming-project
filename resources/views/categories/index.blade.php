<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('categories') }}
        </h2>
    </x-slot>
{{--    category index table --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-semibold">{{ __('categories') }}</h1>
                        <x-link-button href="{{ route('category.create') }}">
                            {{ __('Create categories') }}
                        </x-link-button>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right dark:text-gray-50 text-gray-900">
                        <thead class="ext-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                        <tr class="text-gray-50">
                            <th class="px-6 py-3">{{ __('Name') }}</th>
                            <th class="px-6 py-3 text-center">{{ __('Description') }}</th>
                            <th class="px-6 py-3 text-center">{{ __('Slug') }}</th>
                            <th class="px-6 py-3 text-end">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($categories as $category)
                            <tr class="odd:bg-white odd:dark:bg-gray-900/10 even:bg-gray-50 even:dark:bg-slate-800 border-b dark:border-gray-700">
                                <td class="px-6 py-3">{{ $category->name }}</td>
                                <td class=" px-6 py-3 text-center ">{{ $category->description }}</td>
                                <td class="px-6 py-3 text-center ">{{ $category->slug }}</td>
                                <td class="px-6 py-3 text-end">
                                    <x-link-button href="{{ route('category.edit', $category) }}">
                                        {{ __('Edit') }}
                                    </x-link-button>
                                    <form method="post" action="{{ route('category.destroy', $category) }}" class="inline">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button
                                        >
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-3 text-center" colspan="4">{{ __('No categories found.') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
{{--                        pagination--}}
{{--                        <tfoot class="">--}}

{{--                        </tfoot>--}}


                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
