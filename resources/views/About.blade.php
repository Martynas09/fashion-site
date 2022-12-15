@extends('layouts.base')
@section('content')
    <div class="bg-gray-50 border drop-shadow-md w-[80rem] h-[30rem] mt-20">
        <div class="grid grid-cols-1">
        <div class="mt-16 flex justify-center">
            <div class="flex items-center space-x-4">
                <img class="w-32 h-32 rounded-full" src="/images/profilepic.png" alt="">
                <div class="font-medium text-black">
                    <div>Vardas Pavardė</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Stiliaus konsultantė</div>
                </div>
            </div>
        </div>
            <div class="mt-12 flex justify-center">
                <div class="flex items-center space-x-4">
                        <div class="text-center text-gray-700 flex justify-center w-[1000px]">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sed dui ut risus lobortis dignissim. Maecenas id dolor eu nulla congue vestibulum. Sed faucibus semper lacus vitae pharetra. Donec dapibus, dolor nec aliquam rutrum, quam dui finibus velit, et porttitor tortor urna vehicula nulla. Donec eu sapien vestibulum, egestas ligula eget, varius urna. Nulla quis pellentesque nunc. Cras et elementum augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
