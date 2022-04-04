<?php

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\TaskController;
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

Route::name('backend.')->middleware(['auth'])->group(function () {
    /* ===== TASK ===== */
    Route::controller(TaskController::class)->group(function () {
        Route::get('/', 'index')->name('tasks');
        Route::get('cadastrar', 'create')->name('tasks.create');
        Route::post('cadastrar', 'store')->name('tasks.store');
        Route::get('editar/{task}', 'edit')->name('tasks.edit');
        Route::put('editar/{task}', 'update')->name('tasks.update');
        Route::delete('excluir/{task}', 'destroy')->name('tasks.destroy');
    });
});

require __DIR__ . '/auth.php';
