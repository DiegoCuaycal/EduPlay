<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\OpcionController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
    
    // Accesible por todos los usuarios autenticados
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    
    Route::get('billing', function () {
        return view('billing');
    })->name('billing');
    
    Route::get('profile', function () {
        return view('profile');
    })->name('profile');
    
    Route::get('rtl', function () {
        return view('rtl');
    })->name('rtl');
    
    Route::get('tables', function () {
        return view('tables');
    })->name('tables');
    
    Route::get('virtual-reality', function () {
        return view('virtual-reality');
    })->name('virtual-reality');

    Route::get('/ayuda', function () {
        return view('ayuda');
    });
    
    
    Route::get('/logout', [SessionsController::class, 'destroy']);
    
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    
    Route::post('/save-quiz', [QuizController::class, 'save'])->name('save.quiz');
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    
    Route::get('respuestas/create', [RespuestaController::class, 'create'])->name('respuestas.create');
	Route::post('respuestas', [RespuestaController::class, 'store'])->name('respuestas.store');	
	Route::get('/respuestas', [RespuestaController::class, 'index'])->name('respuestas.index');


	Route::get('preguntas/create', [PreguntaController::class, 'create'])->name('preguntas.create');
	Route::post('preguntas', [PreguntaController::class, 'store'])->name('preguntas.store');
	Route::get('/preguntas', [PreguntaController::class, 'index'])->name('preguntas.index');


	Route::get('pruebas/create', [PruebaController::class, 'create'])->name('pruebas.create');
	Route::post('pruebas', [PruebaController::class, 'store'])->name('pruebas.store');
	Route::get('/pruebas', [PruebaController::class, 'index'])->name('pruebas.index');
	
    Route::get('/pruebas/{id}/edit', [PruebaController::class, 'edit'])->name('pruebas.edit');
    Route::put('/pruebas/{id}', [PruebaController::class, 'update'])->name('pruebas.update');
    
    Route::get('/pruebas/cuadros', [PruebaController::class, 'verPruebasCuadros'])->name('pruebas.cuadros');
	Route::get('/pruebas/{id}', [PruebaController::class, 'show'])->name('pruebas.show');

	Route::get('/pruebas/{id}/edit', [PruebaController::class, 'edit'])->name('pruebas.edit');
	Route::put('/pruebas/{id}', [PruebaController::class, 'update'])->name('pruebas.update');

    
    
 // Ruta para el perfil de usuario
 Route::get('/laravel-examples/user-profile', function () {
    return view('laravel-examples.user-profile');
})->name('user-profile');

	

});
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    

    
    // Administración de usuarios
    Route::get('user-management', function () {
        return view('laravel-examples/user-management');
    })->name('user-management');
    
    // Gestión de pruebas (crear, editar, ver todas)
   /*  Route::get('pruebas/create', [PruebaController::class, 'create'])->name('pruebas.create');
    Route::post('pruebas', [PruebaController::class, 'store'])->name('pruebas.store');
    Route::get('/pruebas', [PruebaController::class, 'index'])->name('pruebas.index');
    Route::get('/pruebas/{id}/edit', [PruebaController::class, 'edit'])->name('pruebas.edit');
    Route::put('/pruebas/{id}', [PruebaController::class, 'update'])->name('pruebas.update');
    
    Route::get('/pruebas/cuadros', [PruebaController::class, 'verPruebasCuadros'])->name('pruebas.cuadros');
	Route::get('/pruebas/{id}', [PruebaController::class, 'show'])->name('pruebas.show');

	Route::get('/pruebas/{id}/edit', [PruebaController::class, 'edit'])->name('pruebas.edit');
	Route::put('/pruebas/{id}', [PruebaController::class, 'update'])->name('pruebas.update');
	 */
	//Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    /* 	Route::get('/realizar-prueba/{id}', [RealizarPruebaController::class, 'show'])->name('realizar.prueba');
	
    Route::post('/realizar-prueba/{id}/store', [RealizarPruebaController::class, 'store'])->name('realizar-prueba.store');

	// Ruta para ver las pruebas realizadas y sus puntajes
	Route::get('/pruebas-realizadas', [RealizarPruebaController::class, 'index'])->name('pruebas.realizadas');

	Route::get('/pruebas-realizadas/{id}', [RealizarPruebaController::class, 'showDetails'])->name('pruebas.realizadas.show');

 */

});
Route::group(['middleware' => ['auth', 'role:user']], function () {


    // Acceso a ver pruebas en formato de cuadros
    //Route::get('/pruebas/cuadros', [PruebaController::class, 'verPruebasCuadros'])->name('pruebas.cuadros');
    
    // Ver detalles de una prueba específica
    //Route::get('/pruebas/{id}', [PruebaController::class, 'show'])->name('pruebas.show');

});
Route::group(['middleware' => 'guest'], function () {

    // Registro de usuario
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    
    // Sesión de usuario (login)
    Route::post('/session', [SessionsController::class, 'store']);
    
    // Olvido de contraseña
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
    
});

// Vista de login
Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
