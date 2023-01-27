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

Route::redirect('/','/admin/dashboard');

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'controller' => DashboardController::class,
    'prefix' => 'admin',
    'as' => 'admin.dashboard.'
], function(){
    // dashboard route write here
    Route::get('/dashboard','index')->name('index');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'controller' => SparepartController::class,
    'prefix' => 'admin',
    'as' => 'admin.sparepart.'
], function(){
    // Sparepart route write here
    Route::get('/sparepart','index')->name('index');
    Route::get('/sparepart/datatable','datatable')->name('datatable');
    Route::get('/sparepart/create','create')->name('create');
    Route::post('/sparepart/store','store')->name('store');
    Route::get('/sparepart/edit/{id}','edit')->name('edit');
    Route::put('/sparepart/update/{id}','update')->name('update');
    Route::get('/sparepart/delete/{id}','destroy')->name('destroy');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'controller' => TransaksiController::class,
    'prefix' => 'admin',
    'as' => 'admin.transaksi.'
], function(){
    // transaksi route write here
    Route::get('/transaksi','index')->name('index');
    Route::get('/transaksi/create','create')->name('create');
    Route::get('/transaksi/edit','edit')->name('edit');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'controller' => JasaController::class,
    'prefix' => 'admin',
    'as' => 'admin.jasa.'
], function(){
    // jasa route write here
    Route::get('/jasa','index')->name('index');
    Route::get('/jasa/datatable','datatable')->name('datatable');
    Route::get('/jasa/create','create')->name('create');
    Route::post('/jasa','store')->name('store');
    Route::get('/jasa/edit/{id}','edit')->name('edit');
    Route::put('/jasa/update/{id}','update')->name('update');
    Route::get('/jasa/delete/{id}','destroy')->name('destroy');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'controller' => RoleController::class,
    'prefix' => 'admin',
    'as' => 'admin.role.'
], function(){
    // role route write here
    Route::get('/role','index')->name('index');
    Route::post('/role/store','store')->name('store');
    Route::get('/role/destroy/{id}','destroy')->name('destroy');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'controller' => KaryawanController::class,
    'prefix' => 'admin',
    'as' => 'admin.karyawan.'
], function(){
    // karyawan route write here
    Route::get('/karyawan','index')->name('index');
    Route::get('/karyawan/create','create')->name('create');
    Route::get('/karyawan/edit','edit')->name('edit');
});
