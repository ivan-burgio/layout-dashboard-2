<nav
    class="flex items-center justify-between w-full bg-gray-700 group py-1 px-8 fixed top-0 left-0 z-50 shadow-sm shadow-black">
    <div>
        <img class="h-8" src="" alt="LOGO">
    </div>
    <div class="items-center justify-between hidden gap-12 text-black md:flex">
        <a class="text-sm font-bold transition duration-200" href="/" style="color: black;"
            onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Inicio</a>
        <a class="text-sm font-bold transition duration-200" href="/servicios" style="color: black;"
            onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Servicios</a>
        <a class="text-sm font-bold transition duration-200" href="/nosotros" style="color: black;"
            onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Nosotros</a>
        <a class="text-sm font-bold transition duration-200" href="/contacto" style="color: black;"
            onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Contacto</a>
    </div>
    <div class="items-center hidden gap-8 md:flex">
        @if (session('user_logged_in'))
            <!-- Icono de dashboard y cierre de sesión -->
            <form action="{{ route('logout') }}" method="POST" class="inline-block">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0;">
                    <i class="fa-solid fa-right-from-bracket text-xl cursor-pointer"
                        style="color: black; transition: color 0.2s;" onmouseover="this.style.color='#e5e7eb'"
                        onmouseout="this.style.color='black'"></i>
                </button>
            </form>
            <a href="/dashboard" style="text-decoration: none;">
                <i class="fa-solid fa-screwdriver-wrench text-xl cursor-pointer"
                    style="color: black; transition: color 0.2s;" onmouseover="this.style.color='#e5e7eb'"
                    onmouseout="this.style.color='black'"></i>
            </a>
        @else
            <!-- Icono de usuario sin sesión activa -->
            <a class="text-sm font-bold transition duration-200" href="/login">
                <i class="fa-solid fa-user text-xl cursor-pointer" style="color: black; transition: color 0.2s;"
                    onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'"></i>
            </a>
        @endif
    </div>
    <button onclick="(() => { this.closest('.group').classList.toggle('open')})()" class="flex md:hidden">
        <i class="fa-solid fa-bars text-2xl text-black cursor-pointer"></i>
    </button>
    <div
        class="absolute flex md:hidden transition-all duration-300 ease-in-out flex-col items-end shadow-main justify-center gap-3 overflow-hidden bg-gray-700 max-h-0 px-8 group-[.open]:py-4 group-[.open]:max-h-64 group-[.open]:max-w-60 top-full right-0">
        <a class="text-sm font-bold transition duration-200 text-right" href="/" style="color: black;"
            onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Inicio</a>
        <a class="text-sm font-bold transition duration-200 text-right" href="/servicios" style="color: black;"
            onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Servicios</a>
        <a class="text-sm font-bold transition duration-200 text-right" href="/nosotros" style="color: black;"
            onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Nosotros</a>
        <a class="text-sm font-bold transition duration-200 text-right" href="/contacto" style="color: black;"
            onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Contacto</a>
        @if (session('user_logged_in'))
            <!-- Enlaces de dashboard y cierre de sesión en el menú móvil -->
            <a href="/dashboard" class="text-sm font-bold transition duration-200 text-right" style="color: black;"
                onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST"
                class="text-sm font-bold transition duration-200 text-right" style="color: black;"
                onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0;">
                    Cerrar Sesión
                </button>
            </form>
        @else
            <a class="text-sm font-bold transition duration-200 text-right" href="/login" style="color: black;"
                onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">Iniciar Sesión</a>
        @endif
    </div>
</nav>
