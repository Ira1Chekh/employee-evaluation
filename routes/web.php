<?php

use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\CloseProjectController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UsersController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::resource('projects', ProjectController::class);
    Route::put('projects/{project}/close', CloseProjectController::class)->name('projects.close');

    Route::resource('projects.ratings', RatingController::class)->only('create', 'store');

    Route::resource('users', UsersController::class)->only('index', 'show');
});

