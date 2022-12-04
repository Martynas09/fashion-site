@extends('layouts.base')
@section('content')
    <div class="grid mt-1 grid-cols-1">
        @foreach($posts as $post)
            <div
                class=" bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 mb-10">
                <div class="pl-5 py-2 text-xl flex items-center">
                    <img class="w-12 h-12 rounded-full shadow-lg"
                         src="/images/profilepic.png"/>
                    <div class="pl-2">Tavo kodas administracija
                    <h5 class="text-sm tracking-tight text-gray-500 dark:text-white">{{$post->created_at}}</h5></div>
                </div>

                <a>
                    @if($post->photos->count() > 0)
                        <img class="object-cover w-full" src="/images/{{$post->photos[0]->photo_url}}">
                    @endif
                </a>
                <div class="p-5">
                    @if($post->description !=null)
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>
                    @endif
                    <a href="#" class="bottom-5 left-5 inline-flex items-center bg-gray-300 border-neutral-400 border px-3 py-2 text-sm font-medium text-center text-gray-800 hover:border-neutral-400 hover:text-white hover:shadow-[inset_13rem_0_0_0] hover:shadow-gray-400 duration-[400ms,700ms] transition-[color,box-shadow]">
                        Pasidalinti
                        <svg class="pl-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
//todo: make same as facebook post
