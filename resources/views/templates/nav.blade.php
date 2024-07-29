{{-- resources/views/templates/nav.blade.php --}}

<nav class="flex flex-col items-center justify-center w-full bg-black text-2xl shadow-lg z-50" id="nav-small">
    <i class="fa-solid fa-bars w-32 h-32 p-4 text-white cursor-pointer" id="nav-desple" loading="lazy"></i>

    <div id="navContenido" class="hidden">
        @foreach (['/' => 'Inicio', '/servicios' => 'Servicios', '/nosotros' => 'Nosotros', '/contacto' => 'Contacto'] as $route => $name)
            <a href="{{ $route }}"
                class="nav-link {{ request()->is(trim($route, '/')) ? 'activo' : '' }} text-white uppercase hover:text-secondary hover:border-b-2 border-secondary">
                {{ $name }}
            </a>
        @endforeach
    </div>
</nav>

<nav class="flex items-center justify-center w-full bg-black text-2xl shadow-lg z-50" id="nav-large"
    style="height: 6rem;">
    @foreach (['/' => 'Inicio', '/servicios' => 'Servicios', '/nosotros' => 'Nosotros', '/contacto' => 'Contacto'] as $route => $name)
        <a href="{{ $route }}"
            class="nav-link {{ request()->is(trim($route, '/')) ? 'activo' : '' }} text-white uppercase hover:text-secondary hover:border-b-2 border-secondary">
            {{ $name }}
        </a>
    @endforeach
</nav>
