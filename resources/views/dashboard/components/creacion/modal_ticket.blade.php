<!-- Modal para crear un nuevo ticket -->
<div id="ticketModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <form id="ticketForm" action="{{ route('tickets.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="">
                <div class="mb-4">
                    <label for="titulo" class="block text-gray-200">Título</label>
                    <input type="text" name="titulo" id="titulo"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-200">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50"></textarea>
                </div>

                <div class="mb-4">
                    <label for="prioridad" class="block text-gray-200">Prioridad</label>
                    <select name="prioridad" id="prioridad"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                        <option value="Baja">Baja</option>
                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="button" id="cancelTicketModalButton"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-700">Cancelar</button>
                    <button type="submit"
                        class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-sky-900">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
