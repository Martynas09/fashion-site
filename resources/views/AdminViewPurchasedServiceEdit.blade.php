@extends('layouts.base')
@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <div class="mt-10 max-w-sm">
        <p class="text-center text-gray-700 text-xl font-semibold mb-5">
            Užsakymo "{{$service[0]->order_number}}" redagavimas
        </p>
        <p class="text-left text-gray-700 text-sm font-semibold mb-5">
            Užsakymo data: {{$service[0]->created_at}}
        </p>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vardas</label>
                <input value="{{$service[0]->name}}" name="name" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('name')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">El.Paštas</label>
                <input value="{{$service[0]->email}}" name="email" type="email" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('email')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tel.nr</label>
                <input value="{{$service[0]->phone_number}}" name="phone_number" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('phone_number')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Užsakymo būsena:</label>
                <select name="status" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if($service[0]->status== "užsakyta")
                        <option value="užsakyta" selected>Užsakyta</option>
                        <option value="vykdoma">Vykdoma</option>
                        <option value="užbaigta">Užbaigta</option>
                    @elseif($service[0]->status== "vykdoma")
                        <option value="užsakyta">Užsakyta</option>
                        <option value="vykdoma" selected>Vykdoma</option>
                        <option value="užbaigta">Užbaigta</option>
                    @else
                        <option value="užsakyta">Užsakyta</option>
                        <option value="vykdoma">Vykdoma</option>
                        <option value="užbaigta" selected>Užbaigta</option>
                    @endif
                </select>
                @error('status')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="base-input" class=" mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Užsakyta paslauga:</label>
                <select name="service_id" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($services as $temp)
                        @if($temp->id == $service[0]->service_id)
                            <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                            @else
                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                        @endif
                        @endforeach
                </select>
                @error('service_id')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="mb-6 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center">Patvirtinti</button>
        </form>
    </div>
@endsection
