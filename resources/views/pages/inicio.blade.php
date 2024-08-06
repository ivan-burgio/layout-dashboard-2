@extends('pages-layout')

@section('content')
    <header class="bg-slate-600 h-screen relative mt-10">
        <img src="{{ $data['header']['background_image'] }}" alt="Imagen de fondo" class="w-full h-full object-cover">
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="text-left text-white p-20 md:p-40 w-full">
                <h1 class="text-6xl font-bold mb-8">{{ $data['header']['title'] }}</h1>
                <div class="mt-20">
                    <p class="text-xl mt-2">{{ $data['header']['description']['line1'] }}</p>
                    <p class="text-xl mt-4">{{ $data['header']['description']['line2'] }}</p>
                </div>
            </div>
        </div>
    </header>

    <main class="w-full h-full">
        <section class="grid gap-10 grid-cols-1 md:grid-cols-3 m-16">
            @foreach ($data['services'] as $service)
                <div
                    class="bg-slate-400 w-full rounded-lg shadow-lg flex flex-col transition-all overflow-hidden hover:shadow-black">
                    <div class="p-6">
                        <h3 class="mb-4 font-semibold text-2xl">{{ $service['title'] }}</h3>
                        <p class="text-sm mb-0">{{ $service['description'] }}</p>
                    </div>
                    <div class="mt-auto">
                        <img src="{{ $service['image'] }}" alt="" class="w-full h-48 object-cover">
                    </div>
                </div>
            @endforeach
        </section>

        <div class="relative h-80 bg-slate-600">
            <div
                class="absolute inset-0 bg-[url('{{ $data['why_buyar']['background_image'] }}')] bg-cover bg-fixed bg-center">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="text-left text-white p-5 md:p-20 lg:p-40 w-full">
                        <h1 class="text-3xl font-bold mb-8">{{ $data['why_buyar']['title'] }}</h1>
                        <p class="text-xl mt-2">{{ $data['why_buyar']['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('templates.contacto')
@endsection
