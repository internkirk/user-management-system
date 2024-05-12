@extends('layouts.app')


@section('title' , 'Users')


@section('body')


<div class="m-10">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 font-vazirThin dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        @lang('translate.id')
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang('translate.name')
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang('translate.email')
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang('translate.role')
                    </th>
                    <th scope="col" class="px-6 py-3">
                        @lang('translate.action')
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 font-vazir hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    @forelse ($user->role as $role)
                    <td class="px-6 py-4 inline-block">
                        <p class="text-white border-2 border-blue-600 rounded-lg bg-blue-600  m-1 p-1">
                            {{ $role->persian_name }}
                        </p>
                    </td>
                    @empty
                    <td class="px-6 py-4">
                        <p class="text-red-500 font-vazir">
                            @lang('translate.without role')
                        </p>
                    </td>
                    @endforelse
                    <td class="px-6 py-4">
                        <a href="{{ route('users.edit',$user->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">@lang('translate.edit')</a>
                    </td>
                </tr>
                @empty
                <td class="px-6 py-4">
                    <p class="text-red-500 font-vazir">
                        @lang('translate.there is no user')
                    </p>
                </td>
                @endforelse
            </tbody>
        </table>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between py-4 mx-6"
            aria-label="Table navigation">
            <span
                class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
                <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                    class="font-semibold text-gray-900 dark:text-white">1000</span></span>
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                        class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@endsection