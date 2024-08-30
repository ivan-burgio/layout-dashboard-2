@extends('dashboard.dashboard-layout')

@section('content')
    @include('dashboard.components.modal_email')

    <div class="relative overflow-x-auto m-8">
        <div class="flex flex-row w-full justify-between">
            <button id="openModalButton" class="bg-sky-800 hover:bg-sky-950 text-white px-4 py-2 mb-4 rounded-md">Nuevo
                Email</button>

            <!-- Formulario de búsqueda y filtrado -->
            <form method="GET" action="{{ route('emails') }}" class="mb-4">
                <input type="text" name="search" placeholder="Buscar por nombre o email" class="px-3 py-2 m-1 border rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50"
                    value="{{ request('search') }}">
                <button type="submit" class="bg-sky-800 hover:bg-sky-950 text-white px-2 py-1 rounded-md">
                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
            </form>
        </div>

        <table class="w-full text-sm text-left rtl:text-right shadow-md">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <!-- Links de ordenamiento en las cabeceras -->
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('emails', array_merge(request()->query(), ['order_by' => 'id', 'order_direction' => request('order_direction') == 'asc' ? 'desc' : 'asc'])) }}"
                            class="flex items-center space-x-1">
                            Id
                            @if (request('order_by') == 'id' || !request('order_by'))
                                <i
                                    class="fa-solid fa-arrow-{{ request('order_direction') == 'asc' ? 'up' : 'down' }} mx-1"></i>
                            @endif
                        </a>
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <a
                            href="{{ route('emails', array_merge(request()->query(), ['order_by' => 'nombre', 'order_direction' => request('order_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                            Nombre
                            @if (request('order_by') == 'nombre')
                                <i class="fa-solid fa-arrow-{{ request('order_direction') == 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a
                            href="{{ route('emails', array_merge(request()->query(), ['order_by' => 'email', 'order_direction' => request('order_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                            Email
                            @if (request('order_by') == 'email')
                                <i class="fa-solid fa-arrow-{{ request('order_direction') == 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">Mensaje</th>
                    <th scope="col" class="px-6 py-3">
                        <a
                            href="{{ route('emails', array_merge(request()->query(), ['order_by' => 'created_at', 'order_direction' => request('order_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                            Fecha
                            @if (request('order_by') == 'created_at')
                                <i class="fa-solid fa-arrow-{{ request('order_direction') == 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @foreach ($emails as $email)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-200 even:bg-gray-50 even:dark:bg-gray-300 border-b dark:border-gray-700">
                        <td class="px-6 py-4">{{ $email->id }}</td>
                        <td class="px-6 py-4">{{ $email->nombre }}</td>
                        <td class="px-6 py-4">{{ $email->email }}</td>
                        <td class="px-6 py-4">{{ $email->mensaje }}</td>
                        <td class="px-6 py-4">{{ $email->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">
                            <button class="bg-sky-800 hover:bg-sky-950 text-white px-2 py-1 rounded-md edit-button"
                                data-id="{{ $email->id }}" data-nombre="{{ $email->nombre }}"
                                data-email="{{ $email->email }}" data-mensaje="{{ $email->mensaje }}">
                                <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
