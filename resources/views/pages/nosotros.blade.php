@extends('pages-layout')

@section('content')

<section class="p-8 mt-10 bg-gray-100 flex flex-col items-center">
    <h2 class="text-4xl font-bold mb-8 text-center">Nosotros</h2>

    @foreach ($data as $title => $service)
        <div class="bg-white p-16 rounded-lg shadow-md mb-8 w-3/4">
            <h3 class="text-3xl font-semibold mb-4 text-gray-800 pb-8">{{ $title }}</h3>
            <p class="text-base text-gray-700 leading-relaxed pb-8">
                {!! nl2br(e($service['description'])) !!}
            </p>
        </div>
    @endforeach
</section>

@endsection