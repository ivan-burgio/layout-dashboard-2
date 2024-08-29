@extends('dashboard.dashboard-layout')

@section('content')
    @include('dashboard.components.modal_email')

    <div class="relative overflow-x-auto m-8">
        <button id="openModalButton" class="bg-sky-800 hover:bg-sky-950 text-white px-4 py-2 mb-4 rounded-md">Nuevo
            Email</button>

        <table class="w-full text-sm text-left rtl:text-right shadow-md">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Mensaje</th>
                    <th scope="col" class="px-6 py-3">Fecha</th>
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
