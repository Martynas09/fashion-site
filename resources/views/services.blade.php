@extends('layouts.base')
@section('content')
    <div class="">
    <div class="grid gap-16 mt-12 grid-cols-1">
            @foreach($services as $service)
            <div class="bg-gray-100 border rounded-lg drop-shadow-md lg:w-[80rem] sm:w-[10rem]">
                <div class="container px-6 py-10 mx-auto">
                    <div class="lg:-mx-6 lg:flex">
                        <img class="object-cover w-56 lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="/images/{{$service->photos[0]->photo_url}}">

                        <div class="relative mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                            <a href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline md:text-3xl">
                                {{$service->title}}
                            </a>
                            <p class="mt-3 text-sm text-gray-500  md:text-sm">
                                {{$service->description}}
                            </p>
                            <p class="mt-3 text-sm text-gray-500  md:text-sm">
                                {{$service->price}}
                            </p>
                            <a href="/viewService/{{$service->id}}">
                            <button class="absolute bottom-6 right-12 bg-gray-300 px-6 py-2 text-xl border-neutral-400 border-2 rounded-lg text-gray-800 hover:text-gray-100 hover:shadow-[inset_13rem_0_0_0] hover:shadow-gray-900 duration-[400ms,700ms] transition-[color,box-shadow]">
                                Plačiau
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    </div>
@endsection
