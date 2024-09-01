<div id="clienteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <form id="clienteForm" action="/dashboard/cuentas/clientes" method="POST">
                @csrf
                <input type="hidden" name="_method" value="">
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-200">Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-200">Email</label>
                    <input type="email" name="email" id="email"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="telefono" class="block text-gray-200">Teléfono</label>
                    <input type="text" name="telefono" id="telefono"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="numero_cuenta_bancaria" class="block text-gray-200">Número de Cuenta Bancaria</label>
                    <input type="text" name="numero_cuenta_bancaria" id="numero_cuenta_bancaria"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50">
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelClienteModalButton"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-700">Cancelar</button>
                    <button type="submit"
                        class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-sky-900">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
