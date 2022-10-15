@extends('layouts.base')
@section('content')

            @foreach($services as $service)
            <section class="bg-gray-100 border rounded-lg drop-shadow-md lg:w-[80rem] sm:w-[10rem]">
                <div class="container px-6 py-10 mx-auto">
                    <div class="lg:-mx-6 lg:flex">
                        <img class="object-cover w-56 lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"alt="">

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
                            <button class="absolute bottom-6 right-12 bg-gray-300 px-6 py-2 text-xl border-neutral-400 border-2 rounded-lg text-gray-800 hover:text-gray-100 hover:shadow-[inset_13rem_0_0_0] hover:shadow-gray-900 duration-[400ms,700ms] transition-[color,box-shadow]">
                                Plačiau
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach

@endsection
