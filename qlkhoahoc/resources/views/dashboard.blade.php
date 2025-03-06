<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" id="qlhv">
                    <a href="{{ route('hocviens.index') }}">Quản lý học viên</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100"  id="qlkh">
                    <a href="{{ route('khoahocs.index') }}">Quản lý khóa học</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
