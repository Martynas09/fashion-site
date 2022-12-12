@extends('layouts.base')
@section('content')
    <div class="grid mt-6 grid-cols-1">
        @include('layouts.alert')
        @foreach($groupActivities as $groupActivity)
            <h1 class="font-bold text-2xl mt-6">Grupinė veikla "{{$groupActivity->title}}"</h1>
            <h2>Talpa:{{$groupActivity->size}}</h2>
            <h2>Liko vietų:{{$groupActivity->free_spaces}}</h2>
        @if($groupActivity->activityToGroup->notified == 1)
                <div class="flex">
                <p>Grupė jau&nbsp;</p>
                    <p class="text-green-700 font-bold">informuota&nbsp;</p>
                <p>apie startą</p>
                </div>
                <h4>Starto data ir laikas: {{$groupActivity->start_time}}</h4>
            @else
            <div class="flex">
                <p>Grupė&nbsp;</p>
                <p class="text-red-700 font-bold">neinformuota&nbsp;</p>
                <p>apie startą</p>
            </div>
            @endif
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Vardas
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Pavardė
                        </th>
                        <th scope="col" class="py-3 px-6">
                            El. paštas
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Tel. Nr.
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Lytis
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Amžius
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($groupActivity->activityToGroup->groupToMember->count()>0)
                    @foreach($groupActivity->activityToGroup->groupToMember as $groupmember)
                        <tr class="bg-gray-200 border-b dark:border-gray-700 text-gray-600">
                            <td
                                class="py-4 px-6">
                                {{$groupmember->name}}
                            </td>
                            <td class="py-4 px-6">
                                {{$groupmember->surname}}
                            </td>
                            <td class="py-4 px-6">
                                {{$groupmember->email}}
                            </td>
                            <td class="py-4 px-6">
                                {{$groupmember->phone_number}}
                            </td>
                            <td class="py-4 px-6">
                                {{$groupmember->gender}}
                            </td>
                            <td class="py-4 px-6">
                                {{$groupmember->age}}
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr class="bg-gray-200 border-b dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Nėra užsiregistravusių narių
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
        @if($groupActivity->activityToGroup->groupToMember->count()>0 && $groupActivity->activityToGroup->notified == 0)
            <a href="/notifyGroup/{{$groupActivity->id}}">
                <button class="mt-2 lg:mr-12 bg-gray-300 px-2 py-1 text-lg border-neutral-400 border text-gray-800 hover:border-neutral-400 hover:text-white hover:shadow-[inset_13rem_0_0_0] hover:shadow-gray-400 duration-[400ms,700ms] transition-[color,box-shadow]">
                    Pranešti apie veiklos startą
                </button>
            </a>
            @endif
        @endforeach

    </div>
@endsection
