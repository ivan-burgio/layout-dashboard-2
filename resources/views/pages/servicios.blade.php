@extends('pages-layout')

@section('content')
    <section class="p-8 mt-10 flex flex-col items-center min-h-screen">
        <h2 class="text-4xl font-bold mb-8 text-center text-gray-900">Nuestros Servicios</h2>

        @foreach ($data as $title => $service)
            <div class="bg-slate-400 p-16 rounded-lg shadow-md mb-8 w-3/4" data-aos="fade-up" data-aos-duration="500">
                <h3 class="text-3xl font-semibold mb-4 pb-8">{{ $title }}</h3>
                <p class="text-base leading-relaxed pb-8">
                    {!! nl2br(e($service['description'])) !!}
                </p>

                <div id="carouselExampleIndicators{{ $loop->index }}" class="carousel slide max-w-2xl mx-auto mt-10"
                    data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($service['carousel_images'] as $index => $image)
                            <button type="button" data-bs-target="#carouselExampleIndicators{{ $loop->parent->index }}"
                                data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"
                                aria-current="{{ $loop->first ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner rounded-lg shadow-md">
                        @foreach ($service['carousel_images'] as $index => $image)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} h-96">
                                <img src="{{ $image }}" class="d-block w-100" alt="Imagen del servicio">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleIndicators{{ $loop->index }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleIndicators{{ $loop->index }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        @endforeach
    </section>
@endsection
