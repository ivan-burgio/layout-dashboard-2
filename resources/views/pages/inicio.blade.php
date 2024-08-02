@extends('pages-layout')

@section('content')
    <header class="bg-slate-600 h-screen relative mt-12">
        <img src="https://picsum.photos/400/300" alt="Imagen de fondo" class="w-full h-full object-cover">
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
        <section class="grid gap-10 grid-cols-1 md:grid-cols-3 m-16">
            <div class="bg-slate-400 w-full rounded-lg shadow-lg flex flex-col transition-all overflow-hidden hover:shadow-black">
                <div class="p-6">
                    <h3 class="mb-4 font-semibold text-2xl">Sitios Web Personalizados</h3>
                    <p class="text-sm mb-0">
                        En Buyar, diseñamos sitios web personalizados que reflejan tu negocio y necesidades, asegurando una
                        presencia online impactante y ayudándote a destacar.
                    </p>
                </div>
                <div class="mt-auto">
                    <img src="https://picsum.photos/400/300" alt="" class="w-full h-48 object-cover">
                </div>
            </div>
            <div class="bg-slate-400 w-full rounded-lg shadow-lg flex flex-col transition-all overflow-hidden hover:shadow-black">
                <div class="p-6">
                    <h3 class="mb-4 font-semibold text-2xl">Sitios de Gestión Personalizados</h3>
                    <p class="text-sm mb-0">
                        Nuestros sitios de gestión personalizados facilitan la administración de tu negocio, desde clientes
                        hasta facturación. Con Buyar, tendrás una herramienta poderosa para el éxito.
                    </p>
                </div>
                <div class="mt-auto">
                    <img src="https://picsum.photos/400/300" alt="" class="w-full h-48 object-cover">
                </div>
            </div>
            <div class="bg-slate-400 w-full rounded-lg shadow-lg flex flex-col transition-all overflow-hidden hover:shadow-black">
                <div class="p-6">
                    <h3 class="mb-4 font-semibold text-2xl">Integración de Chatbox</h3>
                    <p class="text-sm mb-0">
                        Ofrecemos chatbox con bots inteligentes para resolver dudas al instante, mejorando la experiencia
                        del usuario y liberando tiempo para ti.
                    </p>
                </div>
                <div class="mt-auto">
                    <img src="https://picsum.photos/400/300" alt="" class="w-full h-48 object-cover">
                </div>
            </div>
        </section>

        <div class="bg-slate-600 h-80 relative">
            <img src="https://picsum.photos/400/300" alt="Imagen de fondo" class="w-full h-full object-cover">
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
