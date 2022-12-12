@extends('layouts.base')
@section('content')
<div class="max-w-sm mt-20">
    @include('layouts.alert')
    <p class="text-center text-gray-700 text-xl font-semibold mb-5">
        Administratoriaus prisijungimas
    </p>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vartotojo vardas</label>
            <input name="username" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('username')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-6">
            <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Slaptažodis</label>
            <input name="password" type="password" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('password')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-6">
            <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">OTP</label>
            <input name="otp" type="number" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('otp')
            {{ $message }}
            @enderror
        </div>
        <button type="submit" class="btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Prisijungti</button>
    </form>
</div>
@endsection
