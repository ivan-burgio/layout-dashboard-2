@extends('pages-layout')

@section('content')
    <section class="bg-gray-900 px-2 md:px-20 lg:px-40 mt-10 p-8 min-h-screen">
        <h2 class="text-4xl font-bold mb-8 text-center text-white">Contacto</h2>
        <div class="container">
            <div class="lg:flex lg:items-center lg:mx-6">
                <div class="lg:w-1/2 lg:mx-6" data-aos="fade-right" data-aos-duration="500">
                    <h1 class="text-2xl font-semibold text-gray-800 capitalize dark:text-white lg:text-3xl">
                        Contáctanos <br> para más información
                    </h1>

                    <div class="mt-6 space-y-8 md:mt-8">
                        @foreach ($data['phone_numbers'] as $phone)
                            <p class="flex items-start -mx-2">
                                <i class="fa-solid fa-phone w-6 h-6 mx-2 text-sky-800 text-2xl"></i>
                                <span class="mx-2 text-gray-700 truncate dark:text-gray-400">{{ $phone }}</span>
                            </p>
                        @endforeach

                        <p class="flex items-start -mx-2">
                            <i class="fa-solid fa-envelope w-6 h-6 mx-2 text-sky-800 text-2xl"></i>
                            <span class="mx-2 text-gray-700 truncate dark:text-gray-400">{{ $data['email'] }}</span>
                        </p>
                    </div>

                    <div class="mt-6 md:mt-8">
                        <h3 class="text-gray-600 dark:text-gray-300 ">Síguenos</h3>

                        <div class="flex mt-4 -mx-1.5">
                            @foreach ($data['social_links'] as $platform => $link)
                                <a class="mx-1.5 dark:hover:text-blue-400 text-gray-400 transition-colors duration-300 transform hover:text-blue-500 hover:cursor-pointer"
                                    href="{{ $link }}">
                                    <i class="fa-brands fa-{{ $platform }} text-2xl"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-6 lg:w-1/2 lg:mx-6" data-aos="fade-left" data-aos-duration="500">
                    <div
                        class="w-full px-6 py-6 mx-auto overflow-hidden rounded-lg shadow-lg bg-gray-900 lg:max-w-xl shadow-black">
                        <h1 class="text-lg font-medium text-white">Completa los campos con tu consulta</h1>

                        <form class="mt-6">
                            <div class="flex-1">
                                <label class="block mb-2 text-sm text-gray-200">Nombre completo</label>
                                <input type="text" placeholder="Tu nombre"
                                    class="block w-full px-3 py-1 mt-1 text-gray-700 border  rounded-md placeholder-gray-600 bg-gray-900 dark:text-gray-300 border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="flex-1 mt-6">
                                <label class="block mb-2 text-sm text-gray-200">Email</label>
                                <input type="email" placeholder="Tu email"
                                    class="block w-full px-3 py-1 mt-1 text-gray-700 border  rounded-md placeholder-gray-600 bg-gray-900 dark:text-gray-300 border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="w-full mt-6">
                                <label class="block mb-2 text-sm text-gray-200">Mensaje</label>
                                <textarea
                                    class="block w-full h-32 px-3 py-1 mt-1 placeholder-gray-400  border rounded-md md:h-36 dark:placeholder-gray-600 bg-gray-900 text-gray-300 border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
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
