@extends('pages-layout')

@section('content')
    <section class="bg-white dark:bg-gray-900 md:px-20 lg:px-40 mt-10 p-8 min-h-screen">
        <h2 class="text-4xl font-bold mb-8 text-center dark:text-white">Inicio de Sesión</h2>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="container px-6 py-8 mx-auto">
            <div class="flex items-center justify-center lg:-mx-6">
                <div class="mt-6 lg:w-1/2 lg:mx-6">
                    <div
                        class="w-full px-6 py-6 mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-900 lg:max-w-xl shadow-black">
                        <h1 class="text-lg font-medium text-gray-700 dark:text-gray-200">Administradores</h1>

                        <form class="mt-6" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="flex-1">
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email</label>
                                <input type="email" name="email" placeholder="Tu email"
                                    class="block w-full px-5 py-1 mt-1 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="flex-1 mt-6">
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Password</label>
                                <input type="password" name="password" placeholder="Tu contraseña"
                                    class="block w-full px-5 py-1 mt-1 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
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
