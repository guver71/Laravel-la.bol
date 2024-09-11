<?php

use App\Http\Controllers\TrabajoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Ruta principal de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Grupo de rutas para usuarios autenticados
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para CRUD de trabajos y usuarios
    Route::resource('trabajos', TrabajoController::class);
    Route::resource('users', UserController::class);
});

// Grupo de rutas específicas para administradores
// routes/web.php

Route::middleware(['auth'])->group(function () {
    // Ruta para ver usuarios pendientes
    Route::get('/usuarios-pendientes', [UserController::class, 'pending'])->name('users.pending');

    // Ruta para aprobar usuarios
    Route::post('/usuarios-aprobar/{user}', [UserController::class, 'approve'])->name('usuarios.aprobar');

    // Ruta para rechazar usuarios
    Route::post('/usuarios-rechazar/{user}', [UserController::class, 'reject'])->name('usuarios.rechazar');
});


// Ruta de prueba para el middleware admin
Route::get('/admin-test', function () {
    return 'Acceso autorizado. Eres administrador.';
})->middleware('admin');
