<div id="cambiarEstadoTicket" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <!-- Modal Header -->
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-200">Actualizar Ticket</h3>
            </div>

            <!-- Modal Body -->
            <form id="cambiarEstadoTicketForm" method="POST" action="" class="mt-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="ticket_id" id="ticket_id" value="">

                <!-- Estado -->
                <div class="mb-4">
                    <label for="estado" class="block text-gray-200">Estado</label>
                    <select name="estado" id="estado"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                        <option value="Pendiente">Pendiente</option>
                        <option value="Abierto">Abierto</option>
                        <option value="Cerrado">Cerrado</option>
                        <option value="En Proceso">En Proceso</option>
                    </select>
                </div>

                <!-- Asignado a -->
                <div class="mb-4">
                    <label for="asignado_a" class="block text-gray-200">Asignado a</label>
                    <select name="asignado_a" id="asignado_a"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                        <option value="">Seleccionar usuario</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones -->
                <div class="flex justify-end">
                    <button type="button" id="cancelTicketModalButton"
                        class="px-4 py-2 mr-2 text-sm font-semibold text-gray-300 bg-gray-700 rounded hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">Cancelar</button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-semibold text-gray-300 bg-blue-600 rounded hover:bg-blue-500 focus:bg-blue-500 focus:outline-none">Guardar
                        Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
