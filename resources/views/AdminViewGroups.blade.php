@extends('layouts.base')
@section('content')
    <div class="grid mt-6 grid-cols-1">
        @include('layouts.alert')
        @if($groupActivities->count()>0)
        @foreach($groupActivities as $groupActivity)
            <h1 class="font-bold text-2xl mt-6 mb-1">Grupinė veikla "{{$groupActivity->title}}"</h1>
        @if($groupActivity->start_time==null || $currenttime < $groupActivity->start_time)
            <h2>Talpa: {{$groupActivity->size}}</h2>
            <h2>Liko vietų: {{$groupActivity->free_spaces}}</h2>
        @if($groupActivity->activityToGroup->notified == 1)
                <div class="flex">
                <p>Grupė jau&nbsp;</p>
                    <p class="text-green-700 font-bold">informuota&nbsp;</p>
                <p>apie startą.</p>
                </div>
                <h4>Starto data ir laikas: {{$groupActivity->start_time}}</h4>
            @else
            <div class="flex">
                <p>Grupė&nbsp;</p>
                <p class="text-red-700 font-bold">neinformuota&nbsp;</p>
                <p>apie startą.</p>
            </div>
            @endif
            @else
                <div class="flex">
                    <p>Grupinė veikla jau&nbsp;</p>
                    <p class="text-green-700 font-bold">įvyko,&nbsp;</p>
                    <p>galite išvalyti grupę.</p>
                </div>
            @endif
            <div class="overflow-x-auto relative border border-black rounded-lg mt-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400 border-b border-black">
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
                        <th scope="col" class="py-3 px-6">
                            Veiksmai
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($groupActivity->activityToGroup->groupToMember->count()>0)
                    @foreach($groupActivity->activityToGroup->groupToMember as $groupmember)
                        <tr class="bg-gray-100 border-b border-gray-300 dark:border-gray-700 text-gray-600">
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
                                {{$groupmember->age}} m.
                            </td>
                            <td class="py-4 px-6">
                                <a href="/editMember/{{$groupmember->id}}">
                                <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-1 py-1 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                                </a>
                                <a onclick="return confirm('Ar tikrai norite pašalinti narį?')" href="/deleteMember/{{$groupmember->id}}">
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
                                Nėra užsiregistravusių narių.
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
        @if($groupActivity->activityToGroup->groupToMember->count()>0 && $groupActivity->activityToGroup->notified == 0)
            <a href="/notifyGroup/{{$groupActivity->id}}">
                <button class="mt-2 lg:mr-12 bg-gray-300 px-2 py-1 text-lg border-neutral-400 border text-gray-800 hover:border-neutral-400 hover:text-white hover:shadow-[inset_13rem_0_0_0] hover:shadow-gray-400 duration-[400ms,700ms] transition-[color,box-shadow]">
                    Pranešti apie veiklos startą
                </button>
            </a>
            @endif
        @if($currenttime > $groupActivity->start_time && $groupActivity->start_time != null)
            <a onclick="return confirm('Ar tikrai norite išvalyti grupę?')" href="/clearGroup/{{$groupActivity->activityToGroup->id}}">
                <button class="mt-2 lg:mr-12 bg-gray-300 px-2 py-1 text-lg border-neutral-400 border text-gray-800 hover:border-neutral-400 hover:text-white hover:shadow-[inset_13rem_0_0_0] hover:shadow-gray-400 duration-[400ms,700ms] transition-[color,box-shadow]">
                    Išvalyti grupę
                </button>
            </a>
            @endif
        @endforeach
        @else
            <div class="mt-4 flex flex-col items-center justify-center">
                <h1 class="text-2xl font-bold text-gray-700 dark:text-white">Nėra sukurtų veiklų.</h1>
            @endif

    </div>
@endsection
