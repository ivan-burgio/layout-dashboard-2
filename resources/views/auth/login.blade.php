@extends('pages-layout')

@section('content')
    <section class="bg-gray-900 px-4 md:px-20 lg:px-40 mt-10 p-8 min-h-screen">
        <h2 class="text-4xl font-bold mb-8 text-center text-white">Inicio de Sesión</h2>

        <div class="container mx-auto">
            <div class="flex items-center justify-center">
                <div class="mt-6 lg:w-1/2">
                    <div
                        class="w-full px-6 py-6 mx-auto overflow-hidden rounded-lg shadow-lg bg-gray-900 lg:max-w-xl shadow-black">
                        <h1 class="text-lg font-medium text-gray-200">Administradores</h1>

                        <form class="mt-6" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4">
                                <label class="block mb-2 text-sm text-gray-200">Email</label>
                                <input type="email" name="email" placeholder="Tu email" value="{{ old('email') }}"
                                    autocomplete="email" autofocus
                                    class="block w-full px-3 py-1 mt-1 border rounded-md placeholder-gray-600 bg-gray-900 text-gray-300 border-gray-700 focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 @error('email') border-red-500 @enderror" />
                                @error('email')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block mb-2 text-sm text-gray-200">Password</label>
                                <input type="password" name="password" placeholder="Tu contraseña"
                                    class="block w-full px-3 py-1 mt-1 border rounded-md placeholder-gray-600 bg-gray-900 text-gray-300 border-gray-700 focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 @error('password') border-red-500 @enderror" />
                                @error('password')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full px-6 py-2 mt-6 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-sky-800 hover:bg-sky-950 rounded-md focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Iniciar Sesión
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
