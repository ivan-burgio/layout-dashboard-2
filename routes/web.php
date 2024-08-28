<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// Rutas públicas
Route::get('/', [PageController::class, 'inicio'])->name('inicio');
Route::get('/servicios', [PageController::class, 'servicios'])->name('servicios');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');

// Autenticación
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Envío de mensajes desde el formulario de contacto
Route::post('/enviar-mensaje', [MensajeController::class, 'store'])->name('enviar.mensaje');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil');

    // Rutas para Agenda
    Route::get('/dashboard/agenda/tickets', [AgendaController::class, 'tickets']);
    Route::get('/dashboard/agenda/reuniones', [AgendaController::class, 'reuniones']);

    // Rutas para Cuentas
    Route::get('/dashboard/cuentas/clientes', [CuentasController::class, 'clientes']);
    Route::get('/dashboard/cuentas/paginas', [CuentasController::class, 'paginas']);
    Route::get('/dashboard/cuentas/contratos', [CuentasController::class, 'contratos']);

    // Rutas para Layouts
    Route::get('/dashboard/layouts/webs', [LayoutsController::class, 'webs']);
    Route::get('/dashboard/layouts/dashboards', [LayoutsController::class, 'dashboards']);
    Route::get('/dashboard/layouts/chatboxs', [LayoutsController::class, 'chatboxs']);

    // Rutas para Buzón
    Route::get('/dashboard/buzon/webs', [BuzonController::class, 'websBuzon']);
    Route::get('/dashboard/buzon/emails', [BuzonController::class, 'emails']);
    Route::get('/dashboard/buzon/whatsapp', [BuzonController::class, 'whatsapp']);

    // Rutas para Contabilidad
    Route::get('/dashboard/contabilidad/pagos', [ContabilidadController::class, 'pagos']);
    Route::get('/dashboard/contabilidad/documentos', [ContabilidadController::class, 'documentos']);
    Route::get('/dashboard/contabilidad/gastos', [ContabilidadController::class, 'gastos']);
    Route::get('/dashboard/contabilidad/facturas', [ContabilidadController::class, 'facturas']);

    // Rutas para Configuraciones
    Route::get('/dashboard/configuraciones/operadores', [ConfiguracionesController::class, 'operadores']);
    Route::get('/dashboard/configuraciones/permisos', [ConfiguracionesController::class, 'permisos']);
});
