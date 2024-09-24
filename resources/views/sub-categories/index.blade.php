<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sub Categories') }}
        </h2>
    </x-slot>
{{--   sub category index table --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-semibold">{{ __('Sub Categories') }}</h1>
                        <x-link-button href="{{ route('sub-category.create') }}">
                            {{ __('Create Sub Categories') }}
                        </x-link-button>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right dark:text-gray-50 text-gray-900">
                        <thead class="ext-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-300">
                        <tr class="text-gray-50">
                            <th class="px-6 py-3">{{ __('Name') }}</th>
                            <th class="px-6 py-3 text-center">{{ __('Category') }}</th>
                            <th class="px-6 py-3 text-center">{{ __('Description') }}</th>
                            <th class="px-6 py-3 text-center">{{ __('Slug') }}</th>
                            <th class="px-6 py-3 text-center">{{__('Created By')}}</th>
                            <th class="px-6 py-3 text-center">{{__('Updated By')}}</th>
                            <th class="px-6 py-3 text-end">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($subCategories as $subCategory)
                            <tr class="odd:bg-white odd:dark:bg-gray-900/10 even:bg-gray-50 even:dark:bg-slate-800 border-b dark:border-gray-700">
                                <td class="px-6 py-3">{{ $subCategory->name }}</td>
                                <td class=" px-6 py-3 text-center ">{{ $subCategory->category->name }}</td>
                                <td class=" px-6 py-3 text-center ">{{ $subCategory->description }}</td>
                                <td class="px-6 py-3 text-center ">{{ $subCategory->slug }}</td>
                                <td class="px-6 py-3 text-center ">{{ $subCategory->createdBy->name }}</td>
                                <td class="px-6 py-3 text-center ">{{ $subCategory->updatedBy->name }}</td>
                                <td class="px-6 py-3 text-end">
                                    <x-link-button href="{{ route('sub-category.edit', $subCategory) }}">
                                        {{ __('Edit') }}
                                    </x-link-button>
                                    <form method="post" action="{{ route('sub-category.destroy', $subCategory) }}" class="inline">
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
                                <td class="px-6 py-3 text-center" colspan="4">{{ __('No sub categories found.') }}</td>
                            </tr>
                        @endforelse
                        </tbody>

                        <tfoot class="">
                            {{ $subCategories->links() }}
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
