<div id="emailModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Crear Nuevo Email</h2>
            <form id="emailForm" action="{{ route('emails.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700">Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                        class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="mensaje" class="block text-gray-700">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" class="w-full border-gray-300 rounded-lg shadow-sm"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 mr-2"
                        onclick="closeModal()">Cancelar</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
