@extends('layouts.base')
@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <div class="mt-10 max-w-sm">
        <p class="text-center text-gray-700 text-xl font-semibold mb-5">
            Įrašo sukurimas
        </p>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="message" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Aprašymas(jei reikia)</label>
                <textarea name="description" id="message" rows="4" class=" p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                @error('description')
                {{ $message }}
                @enderror
            </div>
            <div class="mb-6 increment input-group control-group">
                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Nuotraukos įkelimas</label>
                <input class="w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="photo_url">
                @error('photo_url')
                {{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Patvirtinti</button>
        </form>
    </div>
@endsection
