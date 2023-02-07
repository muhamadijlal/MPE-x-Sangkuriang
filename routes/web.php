<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::redirect('/','/login');

Route::middleware(['revalidate','auth'])->group(function(){

    // Admin Middleware
    Route::middleware('admin')->group(function(){
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
            Route::get('/transaksi/datatable','datatable')->name('datatable');
            Route::get('/transaksi/create','create')->name('create');
            Route::post('/transaksi/store','store')->name('store');
            Route::get('/transaksi/approvement/{id}','approvement')->name('approvement');
            Route::post('/transaksi/approvement/store/{id}','approvementStore')->name('approvementStore');
            Route::get('/transaksi/invoice/{id}','invoice')->name('invoice');
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
            Route::get('/karyawan/datatable','datatable')->name('datatable');
            Route::get('/karyawan/create','create')->name('create');
            Route::post('/karyawan/store','store')->name('store');
            Route::get('/karyawan/edit/{id}','edit')->name('edit');
            Route::put('/karyawan/update/{id}','update')->name('update');
            Route::get('/karyawan/delete/{id}','destroy')->name('destroy');
        });
        
        Route::group([
            'namespace' => 'App\Http\Controllers\Admin',
            'controller' => LaporanController::class,
            'prefix' => 'admin',
            'as' => 'admin.laporan.'
        ],  function(){
            // Laporan route write here
            Route::get('/laporan/hari','hari')->name('hari');
            Route::get('/laporan/bulan','bulan')->name('bulan');
            Route::get('/laporan/datatable','datatable')->name('datatable'); // Only use for laporan bulan
            Route::get('/laporan/all','laporan')->name('laporan');
            Route::get('/laporan/all/datatable','laporanAll')->name('datatableAll');
            Route::get('/laporan/{id}','detail')->name('detail');
        });
    });

    // User Middleware
    Route::middleware('user')->group(function(){
        Route::group([
            'namespace' => 'App\Http\Controllers\User',
            'controller' => DashboardController::class,
            'prefix' => 'user',
            'as' => 'user.dashboard.'
        ], function(){
            // dashboard route write here
            Route::get('/dashboard','index')->name('index');
        });

        Route::group([
            'namespace' => 'App\Http\Controllers\User',
            'controller' => TransaksiController::class,
            'prefix' => 'user',
            'as' => 'user.transaksi.'
        ], function(){
            // transaksi route write here
            Route::get('/transaksi','index')->name('index');
            Route::get('/transaksi/datatable','datatable')->name('datatable');
            Route::get('/transaksi/create','create')->name('create');
            Route::post('/transaksi/store','store')->name('store');
            Route::get('/transaksi/approvement/{id}','approvement')->name('approvement');
            Route::post('/transaksi/approvement/store/{id}','approvementStore')->name('approvementStore');
            Route::get('/transaksi/invoice/{id}','invoice')->name('invoice');
        });
    });
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('autentikasi', [AuthController::class, 'autentikasi'])->name('autentikasi');
});

// Let it stay below
Route::fallback(function(){
    return abort(404);
});