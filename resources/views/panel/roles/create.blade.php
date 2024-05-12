@extends('layouts.app')

@section('title' , 'create role')

@section('body')


<div class="mt-24">
    <form class="max-w-sm mx-auto font-vazir shadow-lg dark:shadow-none bg-white dark:bg-slate-800 p-7 rounded-lg " action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('translate.role name')</label>
            <input type="text" id="name" name="role"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                 />
        </div>
        <div class="mb-5">
            <label for="persian_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('translate.role persian name')</label>
            <input type="text" id="persian_name" name="persian_name"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                 />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 w-full mt-7 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">@lang('translate.create')</button>
    </form>

</div>
@endsection