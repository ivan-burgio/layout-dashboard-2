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
        <section class="grid gap-10 grid-cols-1 md:grid-cols-3 m-8 md:m-16">
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

        <div class="relative h-80 bg-cover bg-center bg-black bg-opacity-50"
            style="background-image: url('{{ $data['why_buyar']['background_image'] }}');">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-left text-white p-5 md:p-20 lg:p-40 w-full">
                    <h3 class="text-3xl font-bold mb-8">{{ $data['why_buyar']['title'] }}</h3>
                    <p class="text-xl mt-2">{{ $data['why_buyar']['description'] }}</p>
                </div>
            </div>
        </div>
    </main>

    <section class="bg-white dark:bg-gray-900 md:px-20 lg:px-40">
        <div class="container px-6 py-8 mx-auto">
            <div class="flex items-center justify-center lg:-mx-6">
                <div class="mt-6 lg:w-1/2 lg:mx-6">
                    <div
                        class="w-full px-6 py-6 mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-900 lg:max-w-xl shadow-black">
                        <h1 class="text-lg font-medium text-white">Completa los campos con tu consulta</h1>

                        <form class="mt-6">
                            <div class="flex-1">
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Nombre completo</label>
                                <input type="text" placeholder="Tu nombre"
                                    class="block w-full px-5 py-1 mt-1 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="flex-1 mt-6">
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email</label>
                                <input type="email" placeholder="Tu email"
                                    class="block w-full px-5 py-1 mt-1 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="w-full mt-6">
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Mensaje</label>
                                <textarea
                                    class="block w-full h-32 px-5 py-1 mt-1 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md md:h-36 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                    placeholder="Mensaje"></textarea>
                            </div>

                            <button
                                class="w-full px-6 py-2 mt-6 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-sky-800 hover:bg-sky-950 rounded-md focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Enviar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
