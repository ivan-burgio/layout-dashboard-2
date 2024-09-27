<?php

$baseURL = '/dashboard/';

return [
    'menu' => [
        [
            'title' => 'Dashboard',
            'icon' => 'fa-solid fa-house',
            'url' => $baseURL,
            'submenu' => [
            ],
        ],
        [
            'title' => 'Agenda',
            'icon' => 'fas fa-calendar-alt',
            'submenu' => [
                ['title' => 'Calendario', 'url' => $baseURL . 'agenda/calendario'],
                ['title' => 'Tickets', 'url' => $baseURL . 'agenda/tickets'],
                // ['title' => 'Reuniones', 'url' => $baseURL . 'agenda/reuniones'],
            ],
        ],
        [
            'title' => 'Cuentas',
            'icon' => 'fa-solid fa-user-group',
            'submenu' => [
                ['title' => 'Clientes', 'url' => $baseURL . 'cuentas/clientes'],
                ['title' => 'Paginas', 'url' => $baseURL . 'cuentas/paginas'],
                // ['title' => 'Contratos', 'url' => $baseURL . 'cuentas/contratos'],
            ],
        ],
        [
            'title' => 'Layouts',
            'icon' => 'fa-solid fa-table-columns',
            'submenu' => [
                ['title' => 'Webs', 'url' => $baseURL . 'layouts/webs'],
                ['title' => 'Dashboards', 'url' => $baseURL . 'layouts/dashboards'],
                ['title' => 'ChatBots', 'url' => $baseURL . 'layouts/chatbots'],
            ],
        ],
        [
            'title' => 'Buzón',
            'icon' => 'fa-solid fa-envelope',
            'submenu' => [
                ['title' => 'Webs', 'url' => $baseURL . 'buzon/messages_webs'],
                ['title' => 'Emails', 'url' => $baseURL . 'buzon/emails'],
                ['title' => 'WhatsApp', 'url' => $baseURL . 'buzon/whatsapps'],
            ],
        ],
        /* [
            'title' => 'Contabilidad',
            'icon' => 'fas fa-money-bill-wave',
            'submenu' => [
                ['title' => 'Pagos', 'url' => $baseURL . 'contabilidad/pagos'],
                ['title' => 'Documentos', 'url' => $baseURL . 'contabilidad/documentos'],
                ['title' => 'Gastos', 'url' => $baseURL . 'contabilidad/gastos'],
                ['title' => 'Facturas', 'url' => $baseURL . 'contabilidad/facturas'],
            ],
        ], */
        /* [
            'title' => 'Configuraciones',
            'icon' => 'fa-solid fa-gear',
            'submenu' => [
                ['title' => 'Operadores', 'url' => $baseURL . 'configuraciones/operadores'],
                ['title' => 'Permisos', 'url' => $baseURL . 'configuraciones/permisos'],
            ],
        ], */
    ],
];
