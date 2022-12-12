@extends('layouts.base')
@section('content')
    <div class="grid mt-6 grid-cols-1">
        @if(session('role')=="admin")
        <div class="mb-5 ml-2">
            <a href="/addActivity">
                <button type="button" class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-lg px-4 py-4 text-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Pridėti grupinę veiklą
                </button>
            </a>
        </div>
        @endif
        @foreach($groupActivities as $groupActivity)
            <div class="bg-gray-50 border drop-shadow-md md:w-[80rem] sm:w-[10rem] mb-9">
                <div class="container px-6 py-10 mx-auto">
                    <div class="lg:-mx-6 lg:flex">
                        <img class="object-cover sm:w-56 lg:mx-6 lg:w-1/2 sm:h-45 lg:h-72" src="/images/{{$groupActivity->photos[0]->photo_url}}">
                        <div class="relative mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                            <a href="#" class="block text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{$groupActivity->title}}
                            </a>
                            <p class="mt-3 ml-1 text-md text-gray-500">
                                {{$groupActivity->description}}
                            </p>
                            <p class="absolute bottom-2 left-0 text-3xl font-bold text-gray-900 dark:text-white">
                                {{$groupActivity->size}}
                            </p>
                            <p class="absolute bottom-2 left-0 text-3xl font-bold text-gray-900 dark:text-white">
                                {{$groupActivity->free_spaces}}
                            </p>
                            <a href="/viewGroupActivity/{{$groupActivity->id}}">
                                <button type="button" class="absolute bottom-0 right-0 lg:mr-12 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-6 py-2 text-center">
                                    Plačiau
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
