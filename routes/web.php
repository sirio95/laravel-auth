<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [MainController::class, 'home'])
    ->name('home');
Route::get('/project/show/{project}', [MainController::class, 'show'])
    ->name('project.show');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/project/create', [MainController::class, 'create'])
            ->name('project.create');
        Route::post('/project/create', [MainController::class, 'store'])
            ->name('project.store');

        Route::get('/project/edit/{project}', [MainController::class, 'edit'])
            ->name('project.edit');
        Route::post('/project/edit/{project}', [MainController::class, 'update'])
            ->name('project.update');

        Route::get('/project/delete/{project}', [MainController::class, 'delete'])
            ->name('project.delete');

    });


require __DIR__ . '/auth.php';