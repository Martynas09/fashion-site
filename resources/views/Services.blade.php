@extends('layouts.base')
@section('content')
    <div class="grid mt-6 grid-cols-1">
        @if(session('role')=="admin")
            <div class="mb-5 ml-2">
                <a href="/addService">
                    <button type="button"
                            class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-lg px-4 py-4 text-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Pridėti paslaugą
                    </button>
                </a>
            </div>
        @endif
        @include('layouts.alert')
            @if($services->count()>0)
        @foreach($services as $service)
            <div class="bg-gray-50 border drop-shadow-md md:w-[80rem] sm:w-[10rem] mb-9">
                <div class="container px-6 py-10 mx-auto">
                    <div class="lg:-mx-6 lg:flex">
                        <img class="object-cover sm:w-56 lg:mx-6 lg:w-1/2 sm:h-45 lg:h-72"
                             src="/images/{{$service->photos[0]->photo_url}}">
                        <div class="relative mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                            @if(session('role')=="admin")
                                <a href="/editService/{{$service->id}}">
                                    <button data-popover-target="popover-edit" type="button"
                                            class="absolute top-0 right-24 text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                </a>
                                <div data-popover id="popover-edit" role="tooltip"
                                     class="absolute z-10 invisible inline-block w-36 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                    <div class="px-3 py-2 text-black text-center">
                                        <p>Redaguoti paslaugą</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                                <a onclick="return confirm('Ar tikrai norite pašalinti paslaugą?')"
                                   href="/deleteService/{{$service->id}}">
                                    <button data-popover-target="popover-remove" type="button"
                                            class="absolute top-0 right-10 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </a>
                                <div data-popover id="popover-remove" role="tooltip"
                                     class="absolute z-10 invisible inline-block w-36 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                    <div class="px-3 py-2 text-black text-center">
                                        <p>Pašalinti paslaugą</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            @endif
                            <a href="#"
                               class="block text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{$service->title}}
                            </a>
                            <p class="mt-3 ml-1 text-md text-gray-500">
                                {{$service->description}}
                            </p>
                            <p class="absolute bottom-2 left-0 text-3xl font-bold text-gray-900 dark:text-white">
                                €{{$service->price}}
                            </p>
                            <a href="/viewService/{{$service->id}}">
                                <button type="button"
                                        class="absolute bottom-0 right-0 lg:mr-12 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-6 py-2 text-center">
                                    Plačiau
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
            @else
                <div class="mt-4 flex flex-col items-center justify-center">
                    <h1 class="text-2xl font-bold text-gray-700 dark:text-white">Nėra sukurtų paslaugų.</h1>
                    @endif
    </div>
@endsection
