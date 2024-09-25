<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BuzonController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContabilidadController;
use App\Http\Controllers\ConfiguracionesController;

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
Route::post('/enviar-mensaje', [BuzonController::class, 'websMensajeStore'])->name('enviar.mensaje');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil');

    // Rutas para Calendario
    Route::prefix('/dashboard/agenda/calendario')->group(function () {
        Route::get('/', [AgendaController::class, 'calendario']);
        Route::get('/events', [AgendaController::class, 'events']);
        Route::post('/events', [AgendaController::class, 'store']);
        Route::put('/events/{id}', [AgendaController::class, 'update']);
        Route::delete('/events/{id}', [AgendaController::class, 'destroy']);
    });

    // Rutas para Tickets
    Route::prefix('/dashboard/agenda/tickets')->group(function () {
        Route::get('/', [AgendaController::class, 'tickets'])->name('tickets');
        Route::post('/', [AgendaController::class, 'ticketsStore'])->name('tickets.store');
        Route::put('/{id}', [AgendaController::class, 'ticketsStore']);
        Route::put('/estado/{id}', [AgendaController::class, 'updateTicket'])->name('tickets.updateEstado');
    });

    // Rutas para Agenda
    Route::get('/dashboard/agenda/reuniones', [AgendaController::class, 'reuniones']);

    // Rutas para Clientes
    Route::prefix('/dashboard/cuentas/clientes')->group(function () {
        Route::get('/', [CuentasController::class, 'clientes'])->name('clientes');
        Route::post('/', [CuentasController::class, 'clientesStore'])->name('clientes.store');
        Route::put('/{id}', [CuentasController::class, 'clientesStore']);
        Route::put('/estado/{id}', [CuentasController::class, 'updateClienteEstado'])->name('clientes.updateEstado');
    });

    // Rutas para Mensajes web
    Route::get('/dashboard/buzon/webs', [BuzonController::class, 'websMensaje'])->name('webs');
    Route::put('/dashboard/buzon/webs/estado/{id}', [BuzonController::class, 'updateWebMensajeEstado'])->name('webs.updateEstado');

    // Rutas para Emails
    Route::prefix('/dashboard/buzon/emails')->group(function () {
        Route::get('/', [BuzonController::class, 'emails'])->name('emails');
        Route::post('/', [BuzonController::class, 'emailsStore'])->name('emails.store');
        Route::put('/{id}', [BuzonController::class, 'emailsStore']);
        Route::put('/estado/{id}', [BuzonController::class, 'updateEmailEstado'])->name('emails.updateEstado');
    });

    // Rutas para Whatsapps
    Route::prefix('/dashboard/buzon/whatsapps')->group(function () {
        Route::get('/', [BuzonController::class, 'whatsapps'])->name('whatsapps');
        Route::post('/', [BuzonController::class, 'whatsappsStore'])->name('whatsapps.store');
        Route::put('/{id}', [BuzonController::class, 'whatsappsStore']);
        Route::put('/estado/{id}', [BuzonController::class, 'updateWhatsappEstado'])->name('whatsapps.updateEstado');
    });

    // Rutas para Paginas
    Route::prefix('/dashboard/cuentas/paginas')->group(function () {
        Route::get('/', [CuentasController::class, 'paginas'])->name('paginas');
        Route::post('/', [CuentasController::class, 'paginasStore'])->name('paginas.store');
        Route::put('/{id}', [CuentasController::class, 'paginasStore']);
    });

    // Rutas para Cuentas
    Route::get('/dashboard/cuentas/contratos', [CuentasController::class, 'contratos']);

    // Rutas para Layouts Web
    Route::prefix('/dashboard/layouts/webs')->group(function () {
        Route::get('/', [LayoutsController::class, 'webs'])->name('webs');
        Route::post('/', [LayoutsController::class, 'websStore'])->name('webs.store');
        Route::put('/{id}', [LayoutsController::class, 'websStore'])->name('webs.update');
    });

    // Rutas para Layouts Dashboards
    Route::prefix('/dashboard/layouts/dashboards')->group(function () {
        Route::get('/', [LayoutsController::class, 'dashboards'])->name('dashboards');
        Route::post('/', [LayoutsController::class, 'dashboardsStore'])->name('dashboards.store');
        Route::put('/{id}', [LayoutsController::class, 'dashboardsStore'])->name('dashboards.update');
    });

    // Rutas para Layouts Chatbots
    Route::prefix('/dashboard/layouts/chatbots')->group(function () {
        Route::get('/', [LayoutsController::class, 'chatbots'])->name('chatbots');
        Route::post('/', [LayoutsController::class, 'chatbotsStore'])->name('chatbots.store');
        Route::put('/{id}', [LayoutsController::class, 'chatbotsStore'])->name('chatbots.update');
    });

    // Rutas para Contabilidad
    Route::get('/dashboard/contabilidad/pagos', [ContabilidadController::class, 'pagos']);
    Route::get('/dashboard/contabilidad/documentos', [ContabilidadController::class, 'documentos']);
    Route::get('/dashboard/contabilidad/gastos', [ContabilidadController::class, 'gastos']);
    Route::get('/dashboard/contabilidad/facturas', [ContabilidadController::class, 'facturas']);

    // Rutas para Configuraciones
    Route::get('/dashboard/configuraciones/operadores', [ConfiguracionesController::class, 'operadores']);
    Route::get('/dashboard/configuraciones/permisos', [ConfiguracionesController::class, 'permisos']);
});
