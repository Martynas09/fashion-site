@extends('layouts.base')
@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <div class="mt-10 max-w-sm">
        <p class="text-center text-gray-700 text-xl font-semibold mb-5">
            Registracija į grupinę veiklą {{$groupActivity[0]->title}}
        </p>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vardas</label>
                <input name="name" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pavardė</label>
                <input name="surname" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('surname')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lytis</label>
                <select name="gender" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="nepateikta">Pasirinkite</option>
                    <option value="vyras">Vyras</option>
                    <option value="moteris">Moteris</option>
                </select>
                @error('gender')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">El.Paštas</label>
                <input name="email" type="email" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Amžius</label>
                <input name="age" type="number" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('age')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tel.nr</label>
                <input name="phone_number" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('phone_number')
                {{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registruotis</button>
        </form>
    </div>
@endsection
