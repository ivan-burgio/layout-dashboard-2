<div id="layoutModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <form id="layoutForm" action="{{ route($tipo . '.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="">

                <!-- Campo de nombre -->
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-200">Título</label>
                    <input type="text" name="nombre" id="nombre"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                </div>

                <!-- Campo de descripción -->
                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-200">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50"></textarea>
                </div>

                <!-- Campo de link -->
                <div class="mb-4">
                    <label for="link" class="block text-gray-200">URL</label>
                    <input type="text" name="link" id="link"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                </div>

                <!-- Campo de imagen -->
                <div class="mb-4">
                    <label for="imagen" class="block text-gray-200">Imagen</label>
                    <input type="file" name="imagen" id="imagen"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                    <img id="imagenPreview" src="" alt="Vista previa de la imagen"
                        style="display: none; max-width: 100%;">
                </div>

                <!-- Botones -->
                <div class="flex justify-end">
                    <button type="button" id="cancelLayoutModalButton"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-700">Cancelar</button>
                    <button type="submit"
                        class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-sky-900">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
