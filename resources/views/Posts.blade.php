@extends('layouts.base')
@section('content')
    <div class="grid mt-1 grid-cols-1">
        @if(session('role')=="admin")
            <div class="mb-5 ml-2">
                <a href="/addPost">
                    <button type="button"
                            class="flex text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-lg px-4 py-4 text-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Pridėti įrašą
                    </button>
                </a>
            </div>
        @endif
            @include('layouts.alert')
        @foreach($posts as $post)
            <div class="relative bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 mb-10">
                <div class="pl-5 py-2 text-xl flex items-center">
                    <img class="w-12 h-12 rounded-full shadow-lg"
                         src="/images/profilepic.png"/>
                    <div class="pl-2">Tavo kodas administracija
                        <h5 class="text-sm tracking-tight text-gray-500 dark:text-white">{{$post->created_at}}</h5>
                    </div>
                </div>
                @if(session('role')=="admin")
                    <div class="absolute right-4 top-4">
                        <a href="/editPost/{{$post->id}}">
                            <button data-popover-target="popover-edit" type="button"
                                    class=" top-0 right-20 text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                        </a>
                        <div data-popover id="popover-edit" role="tooltip"
                             class="absolute z-10 invisible inline-block w-32 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 text-black text-center">
                                <p>Redaguoti įrašą</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                        <a onclick="return confirm('Ar tikrai norite pašalinti įrašą?')"
                           href="/deletePost/{{$post->id}}">
                            <button data-popover-target="popover-remove" type="button"
                                    class=" top-0 right-10 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </a>
                        <div data-popover id="popover-remove" role="tooltip"
                             class="absolute z-10 invisible inline-block w-28 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 text-black text-center">
                                <p>Pašalinti įrašą</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </div>
                @endif
                <a>
                    @if($post->photos->count() > 0)
{{--                        <img class="object-cover w-[900px]" src="/images/{{$post->photos[0]->photo_url}}">--}}
                        @if($post->photos->count()>1)
                                <div id="default-carousel" class="relative" data-carousel="static">
                                    <!-- Carousel wrapper -->
                                    <div class="overflow-hidden relative  h-[750px] w-[900px]">
                                        <!-- Item 1 -->
                                        @foreach($post->photos as $photo)
                                            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                                                <img src="/images/{{$photo->photo_url}}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Slider indicators -->
                                    <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                                        @foreach($post->photos as $photo)
                                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                        @endforeach
                                    </div>
                                    <!-- Slider controls -->
                                    <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="hidden">Previous</span>
        </span>
                                    </button>
                                    <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="hidden">Next</span>
        </span>
                                    </button>
                                </div>
                                @else
                                        <img src="/images/{{$post->photos[0]->photo_url}}" class="object-cover w-[900px]" alt="...">
                        @endif
                    @endif
                </a>
                <div class="p-5">
                    @if($post->description !=null)
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>
                    @endif
                    <a href="" target="popup"
                       onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=https://tavokodas.lt/postsfacebook-share-dialogwidth=800,height=600','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;"
                       class="bottom-5 left-5 inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-lg px-4 py-2 text-center">
                        Pasidalinti
                        <svg class="pl-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
