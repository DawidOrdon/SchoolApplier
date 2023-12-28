<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('schools');
});
Route::get('/test', function () {
    return view('test');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/user',[\App\Http\Controllers\UserController::class,'index']);
    Route::get('/user/edit',[\App\Http\Controllers\UserController::class,'edit']);
    Route::post('/user/store',[\App\Http\Controllers\UserController::class,'store']);
    Route::resource('/user/second_parent',\App\Http\Controllers\SecondParentsController::class);
});

Route::group(['middleware' => ['role:admin|school']], function () {
    Route::get('/schools/{school_id}/admin',[\App\Http\Controllers\SchoolsController::class,'admin_page']);
    Route::get('/school/edit',[\App\Http\Controllers\SchoolsController::class,'edit']);
});
Route::resource('/schools',\App\Http\Controllers\SchoolsController::class);
Route::get('/{school_id}',[\App\Http\Controllers\SchoolsController::class,'show']);
Route::resource('{school_id}/classes',\App\Http\Controllers\ClassesController::class);
