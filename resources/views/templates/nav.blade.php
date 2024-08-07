<nav class="flex items-center justify-between w-full bg-gray-400 group py-1 px-8 fixed top-0 left-0 z-50 shadow-sm shadow-black">
    <div>
        <img class="h-8" src="" alt="LOGO">
    </div>
    <div class="items-center justify-between hidden gap-12 text-black md:flex">
        <a class="text-sm font-bold hover:text-white transition duration-200" href="/">Inicio</a>
        <a class="text-sm font-bold hover:text-white transition duration-200" href="/servicios">Servicios</a>
        <a class="text-sm font-bold hover:text-white transition duration-200" href="/nosotros">Nosotros</a>
        <a class="text-sm font-bold hover:text-white transition duration-200" href="/contacto">Contacto</a>
    </div>
    <div class="items-center hidden gap-8 md:flex">
        <a class="text-sm font-bold hover:text-white transition duration-200" href="/login">
            <i class="fa-solid fa-user text-xl text-black cursor-pointer"></i>
        </a>
    </div>
    <button onclick="(() => { this.closest('.group').classList.toggle('open')})()" class="flex md:hidden">
        <i class="fa-solid fa-bars text-2xl text-black cursor-pointer"></i>
    </button>
    <div class="absolute flex md:hidden transition-all duration-300 ease-in-out flex-col items-end shadow-main justify-center gap-3 overflow-hidden bg-gray-400 max-h-0 px-8 group-[.open]:py-4 group-[.open]:max-h-64 group-[.open]:max-w-60 top-full right-0">
        <a class="text-sm font-bold hover:text-white transition duration-200 text-right" href="/">Inicio</a>
        <a class="text-sm font-bold hover:text-white transition duration-200 text-right" href="/servicios">Servicios</a>
        <a class="text-sm font-bold hover:text-white transition duration-200 text-right" href="/nosotros">Nosotros</a>
        <a class="text-sm font-bold hover:text-white transition duration-200 text-right" href="/contacto">Contacto</a>
        <a class="text-sm font-bold hover:text-white transition duration-200 text-right" href="/login">Iniciar Sesion</a>
    </div>
</nav>