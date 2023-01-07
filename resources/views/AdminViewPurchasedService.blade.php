@extends('layouts.base')
@section('content')
    <div class="grid mt-6 grid-cols-1">
        @include('layouts.alert')
            <h1 class="font-bold text-2xl mt-6 mb-1">Užsakytų paslaugų sąrašas:</h1>

            <div class="overflow-x-auto relative border border-black rounded-lg mt-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400 border-b border-black">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Užsakymo numeris
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Užsakymo data
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Užsakyta paslauga
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Vardas
                        </th>
                        <th scope="col" class="py-3 px-6">
                            El. paštas
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Tel. Nr.
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Būsena
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Veiksmai
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($services->count()>0 && $services[0]->status !="užbaigta")
                        @foreach($services as $service)
                            @if($service->status !="užbaigta")
                            <tr class="bg-gray-100 border-b border-gray-300 dark:border-gray-700 text-gray-600">
                                <td
                                    class="py-4 px-6">
                                    {{$service->order_number}}
                                </td>
                                <td
                                    class="py-4 px-6">
                                    {{$service->created_at}}
                                </td>
                                <td class="py-4 px-6">
                                    @if($service->purchasedService != null)
                                    {{$service->purchasedService->title}}
                                    @else
                                        Paslauga ištrinta
                                        @endif
                                </td>
                                <td class="py-4 px-6">
                                    {{$service->name}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$service->email}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$service->phone_number}}
                                </td>
                                @if($service->status =="užsakyta")
                                    <td class="py-4 px-6">
                                        <span class="text-red-600">Užsakyta</span>
                                    </td>
                                @elseif($service->status =="vykdoma")
                                    <td class="py-4 px-6">
                                        <span class="text-yellow-600">Vykdoma</span>
                                    </td>
                                @elseif($service->status =="užbaigta")
                                    <td class="py-4 px-6">
                                        <span class="text-green-600">Užbaigta</span>
                                    </td>
                                @endif
                                <td class="py-4 px-6">
                                    <a href="/editPurchasedService/{{$service->id}}">
                                        <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
                                    </a>
                                    <a onclick="return confirm('Ar tikrai norite pašalinti užsakymą?')" href="/deletePurchasedService/{{$service->id}}">
                                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    @else
                        <tr class="bg-gray-100 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Nėra užsakytų paslaugų.
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                            <th>
                            <th>
                            </th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        <h1 class="font-bold text-2xl mt-6 mb-1">Atliktų paslaugų sąrašas:</h1>

        <div class="overflow-x-auto relative border border-black rounded-lg mt-2">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400 border-b border-black">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Užsakymo numeris
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Užsakymo data
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Užsakyta paslauga
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Vardas
                    </th>
                    <th scope="col" class="py-3 px-6">
                        El. paštas
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tel. Nr.
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Būsena
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Veiksmai
                    </th>
                </tr>
                </thead>
                <tbody>
                @if($finishedServices->count()>0)
                    @foreach($finishedServices as $service)
                            <tr class="bg-gray-100 border-b border-gray-300 dark:border-gray-700 text-gray-600">
                                <td
                                    class="py-4 px-6">
                                    {{$service->order_number}}
                                </td>
                                <td
                                    class="py-4 px-6">
                                    {{$service->created_at}}
                                </td>
                                <td class="py-4 px-6">
                                    @if($service->purchasedService != null)
                                        {{$service->purchasedService->title}}
                                    @else
                                        Paslauga ištrinta
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    {{$service->name}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$service->email}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$service->phone_number}}
                                </td>
                                    <td class="py-4 px-6">
                                        <span class="text-green-600">Užbaigta</span>
                                    </td>
                                <td class="py-4 px-6">
                                    <a href="/editPurchasedService/{{$service->id}}">
                                        <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
                                    </a>
                                    <a onclick="return confirm('Ar tikrai norite pašalinti užsakymą?')" href="/deletePurchasedService/{{$service->id}}">
                                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                @else
                    <tr class="bg-gray-100 dark:border-gray-700">
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Nėra atliktų paslaugų.
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
