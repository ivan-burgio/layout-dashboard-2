@extends('pages-layout')

@section('content')
    <header class="bg-slate-600 h-screen relative">
        <img src="tu-imagen.jpg" alt="Imagen de fondo" class="w-full h-auto">
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="text-left text-white p-20 md:p-40 w-full">
                <h1 class="text-6xl font-bold mb-8">Buyar</h1>
                <div class="mt-20">
                    <p class="text-xl mt-2">Transformamos tu visión en una poderosa presencia online.</p>
                    <p class="text-xl mt-4">Webs de presentación únicas y sistemas de gestión a medida.</p>
                </div>
            </div>
        </div>
    </header>

    <main class="w-full h-full">
        @include('templates.servicios')

        <div class="bg-slate-600 h-80 relative">
            <img src="tu-imagen.jpg" alt="Imagen de fondo" class="w-full">
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="text-left text-white p-5 md:p-20 lg:p-40 w-full">
                    <h1 class="text-3xl font-bold mb-8">¿Porque Buyar?</h1>
                    <p class="text-xl mt-2">
                        En un mundo digital en constante evolución, Buyar se destaca por ofrecer soluciones web innovadoras
                        y personalizadas que impulsan el crecimiento de tu negocio.
                    </p>
                </div>
            </div>
        </div>
    </main>

    @include('templates.contacto')
@endsection
