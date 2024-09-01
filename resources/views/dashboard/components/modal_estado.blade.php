<!-- Modal para Actualizar Estado de Email -->
<div id="emailEstadoModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <form id="emailEstadoForm" action="" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="email_id" id="email_id" value="">

                <div class="mb-4">
                    <label for="estado_email" class="block text-gray-200">Actualizar Estado</label>
                    <select name="estado" id="estado_email"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En Proceso">En Proceso</option>
                        <option value="Completado">Completado</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="button" id="cancelEmailModalButton"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-700">Cancelar</button>
                    <button type="submit"
                        class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-sky-900">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Actualizar Estado de Mensaje Web -->
<div id="webEstadoModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <form id="webEstadoForm" action="" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="web_id" id="web_id" value="">

                <div class="mb-4">
                    <label for="estado_web" class="block text-gray-200">Actualizar Estado</label>
                    <select name="estado" id="estado_web"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En Proceso">En Proceso</option>
                        <option value="Completado">Completado</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="button" id="cancelWebModalButton"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-700">Cancelar</button>
                    <button type="submit"
                        class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-sky-900">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Actualizar Estado de WhatsApp -->
<div id="whatsappEstadoModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <form id="whatsappEstadoForm" action="" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="whatsapp_id" id="whatsapp_id" value="">

                <div class="mb-4">
                    <label for="estado_whatsapp" class="block text-gray-200">Actualizar Estado</label>
                    <select name="estado" id="estado_whatsapp"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En Proceso">En Proceso</option>
                        <option value="Completado">Completado</option>
                    </select>
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
