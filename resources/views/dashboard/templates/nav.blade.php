<nav class="bg-gray-800 text-white py-1 px-8 flex items-center justify-between w-full h-12 relative">
    <div>
        <h1 class="text-white text-xl font-semibold">Dashboard Buyar</h1>
    </div>
    <div class="flex items-center space-x-4">
        <div class="opcion-con-desplegable hover:cursor-pointer relative">
            <i class="fas fa-user-circle text-white text-2xl"></i>
            <ul class="desplegable absolute -right-3 mt-2 p-2 bg-gray-800 rounded-md shadow-lg hidden z-10 w-40">
                <li>
                    <a href="/perfil" class="w-full text-left p-2 hover:bg-gray-700 flex items-center">
                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                        Perfil
                    </a>
                </li>
                <li>
                    <a href="/" class="w-full text-left p-2 hover:bg-gray-700 flex items-center">
                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                        Web
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline-block w-full">
                        @csrf
                        <button type="submit" class="w-full text-left p-2 hover:bg-gray-700 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>
                            Cerrar Sesion
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
