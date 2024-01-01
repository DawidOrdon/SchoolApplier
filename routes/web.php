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
    Route::post('/user/update',[\App\Http\Controllers\UserController::class,'update']);
    Route::resource('/user/second_parent',\App\Http\Controllers\SecondParentsController::class);
    Route::resource('/user/kids',\App\Http\Controllers\KidsController::class);
    Route::get('/user/kids/{kid}/exam',[\App\Http\Controllers\KidsController::class,'exam_add']);
    Route::post('/user/kids/{kid}/exam_store',[\App\Http\Controllers\KidsController::class,'exam_store']);
    Route::get('/user/kids/{kid}/certificate',[\App\Http\Controllers\KidsController::class,'certificate_add']);
    Route::post('/user/kids/{kid}/certificate_store',[\App\Http\Controllers\KidsController::class,'certificate_store']);
    Route::get('/schools/{school}/{class}/application',[\App\Http\Controllers\ApplicationsController::class,'index']);
    Route::post('/schools/{school}/{class}/application/save',[\App\Http\Controllers\ApplicationsController::class,'store']);
});

Route::group(['middleware' => ['role:admin|school']], function () {
    Route::get('/schools/{school_id}/admin',[\App\Http\Controllers\SchoolsController::class,'admin_page']);
    Route::get('/school/edit',[\App\Http\Controllers\SchoolsController::class,'edit']);
    Route::get('/schools/{school}/edit/languages',[\App\Http\Controllers\LanguagesController::class,'index']);
    Route::post('/schools/{school}/edit/languages/store',[\App\Http\Controllers\SchoolLanguageController::class,'store']);
    Route::post('/schools/{school}/edit/languages/delete',[\App\Http\Controllers\SchoolLanguageController::class,'destroy']);
});
Route::resource('/schools',\App\Http\Controllers\SchoolsController::class);
Route::get('/{school_id}',[\App\Http\Controllers\SchoolsController::class,'show']);
Route::resource('{school_id}/classes',\App\Http\Controllers\ClassesController::class);
