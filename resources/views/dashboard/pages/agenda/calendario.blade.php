@extends('dashboard.dashboard-layout')

@section('content')
    @include('dashboard.components.modal_calendario')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="flex justify-center p-8">
        <div id='calendar' class="w-full max-w-4xl"></div>
    </div>
@endsection
