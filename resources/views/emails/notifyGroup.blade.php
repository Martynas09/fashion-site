@component('mail::message')
    # Informacija dėl grupinės veiklos "{{$activity}}"!
    {{$description}}
    Planuojamas laikas:{{$time}}
    Adresas:{{$address}}
    Pagarbiai,
    Tavo kodo administracija.
@endcomponent
