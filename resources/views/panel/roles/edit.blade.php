@extends('layouts.app')

@section('title' , 'edit role')


@section('body')
<div class="bg-white-100 dark:bg-gray-800 rounded-md w-3/6 mx-auto mt-28 font-vazir shadow-md dark:shadow-none">
    <div class="px-8 py-4">
        <form action="{{ route('roles.update',$role->id) }}" method="POST">
            @csrf
            <div class="mb-9">
                <p class="text-slate-800 border-b dark:text-white pb-2">
                    @lang('translate.role')
                </p>
                <div class="mt-6 gap-6 flex">
                    <div>
                        <label class="text-slate-800 dark:text-white font-vazirThin">@lang('translate.role name'):</label>
                        <input id="" type="text" value="{{ $role->name }}" name="role" readonly
                        class="h-8 dark:text-white text-blue-800 bg-gray-100 border-gray-300 rounded focus:ring-blue-500
                        dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700
                        dark:border-gray-600">
                    </div>
                    <div>
                        <label class="text-slate-800 dark:text-white font-vazirThin">@lang('translate.role persian name'):</label>
                        <input id="" type="text" value="{{ $role->persian_name }}" name="persian_name"
                        class="h-8 dark:text-white text-blue-800 bg-gray-100 border-gray-300 rounded focus:ring-blue-500
                        dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700
                        dark:border-gray-600">
                    </div>
                </div>
            </div>
            <div>
                <p class="text-slate-800 border-b dark:text-white pb-2">
                    @lang('translate.permissions')
                </p>
                <div class="mt-6 gap-6 flex">
                    @forelse ($permissions as $permission)
                    <div>
                        <label class="text-slate-800 dark:text-white" for="{{ $permission->id }}">{{ $permission->persian_name }}</label>
                        <input id="{{ $permission->id }}" type="checkbox" @if($role->permissions->contains($permission)) checked @endif  value="{{ $permission->name }}" name="permissions[]"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    @empty
                    <p class="text-red-500 font-vazir">
                        @lang('translate.there is no permission')
                    </p>
                    @endforelse
                </div>
            </div>
            <div>
                <button class="mt-9 bg-sky-600 p-3 rounded-xl text-white w-full">@lang('translate.edit')</button>
            </div>
        </form>
    </div>
</div>
@endsection