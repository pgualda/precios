<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ScrController;
use App\Http\Controllers\GridController;
use App\Livewire\Articulos;
use App\Livewire\ArticulosCreate;
use App\Livewire\Scr;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('home.home');
    })->name('home');
});


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// para no renegar acordarse de agregar en app/http/kernel.php
// 'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
// 'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,


Route::controller(UserController::class)->group(function () {
    // opciones de circuito de validacion de super admin permiso asigrol
    Route::get('users/index', 'index')->middleware('permission:PermisoAdmin')->name('users.index');
    Route::get('users/edit/{user}', 'edit')->middleware('permission:PermisoAdmin')->name('users.edit');
    Route::post('users/update/{user}', 'update')->middleware('permission:PermisoAdmin')->name('users.update');
    // opciones de circuito de validacion admin permiso asigdatos
    Route::post('users/authdatos/{user}', 'authdatos')->name('users.authdatos');
    Route::get('users/authadmin', 'authadmin')->middleware('permission:PermisoAdmin')->name('users.authadmin');
    // desde el modal mando la url
    Route::get('users/confirmdatos/{user}/{rolid}', 'confirmdatos')->middleware('permission:PermisoAdmin')->name('users.confirmdatos');
});

// asi queda oka el home
Route::controller(HomeController::class)->group(function () {
     Route::get('/', 'index')->name('home.index');
 });

//Rutas para articulos
Route::controller(ArticuloController::class)->group(function () {
        Route::get('articulos/index', 'index')->middleware('permission:PermisoPrecios')->name('articulos.index');
        Route::get('articulos/create', 'create')->middleware('permission:PermisoPrecios')->name('articulos.create');
        Route::get('articulos/edit/{articulo_id}', 'edit')->middleware('permission:PermisoPrecios')->name('articulos.edit');
        Route::get('articulos/store', 'store')->middleware('permission:PermisoPrecios')->name('articulos.store');
        Route::get('articulos/delete/{articulo_id}', 'destroy')->middleware('permission:PermisoPrecios')->name('articulos.delete');
        Route::get('articulos/upload', 'upload')->middleware('permission:PermisoPrecios')->name('articulos.upload');
});

//Rutas pantallas sin middleware x lo menos las definitivas
Route::controller(ScrController::class)->group(function () {
    // sin permisos, acceso a las pantallas -a las grid habria q ver-
    Route::get('scrs/showscr/{scr}', 'showscr')->name('scrs.showscr');
    Route::get('scrs/showgrid/{grid}', 'showgrid')->name('scrs.showgrid');
    // con permiso acceso al crud de scr
    Route::get('scrs/index', 'index')->middleware('permission:PermisoEncargado')->name('scrs.index');
});

//Rutas grid
Route::controller(GridController::class)->group(function () {
    Route::get('grids/index', 'index')->middleware('permission:PermisoEncargado')->name('grids.index');
    Route::get('grids/create', 'create')->middleware('permission:PermisoEncargado')->name('grids.create');
    Route::get('grids/edit/{grid_id}', 'edit')->middleware('permission:PermisoEncargado')->name('grids.edit');
});


// Funciona para cerrar sesion
Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return redirect()->route('home.index');
})->name('logout');
