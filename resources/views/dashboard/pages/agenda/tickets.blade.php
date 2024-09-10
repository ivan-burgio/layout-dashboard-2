@extends('dashboard.dashboard-layout')

@section('content')
    @include('dashboard.components.creacion.modal_ticket')
    @include('dashboard.components.estado.modal_ticket')

    <div class="relative overflow-x-auto m-8">
        <div class="flex flex-row w-full justify-between">
            <!-- Botón para crear un nuevo ticket -->
            <button id="openModalButtonTicket" class="bg-sky-800 hover:bg-sky-950 text-white px-4 py-2 mb-4 rounded-md">
                Nuevo Ticket
            </button>

            <!-- Formulario de búsqueda y filtrado -->
            <form method="GET" action="{{ route('tickets') }}" class="mb-4">
                <input type="text" name="search" placeholder="Buscar por título o descripción"
                    class="px-3 py-2 m-1 border rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50"
                    value="{{ request('search') }}">
                <button type="submit" class="bg-sky-800 hover:bg-sky-950 text-white px-2 py-1 rounded-md">
                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                </button>
            </form>
        </div>

        <!-- Tabla de tickets -->
        <table class="w-full text-sm text-left rtl:text-right shadow-md">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('tickets', array_merge(request()->query(), ['order_by' => 'id', 'order_direction' => request('order_direction') == 'asc' ? 'desc' : 'asc'])) }}"
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
                            href="{{ route('tickets', array_merge(request()->query(), ['order_by' => 'titulo', 'order_direction' => request('order_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                            Título
                            @if (request('order_by') == 'titulo')
                                <i class="fa-solid fa-arrow-{{ request('order_direction') == 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>

                    <th scope="col" class="px-6 py-3">Descripción</th>
                    <th scope="col" class="px-6 py-3">
                        <a
                            href="{{ route('tickets', array_merge(request()->query(), ['order_by' => 'estado', 'order_direction' => request('order_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                            Estado
                            @if (request('order_by') == 'estado')
                                <i class="fa-solid fa-arrow-{{ request('order_direction') == 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a
                            href="{{ route('tickets', array_merge(request()->query(), ['order_by' => 'prioridad', 'order_direction' => request('order_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                            Prioridad
                            @if (request('order_by') == 'prioridad')
                                <i class="fa-solid fa-arrow-{{ request('order_direction') == 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">Asignado</th>
                    <th scope="col" class="px-6 py-3">Creado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @foreach ($tickets as $ticket)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-200 even:bg-gray-50 even:dark:bg-gray-300 border-b dark:border-gray-700">
                        <td class="px-6 py-4">{{ $ticket->id }}</td>
                        <td class="px-6 py-4">{{ $ticket->titulo }}</td>
                        <td class="px-6 py-4">{{ $ticket->descripcion }}</td>
                        <td class="px-6 py-4">{{ $ticket->estado }}</td>
                        <td class="px-6 py-4">{{ $ticket->prioridad }}</td>
                        <td class="px-6 py-4">{{ $ticket->assignee->name ?? 'Desconocido' }}</td>
                        <td class="px-6 py-4">{{ $ticket->creator->name ?? 'Desconocido' }}</td>
                        <td class="px-6 py-4">
                            <button class="bg-sky-800 hover:bg-sky-950 text-white px-2 py-1 rounded-md edit-buttonTicket"
                                data-id="{{ $ticket->id }}" data-titulo="{{ $ticket->titulo }}"
                                data-descripcion="{{ $ticket->descripcion }}" data-estado="{{ $ticket->estado }}"
                                data-prioridad="{{ $ticket->prioridad }}" data-asignado_a="{{ $ticket->assignee }}">
                                <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                            </button>
                            <button class="bg-sky-800 hover:bg-sky-950 text-white px-2 py-1 rounded-md estado-button"
                                data-id="{{ $ticket->id }}" data-estado="ticket">
                                <i class="fa-solid fa-sync" style="color: #ffffff;"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
