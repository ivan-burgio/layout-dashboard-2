<div id="emailModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 py-6">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-full max-w-md">
            <form id="emailForm" action="{{ route('emails.store') }}" method="POST">
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
                    <label for="mensaje" class="block text-gray-200">Mensaje</label>
                    <textarea name="mensaje" id="mensaje"
                        class="block w-full px-3 py-2 mt-1 text-gray-300 bg-gray-800 border border-gray-700 rounded-md placeholder-gray-500 focus:border-blue-400 focus:ring-blue-400 focus:ring-opacity-50"
                        placeholder="Mensaje"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelEmailModalButton"
                        class="bg-gray-600 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-700">Cancelar</button>
                    <button type="submit" disabled
                        class="bg-sky-800 text-white px-4 py-2 rounded-md hover:bg-sky-900">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
