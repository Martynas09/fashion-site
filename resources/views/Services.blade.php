@extends('layouts.base')
@section('content')
    <div class="grid mt-6 grid-cols-1">
        @include('layouts.alert')
            @foreach($services as $service)
            <div class="bg-gray-50 border drop-shadow-md md:w-[80rem] sm:w-[10rem] mb-9">
                <div class="container px-6 py-10 mx-auto">
                    <div class="lg:-mx-6 lg:flex">
                        <img class="object-cover sm:w-56 lg:mx-6 lg:w-1/2 sm:h-45 lg:h-72" src="/images/{{$service->photos[0]->photo_url}}">
                        <div class="relative mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                            <a href="#" class="block text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{$service->title}}
                            </a>
                            <p class="mt-3 ml-1 text-md text-gray-500">
                                {{$service->description}}
                            </p>
                            <p class="absolute bottom-2 left-0 text-3xl font-bold text-gray-900 dark:text-white">
                                €{{$service->price}}
                            </p>
                            <a href="/viewService/{{$service->id}}">
                            <button class="absolute bottom-0 right-0 lg:mr-12 bg-gray-300 px-6 py-2 text-xl border-neutral-400 border text-gray-800 hover:border-neutral-400 hover:text-white hover:shadow-[inset_13rem_0_0_0] hover:shadow-gray-400 duration-[400ms,700ms] transition-[color,box-shadow]">
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
