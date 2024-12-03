<div aria-live="assertive" class="pointer-events-none fixed inset-0 flex flex-col px-4 py-6 sm:p-6" style="z-index: 100;">
    @foreach ($data['globos'] as $globo)
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
            <div
                class="alert pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-gray-200 shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="p-2">
                    <div class="flex items-start">

                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="mt-1 text-sm">{{ $globo['info'] }}</p>
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
        </div>
    @endforeach
</div>
