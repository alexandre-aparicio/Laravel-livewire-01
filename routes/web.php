<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Rutas de las categorias
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {        
        
        Route::get('/categoria', 'index'); 
        Route::get('/categoria/crear', 'create'); 
        Route::post('/categoria', 'store'); 
        Route::get('/categoria/{categoria}/edit', 'edit'); 
        Route::put('/categoria/{categoria}', 'update');         
        
    }); 

    Route::controller(App\Http\Controllers\Admin\ProductoController::class)->group(function () {  
    
        Route::get('/producto', 'index'); 
        Route::get('/producto/crear', 'create');
        Route::post('/producto', 'store');  
        Route::get('/producto/{producto}/edit', 'edit'); 
        Route::put('/producto/{producto}/update', 'update');

    });
        
    Route::get('/marca', App\Http\Livewire\Admin\Marca\Index::class);
    
    
    
});
