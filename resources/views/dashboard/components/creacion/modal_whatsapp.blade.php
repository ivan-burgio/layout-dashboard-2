<div id="whatsappModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <form id="whatsappForm" action="{{ route('whatsapps.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="">
                <div class="mb-4">
                    <label for="nombre_whatsapp" class="block text-gray-200">Nombre</label>
                    <input type="text" name="nombre" id="nombre_whatsapp"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="telefono" class="block text-gray-200">Teléfono</label>
                    <input type="text" name="telefono" id="telefono"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="mensaje_whatsapp" class="block text-gray-200">Mensaje</label>
                    <textarea name="mensaje" id="mensaje_whatsapp"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50"
                        placeholder="Mensaje"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelWhatsappModalButton"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-700">Cancelar</button>
                    <button type="submit"
                        class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-sky-900">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
