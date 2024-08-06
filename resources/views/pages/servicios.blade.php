@extends('pages-layout')

@section('content')
    <section class="p-8 mt-10 bg-gray-100 flex flex-col items-center">
        <h2 class="text-4xl font-bold mb-8 text-center text-indigo-600">Nuestros Servicios</h2>

        @foreach ($data as $title => $service)
            <div class="bg-white p-16 rounded-lg shadow-md mb-8 w-3/4">
                <h3 class="text-3xl font-semibold mb-4 text-gray-800 pb-8">{{ $title }}</h3>
                <p class="text-base text-gray-700 leading-relaxed pb-8">
                    {!! nl2br(e($service['description'])) !!}
                </p>

                <div class="max-w-2xl mx-auto mt-10">
                    <div id="default-carousel" class="relative" data-carousel="static">
                        <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                            @foreach ($service['carousel_images'] as $index => $image)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ $image }}"
                                        class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                        alt="Imagen del servicio">
                                </div>
                            @endforeach
                        </div>
                        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                            @foreach ($service['carousel_images'] as $index => $image)
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide {{ $index + 1 }}"
                                    data-carousel-slide-to="{{ $index }}"></button>
                            @endforeach
                        </div>
                        <button type="button"
                            class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-left text-white sm:w-6 sm:h-6 dark:text-gray-800"
                                    style="font-size: 1.5rem;"></i>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-right text-white sm:w-6 sm:h-6 dark:text-gray-800"
                                    style="font-size: 1.5rem;"></i>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
