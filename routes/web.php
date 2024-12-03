<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuzonController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContabilidadController;
use App\Http\Controllers\ConfiguracionesController;

// Autenticación
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil');

// Rutas para Calendario
Route::prefix('/agenda/calendario')->group(function () {
    Route::get('/', [AgendaController::class, 'calendario']);
    Route::get('/events', [AgendaController::class, 'events']);
    Route::post('/events', [AgendaController::class, 'store']);
    Route::put('/events/{id}', [AgendaController::class, 'update']);
    Route::delete('/events/{id}', [AgendaController::class, 'destroy']);
});

// Rutas para Tickets
Route::prefix('/agenda/tickets')->group(function () {
    Route::get('/', [AgendaController::class, 'tickets'])->name('tickets');
    Route::post('/', [AgendaController::class, 'ticketsStore'])->name('tickets.store');
    Route::put('/{id}', [AgendaController::class, 'ticketsStore']);
    Route::put('/estado/{id}', [AgendaController::class, 'updateTicket'])->name('tickets.updateEstado');
});

// Rutas para Agenda
Route::get('/agenda/reuniones', [AgendaController::class, 'reuniones']);

// Rutas para Clientes
Route::prefix('/cuentas/clientes')->group(function () {
    Route::get('/', [CuentasController::class, 'clientes'])->name('clientes');
    Route::post('/', [CuentasController::class, 'clientesStore'])->name('clientes.store');
    Route::put('/{id}', [CuentasController::class, 'clientesStore']);
    Route::put('/estado/{id}', [CuentasController::class, 'updateClienteEstado'])->name('clientes.updateEstado');
});

// Rutas para Mensajes web
Route::get('/buzon/messages_webs', [BuzonController::class, 'websMensaje'])->name('messages_webs');
Route::put('/buzon/messages_webs/estado/{id}', [BuzonController::class, 'updateWebMensajeEstado'])->name('messages_webs.updateEstado');

// Rutas para Emails
Route::prefix('/buzon/emails')->group(function () {
    Route::get('/', [BuzonController::class, 'emails'])->name('emails');
    Route::post('/', [BuzonController::class, 'emailsStore'])->name('emails.store');
    Route::put('/{id}', [BuzonController::class, 'emailsStore']);
    Route::put('/estado/{id}', [BuzonController::class, 'updateEmailEstado'])->name('emails.updateEstado');
});

// Rutas para Whatsapps
Route::prefix('/buzon/whatsapps')->group(function () {
    Route::get('/', [BuzonController::class, 'whatsapps'])->name('whatsapps');
    Route::post('/', [BuzonController::class, 'whatsappsStore'])->name('whatsapps.store');
    Route::put('/{id}', [BuzonController::class, 'whatsappsStore']);
    Route::put('/estado/{id}', [BuzonController::class, 'updateWhatsappEstado'])->name('whatsapps.updateEstado');
});

// Rutas para Paginas
Route::prefix('/cuentas/paginas')->group(function () {
    Route::get('/', [CuentasController::class, 'paginas'])->name('paginas');
    Route::post('/', [CuentasController::class, 'paginasStore'])->name('paginas.store');
    Route::put('/{id}', [CuentasController::class, 'paginasStore']);
});

// Rutas para Cuentas
Route::get('/cuentas/contratos', [CuentasController::class, 'contratos']);

// Rutas para Layouts Web
Route::prefix('/layouts/webs')->group(function () {
    Route::get('/', [LayoutsController::class, 'webs'])->name('webs');
    Route::post('/', [LayoutsController::class, 'websStore'])->name('webs.store');
    Route::put('/{id}', [LayoutsController::class, 'websStore'])->name('webs.update');
});

// Rutas para Layouts Dashboards
Route::prefix('/layouts/dashboards')->group(function () {
    Route::get('/', [LayoutsController::class, 'dashboards'])->name('dashboards');
    Route::post('/', [LayoutsController::class, 'dashboardsStore'])->name('dashboards.store');
    Route::put('/{id}', [LayoutsController::class, 'dashboardsStore'])->name('dashboards.update');
});

// Rutas para Layouts Chatbots
Route::prefix('/layouts/chatbots')->group(function () {
    Route::get('/', [LayoutsController::class, 'chatbots'])->name('chatbots');
    Route::post('/', [LayoutsController::class, 'chatbotsStore'])->name('chatbots.store');
    Route::put('/{id}', [LayoutsController::class, 'chatbotsStore'])->name('chatbots.update');
});

// Rutas para Contabilidad
Route::get('/contabilidad/pagos', [ContabilidadController::class, 'pagos']);
Route::get('/contabilidad/documentos', [ContabilidadController::class, 'documentos']);
Route::get('/contabilidad/gastos', [ContabilidadController::class, 'gastos']);
Route::get('/contabilidad/facturas', [ContabilidadController::class, 'facturas']);

// Rutas para Configuraciones
Route::get('/configuraciones/operadores', [ConfiguracionesController::class, 'operadores']);
Route::get('/configuraciones/permisos', [ConfiguracionesController::class, 'permisos']);
