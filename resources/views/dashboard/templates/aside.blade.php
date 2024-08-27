<aside id="sidebar" class="bg-gray-800 text-white h-screen p-2">
    <nav>
        <ul id="menu" class="space-y-2">
            @foreach (config('aside.menu') as $section)
                <li class="opcion-con-desplegable">
                    <div class="flex items-center justify-between p-2 hover:bg-gray-700 hover:cursor-pointer">
                        <div class="flex items-center">
                            <i class="{{ $section['icon'] }} mr-2"></i>
                            <span>{{ $section['title'] }}</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs ml-2"></i>
                    </div>
                    <ul class="desplegable ml-4 hidden">
                        @foreach ($section['submenu'] as $submenu)
                            <li>
                                <a href="{{ $submenu['url'] }}" class="p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    {{ $submenu['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </nav>
</aside>
