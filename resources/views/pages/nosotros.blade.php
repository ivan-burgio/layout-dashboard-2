@extends('pages-layout')

@section('content')
    <section class="p-8 mt-10 flex flex-col items-center min-h-screen">
        <h2 class="text-4xl font-bold mb-8 text-center text-gray-900">Nosotros</h2>

        @foreach ($data as $title => $service)
            <div class="bg-slate-400 p-16 rounded-lg shadow-md mb-8 w-3/4" data-aos="fade-up" data-aos-duration="500">
                <h3 class="text-3xl font-semibold mb-4 text-gray-900 pb-8">{{ $title }}</h3>
                <p class="text-base text-gray-800 leading-relaxed pb-8">
                    {!! nl2br(e($service['description'])) !!}
                </p>
            </div>
        @endforeach
    </section>
@endsection
