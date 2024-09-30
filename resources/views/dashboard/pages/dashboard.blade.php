@extends('dashboard.dashboard-layout')

@section('content')
    <!-- Content -->
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold">{{ $totalClientes }}</div>
                        </div>
                        <div class="text-sm font-medium text-black">Cantidad de Clientes</div>
                    </div>
                </div>

                <a href="/dashboard/cuentas/clientes"
                        class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold">100</div>
                            <div
                                class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">
                                +30%</div>
                        </div>
                        <div class="text-sm font-medium text-black">Companies</div>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-black"><i class="ri-more-fill"></i></button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-black hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-black hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-black hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="/dierenartsen" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1">100</div>
                        <div class="text-sm font-medium text-black">Blogs</div>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-black"><i class="ri-more-fill"></i></button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-black hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-black hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-black hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 w-full shadow-lg rounded">
                <div class="rounded-t mb-0 px-0 border-0">
                    <div class="flex justify-between mb-4 items-start">
                        <h3 class="font-semibold text-base text-gray-900">Buzón</h3>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 bg-gray-100 text-gray-500 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Canal</th>
                                    <th
                                        class="px-4 bg-gray-100 text-gray-500 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Cantidad</th>
                                    <th
                                        class="px-4 bg-gray-100 text-gray-500 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                        Porcentaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-gray-700">
                                    <th
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        Webs</th>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $cantidadBuzon['totalMensajesWeb'] }}</td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">{{ $cantidadBuzon['porcentajeMensajesWeb'] }}%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                    <div style="width: {{ $cantidadBuzon['porcentajeMensajesWeb'] }}%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-gray-700">
                                    <th
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        Emails</th>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $cantidadBuzon['totalEmails'] }}</td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">{{ $cantidadBuzon['porcentajeEmails'] }}%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
                                                    <div style="width: {{ $cantidadBuzon['porcentajeEmails'] }}%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-gray-700">
                                    <th
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                        WhatsApp</th>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $cantidadBuzon['totalWhatsapps'] }}</td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">{{ $cantidadBuzon['porcentajeWhatsapps'] }}%</span>
                                            <div class="relative w-full">
                                                <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                                                    <div style="width: {{ $cantidadBuzon['porcentajeWhatsapps'] }}%"
                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Tickets Pendientes</div>
                    <a href="/dashboard/agenda/tickets"
                        class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                </div>
                <div class="overflow-hidden">
                    <table class="w-full min-w-[540px]">
                        <tbody>
                            @foreach ($ticketsPendientes as $ticket)
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <p class="text-black text-sm font-medium ml-2">
                                                {{ $ticket->titulo }}</p>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium text-black">{{ $ticket->created_at->format('d-m-Y') }}</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-black">{{ $ticket->prioridad }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Estadísticas de Mensajes Recibidos</div>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <div class="filter-buttons flex space-x-2">
                        <button class="filter-btn bg-sky-800 hover:bg-sky-950 text-white px-4 py-2 mb-4 rounded-md" data-filter="day">Último
                            día</button>
                        <button class="filter-btn bg-sky-800 hover:bg-sky-950 text-white px-4 py-2 mb-4 rounded-md" data-filter="month">Último
                            mes</button>
                        <button class="filter-btn bg-sky-800 hover:bg-sky-950 text-white px-4 py-2 mb-4 rounded-md" data-filter="year">Último
                            año</button>
                        <button class="filter-btn bg-sky-800 hover:bg-sky-950 text-white px-4 py-2 mb-4 rounded-md" data-filter="all">Todo el
                            tiempo</button>
                    </div>

                    <canvas id="chartBuzon"></canvas>
                    {{-- Por alguna razon no funciona el codigo JS fuera de este archivo --}}
                    <script>
                        var chartBuzon; // Mover la variable fuera para que sea accesible globalmente

                        // Función para cargar el gráfico
                        function loadChart(selectedFilter) {
                            // Realizar la petición AJAX
                            $.ajax({
                                url: '/dashboard', // La URL donde se enviará la petición
                                method: 'GET',
                                data: {
                                    filter: selectedFilter // Enviar el filtro al controlador
                                },
                                success: function(response) {
                                    // Procesar la respuesta y actualizar el gráfico
                                    var ctx = document.getElementById('chartBuzon').getContext('2d');

                                    // Si ya existe un gráfico, destruirlo antes de crear uno nuevo
                                    if (chartBuzon) {
                                        chartBuzon.destroy();
                                    }

                                    // Crear un nuevo gráfico con los datos actualizados
                                    chartBuzon = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: response.chartData.labels,
                                            datasets: response.chartData.datasets
                                        },
                                        options: {
                                            responsive: true,
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                },
                                error: function(error) {
                                    console.error('Error al cargar los datos del gráfico:', error);
                                }
                            });
                        }

                        // Evento para los botones de filtro
                        document.querySelectorAll('.filter-btn').forEach(button => {
                            button.addEventListener('click', function() {
                                const filter = this.dataset.filter; // Obtener el filtro del botón
                                loadChart(filter); // Llamar a la función para cargar el gráfico con el filtro seleccionado
                            });
                        });

                        // Al enviar el formulario de filtro
                        $('#filterForm').on('submit', function(event) {
                            event.preventDefault(); // Evitar que el formulario recargue la página

                            var selectedFilter = $('#filter').val(); // Obtener el filtro seleccionado
                            loadChart(selectedFilter); // Llamar a la función para cargar el gráfico
                        });

                        // Crear el gráfico inicial al cargar la página
                        var ctx = document.getElementById('chartBuzon').getContext('2d');
                        chartBuzon = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: {!! json_encode($chartBuzon['chartData']['labels']) !!},
                                datasets: {!! json_encode($chartBuzon['chartData']['datasets']) !!}
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Earnings</div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-black"><i class="ri-more-fill"></i></button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-black hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-black hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-black hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[460px]">
                        <thead>
                            <tr>
                                <th
                                    class="text-[12px] uppercase tracking-wide font-medium text-black py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                    Service</th>
                                <th
                                    class="text-[12px] uppercase tracking-wide font-medium text-black py-2 px-4 bg-gray-50 text-left">
                                    Earning</th>
                                <th
                                    class="text-[12px] uppercase tracking-wide font-medium text-black py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt=""
                                            class="w-8 h-8 rounded object-cover block">
                                        <a href="#"
                                            class="text-black text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                            landing page</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
