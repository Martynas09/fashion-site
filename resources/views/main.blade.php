@extends('layouts.base')
@section('content')
    <div class="grid lg:grid-cols-2 gap-16 mt-12 sm:grid-cols-1 ">
        @foreach($posts as $post)
    <div class="mb-7 relative max-w-2xl lg:h-[650px] sm:h-[620px] sm:mb-6 bg-white border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a class="flex justify-center" href="#">
            <img class="max-h-[560px]" src="/images/{{$post->photos[0]->photo_url}}" alt="" />
        </a>
        <div class="p-2">
            <p class="mb-10 font-normal text-gray-900 dark:text-gray-400">{{$post->description}}</p>
        </div>
        <a>
            <h5 class="absolute right-0 bottom-0 pr-2 pb-1 text-sm tracking-tight text-gray-500 dark:text-white">{{$post->created_at}}</h5>
        </a>
    </div>
        @endforeach
    </div>
@endsection
