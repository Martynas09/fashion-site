@extends('layouts.base')
@section('content')
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <div class="mt-10">
    <form method="POST" enctype="multipart/form-data">
        @csrf
        @if (session('errormessage'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p class="font-bold">Klaida!</p>
                <p>{{ session('errormessage') }}</p>
            </div>
        @endif
        <div class="mb-6">
            <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pavadinimas</label>
            <input name="title" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('title')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-6">
            <label for="message" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Aprašymas</label>
            <textarea name="description" id="message" rows="4" class=" p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            @error('description')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-6">
            <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kaina</label>
            <input name="price" type="number" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('price')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-6 increment input-group control-group">
            <label class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Nuotraukų įkelimas</label>
            <input class="w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="photo_url[]">
            <button type="button" class="btn-success focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Pridėti daugiau</button>
            @error('photo_url')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-6 clone hidden">
            <div class="control-group input-group">
                <input class=" w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="photo_url[]">
                <div class="mt-2">
                    <button type="button" class="btn-danger focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Pašalinti</button>
                </div>
            </div>
            @error('photo_url')
            {{ $message }}
            @enderror
        </div>
        <button type="submit" class="btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Patvirtinti</button>
    </form>
    </div>
    <script type="text/javascript">


        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>
@endsection
