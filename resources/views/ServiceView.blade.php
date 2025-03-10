@extends('layouts.base')
@section('content')
    <a href="/services">
        <button type="button"
                class="absolute top-24 left-6 lg:mr-12 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-6 py-2 text-center">
            Atgal
        </button>
    </a>
    <section class="mt-12 bg-gray-100 border rounded-lg drop-shadow-md lg:w-[80rem] sm:w-[10rem] h-[500px] mt-2">
        <div class="mt-8 grid lg:grid-cols-2 gap-36 sm:grid-cols-1">
        @if($service[0]->photos->count()>1)
                <div id="default-carousel" class="relative w-[40rem]" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="max-w-2xl w-[80rem] h-[50rem] ml-5 mt-10 relative mb-4 mt-4 ml-4 overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                        <!-- Item 1 -->
                        @foreach($service[0]->photos as $photo)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="/images/{{$photo->photo_url}}"
                                     class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                     alt="...">
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                        @foreach($service[0]->photos as $photo)
                            <button type="button" class="ml-10 mb-2 w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
                                    data-carousel-slide-to="0"></button>
                        @endforeach
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                            class="ml-10 flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-prev>
        <span
            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M15 19l-7-7 7-7"></path></svg>
            <span class="hidden">Previous</span>
        </span>
                    </button>
                    <button type="button"
                            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-next>
        <span
            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M9 5l7 7-7 7"></path></svg>
            <span class="hidden">Next</span>
        </span>
                    </button>
                </div>
                @else
                    <div
                        class="max-w-2xl w-[80rem] h-[50rem] ml-5 mt-10 relative mb-4 mt-4 ml-4 overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                        <img src="/images/{{$service[0]->photos[0]->photo_url}}"
                             class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                    </div>
                @endif
                <div class=" mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                    <a href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline md:text-3xl">
                        {{$service[0]->title}}
                    </a>
                    <p class="mt-3 text-sm text-gray-500  md:text-sm">
                        {{$service[0]->description}}
                    </p>
                    <p class="mt-16 text-3xl font-bold text-gray-900  md:text-sm">
                        KAINA
                    </p>
                    <p class=" text-3xl font-bold text-gray-900 dark:text-white">
                        €{{$service[0]->price}}
                    </p>
                    <a href="/purchaseService/{{$service[0]->id}}">
                        <button class=" mt-16 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-6 py-2 text-center">
                            Užsakyti
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
