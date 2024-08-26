<!-- Global notification live region, render this permanently at the end of the document -->
<div aria-live="assertive" class="pointer-events-none fixed inset-0 flex px-4 py-6 sm:p-6" style="z-index: 100;">
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
        <!-- Notification panel, dynamically insert this into the live region when it needs to be displayed -->
        @if (session('success'))
            <div
                class="alert pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-green-100 shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="p-2">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-thumbs-up text-2xl" style="color: #000000"></i>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="font-medium text-gray-900">Éxito</p>
                            <p class="mt-1 text-sm">{{ session('success') }}</p>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button type="button" class="btn-close inline-flex text-gray-600 hover:text-gray-700">
                                <span class="sr-only">Close</span>
                                <i class="fa-solid fa-xmark h-5 w-5" style="color: #000000"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div
                class="alert pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-red-100 shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="p-2">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-bomb text-2xl" style="color: #000000"></i>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="font-medium text-gray-900">Error</p>
                            <p class="mt-1 text-sm">{{ session('error') }}</p>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button type="button" class="btn-close inline-flex text-gray-600 hover:text-gray-700">
                                <span class="sr-only">Close</span>
                                <i class="fa-solid fa-xmark h-5 w-5" style="color: #000000"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div
                class="alert pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-yellow-100 shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="p-2">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-circle-exclamation text-2xl" style="color: #000000"></i>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="font-medium text-gray-900">Advertencia</p>
                            <p class="mt-1 text-sm">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span><br>
                                @endforeach
                            </p>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button type="button" class="btn-close inline-flex text-gray-600 hover:text-gray-700">
                                <span class="sr-only">Close</span>
                                <i class="fa-solid fa-xmark h-5 w-5" style="color: #000000"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
