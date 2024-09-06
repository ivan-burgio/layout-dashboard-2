<div id="editEventModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
    <div class="bg-gray-900 p-6 rounded-lg shadow-lg w-11/12 md:w-1/3 relative">
        <h3 class="text-lg font-semibold text-gray-200 mb-4">Editar Evento</h3>
        <form id="editEventForm">
            <input type="hidden" id="eventId">

            <!-- Título del evento -->
            <div class="mb-4">
                <label for="eventTitle" class="block text-sm font-medium text-gray-200">Título</label>
                <input type="text" id="eventTitle" name="title"
                    class="mt-1 block w-full px-3 py-2 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50 sm:text-sm"
                    required>
            </div>

            <!-- Fecha de inicio del evento -->
            <div class="mb-4">
                <label for="eventStart" class="block text-sm font-medium text-gray-200">Fecha de Inicio</label>
                <input type="date" id="eventStart" name="start"
                    class="mt-1 block w-full px-3 py-2 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50 sm:text-sm"
                    required>
            </div>

            <!-- Fecha de fin del evento -->
            <div class="mb-4">
                <label for="eventEnd" class="block text-sm font-medium text-gray-200">Fecha de Fin</label>
                <input type="date" id="eventEnd" name="end"
                    class="mt-1 block w-full px-3 py-2 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50 sm:text-sm">
            </div>

            <!-- Color del evento -->
            <div class="mb-4">
                <label for="eventColor" class="block text-sm font-medium text-gray-200">Color</label>
                <input type="color" id="eventColor" name="color"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Botones -->
            <div class="flex justify-end">
                <button type="button" id="closeModalBtn"
                    class="bg-gray-600 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-700">Cancelar</button>
                <button type="submit"
                    class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-sky-900">Guardar</button>
                <button type="button" id="deleteEventBtn"
                    class="bg-red-600 text-white px-4 py-2 rounded-md ml-2 hover:bg-red-700">Eliminar</button>
            </div>
        </form>
    </div>
</div>
