@extends('layouts.base')
@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <div class="mt-10 max-w-sm">
        @include('layouts.backButton')
        <p class="text-center text-gray-700 text-xl font-semibold mb-5">
            Paslaugos "{{$service[0]->title}}" redagavimas
        </p>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pavadinimas</label>
                <input value="{{$service[0]->title}}" name="title" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('title')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="message" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Aprašymas</label>
                <textarea name="description" id="message" rows="4" class=" p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$service[0]->description}}</textarea>
                @error('description')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kaina</label>
                <input value="{{$service[0]->price}}" name="price" type="number" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('price')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <label class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Dabartinės nuotraukos:</label>
            <div class="grid mb-2 grid-cols-2 border border-black rounded-lg">
                @foreach($service[0]->photos as $photo)
                    <div class="flex">
                        @if($service[0]->photos->count() > 1)
                    <a onclick="return confirm('Ar tikrai norite pašalinti nuotrauką?')"
                       href="/deletePhoto/{{$photo->id}}">
                        <button data-popover-target="popover-remove" type="button"
                                class="absolute ml-1 mt-0.5 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </a>
                        <div data-popover id="popover-remove" role="tooltip"
                             class="absolute z-10 invisible inline-block w-36 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 text-black">
                                <p>Pašalinti nuotrauką</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                        @endif
                    <img class="my-2 mx-2 h-[120px] w-[170px]" src="/images/{{$photo->photo_url}}" alt="photo">
                    </div>
                @endforeach
            </div>
            <div class="mb-6 increment input-group control-group">
                <label class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Papildomų nuotraukų įkelimas</label>
                <input class="w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="photo_url[]" multiple>
                @error('photo_url.*')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                @error('photo_url')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="mb-6 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center">Patvirtinti</button>
        </form>
    </div>
@endsection
