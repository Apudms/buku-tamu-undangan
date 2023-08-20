<?php

use App\Http\Controllers\AdminController;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\DataAcaraComponent;
use App\Http\Livewire\DataPanitiaComponent;
use App\Http\Livewire\DataPengantinComponent;
use App\Http\Livewire\DataSumbanganComponent;
use App\Http\Livewire\DataTamuUndanganComponent;
use App\Http\Livewire\DataTugasPanitiaComponent;
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

Route::get('/', DashboardComponent::class);

// Route::prefix('data')->group(function () {
//     Route::get('/acara', DataAcaraComponent::class);
//     Route::get('/pengantin', DataPengantinComponent::class);
//     Route::get('/tamu-undangan', DataTamuUndanganComponent::class);
//     Route::get('/tugas-panitia', DataTugasPanitiaComponent::class);
//     Route::get('/panitia', DataPanitiaComponent::class);
//     Route::get('/sumbangan', DataSumbanganComponent::class);
// });

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/acara', DataAcaraComponent::class);
    Route::get('/pengantin', DataPengantinComponent::class);
    Route::get('/tamu-undangan', DataTamuUndanganComponent::class);
    Route::get('/tugas-panitia', DataTugasPanitiaComponent::class);
    Route::get('/panitia', DataPanitiaComponent::class);
    Route::get('/sumbangan', DataSumbanganComponent::class);
});

Route::middleware([
    'auth:sanctum,web',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
