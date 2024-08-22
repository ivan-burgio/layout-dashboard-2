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
            <div class="flex items-center space-x-4">
                <div class="opcion-con-desplegable hover:cursor-pointer relative">
                    <i class="fas fa-user-circle text-2xl" onmouseover="this.style.color='#e5e7eb'"
                        onmouseout="this.style.color='black'"></i>
                    <ul class="desplegable absolute -right-3 p-2 bg-gray-700 rounded-md hidden z-10 w-32">
                        <li>
                            <a href="/dashboard" class="text-sm font-bold transition duration-200" style="color: black;"
                                onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="inline-block w-full">
                                @csrf
                                <button type="submit" class="text-sm font-bold transition duration-200"
                                    style="color: black;" onmouseover="this.style.color='#e5e7eb'"
                                    onmouseout="this.style.color='black'">
                                    Cerrar Sesion
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <!-- Icono de usuario sin sesión activa -->
            <a class="text-sm font-bold transition duration-200" href="/login">
                <i class="fa-solid fa-user text-xl cursor-pointer" style="color: black; transition: color 0.2s;"
                    onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='black'"></i>
            </a>
        @endif
    </div>
    <div class="flex md:hidden w-full h-8 items-center justify-end gap-4">
        @if (session('user_logged_in'))
            <div class="opcion-con-desplegable hover:cursor-pointer relative">
                <i class="fas fa-user-circle text-2xl" onmouseover="this.style.color='#e5e7eb'"
                    onmouseout="this.style.color='black'"></i>
                <ul class="desplegable absolute w-screen p-2 bg-gray-700 rounded-md hidden z-10" style="right: -77px;">
                    <li>
                        <a href="/dashboard"
                            class="w-full text-left p-2 transition duration-200 flex items-center font-bold"
                            style="color: black;" onmouseover="this.style.color='#e5e7eb'"
                            onmouseout="this.style.color='black'">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline-block w-full">
                            @csrf
                            <button type="submit"
                                class="w-full text-left p-2 transition duration-200 flex items-center font-bold"
                                style="color: black;" onmouseover="this.style.color='#e5e7eb'"
                                onmouseout="this.style.color='black'">
                                Cerrar Sesion
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
        <div class="opcion-con-desplegable hover:cursor-pointer relative">
            <i class="fa-solid fa-bars text-2xl cursor-pointer" onmouseover="this.style.color='#e5e7eb'"
                onmouseout="this.style.color='black'"></i>
            <ul class="desplegable absolute -right-8 w-screen p-2 bg-gray-700 rounded-md hidden z-10">
                <li>
                    <a href="/" class="w-full text-left p-2 transition duration-200 flex items-center font-bold"
                        style="color: black;" onmouseover="this.style.color='#e5e7eb'"
                        onmouseout="this.style.color='black'">Inicio</a>
                </li>
                <li>
                    <a href="/servicios"
                        class="w-full text-left p-2 transition duration-200 flex items-center font-bold"
                        style="color: black;" onmouseover="this.style.color='#e5e7eb'"
                        onmouseout="this.style.color='black'">Servicios</a>
                </li>
                <li>
                    <a href="/nosotros" class="w-full text-left p-2 transition duration-200 flex items-center font-bold"
                        style="color: black;" onmouseover="this.style.color='#e5e7eb'"
                        onmouseout="this.style.color='black'">Nosotros</a>
                </li>
                <li>
                    <a href="/contacto" class="w-full text-left p-2 transition duration-200 flex items-center font-bold"
                        style="color: black;" onmouseover="this.style.color='#e5e7eb'"
                        onmouseout="this.style.color='black'">Contacto</a>
                </li>
                @if (!session('user_logged_in'))
                    <li>
                        <a href="/login"
                            class="w-full text-left p-2 transition duration-200 flex items-center font-bold"
                            style="color: black;" onmouseover="this.style.color='#e5e7eb'"
                            onmouseout="this.style.color='black'">Iniciar Sesión</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
