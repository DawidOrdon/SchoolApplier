<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
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
        return redirect('/schools');
    })->name('dashboard');
    Route::get('/user',[\App\Http\Controllers\UserController::class,'index']);
    Route::get('/user/edit',[\App\Http\Controllers\UserController::class,'edit']);
    Route::post('/user/update',[\App\Http\Controllers\UserController::class,'update']);
    Route::resource('/user/second_parent',\App\Http\Controllers\SecondParentsController::class);
    Route::resource('/user/kids',\App\Http\Controllers\KidsController::class);
    Route::get('/user/kids/{kid}/exam',[\App\Http\Controllers\KidsController::class,'exam_add'])->middleware(\App\Http\Middleware\KidOwner::class);
    Route::post('/user/kids/{kid}/exam_store',[\App\Http\Controllers\KidsController::class,'exam_store'])->middleware(\App\Http\Middleware\KidOwner::class);;
    Route::get('/user/kids/{kid}/certificate',[\App\Http\Controllers\KidsController::class,'certificate_add'])->middleware(\App\Http\Middleware\KidOwner::class);;
    Route::post('/user/kids/{kid}/certificate_store',[\App\Http\Controllers\KidsController::class,'certificate_store'])->middleware(\App\Http\Middleware\KidOwner::class);;
    Route::get('/schools/{school}/{class}/application',[\App\Http\Controllers\ApplicationsController::class,'create']);
    Route::post('/schools/{school}/{class}/application/save',[\App\Http\Controllers\ApplicationsController::class,'store']);
    Route::get('/my_apps',[\App\Http\Controllers\ApplicationsController::class,'index']);
    Route::post('/my_apps/drop',[\App\Http\Controllers\ApplicationsController::class,'destroy']);
    Route::post('/my_apps/pdf',[\App\Http\Controllers\ApplicationsController::class,'new_pdf']);
    Route::get('/my_apps/test',[\App\Http\Controllers\ApplicationsController::class,'tests']);
});

Route::group(['middleware' => ['role:admin|school']], function () {
    Route::get('/schools/{school}/admin',[\App\Http\Controllers\SchoolsController::class,'admin_page'])->middleware(\App\Http\Middleware\SchoolOwner::class);;
//    Route::get('/school/edit',[\App\Http\Controllers\SchoolsController::class,'edit']);
    Route::get('/schools/{school}/edit/languages',[\App\Http\Controllers\LanguagesController::class,'index'])->middleware(\App\Http\Middleware\SchoolOwner::class);;
    Route::post('/schools/{school}/edit/languages/store',[\App\Http\Controllers\SchoolLanguageController::class,'store'])->middleware(\App\Http\Middleware\SchoolOwner::class);;
    Route::post('/schools/{school}/edit/languages/delete',[\App\Http\Controllers\SchoolLanguageController::class,'destroy'])->middleware(\App\Http\Middleware\SchoolOwner::class);;
    Route::get('/schools/{school}/{class}/applications',[\App\Http\Controllers\ClassesController::class,'show'])->middleware(\App\Http\Middleware\ClassOwner::class);
    Route::get('/schools/{school}/{class}/applications/lists',[\App\Http\Controllers\ClassesController::class,'generate_lists'])->middleware(\App\Http\Middleware\ClassOwner::class);
    Route::get('/schools/{school}/{class}/applications/lists/export_csv',[\App\Http\Controllers\CsvExportController::class,'exportCsv'])->middleware(\App\Http\Middleware\ClassOwner::class);
    Route::get('/schools/{school}/{class}/applications/restore',[\App\Http\Controllers\ClassesController::class,'restore'])->middleware(\App\Http\Middleware\ClassOwner::class);
    Route::get('/schools/{school}/{class}/applications/{app}/exam',[\App\Http\Controllers\ApplicationsController::class,'exam_check']);
    Route::post('/schools/{school}/{class}/applications/{app}/exam/save',[\App\Http\Controllers\ApplicationsController::class,'exam_save']);
    Route::get('/schools/{school}/{class}/applications/{app}/certificate',[\App\Http\Controllers\ApplicationsController::class,'certificate_check']);
    Route::post('/schools/{school}/{class}/applications/{app}/certificate/save',[\App\Http\Controllers\ApplicationsController::class,'certificate_save']);
    Route::get('/schools/{school}/{class}/applications/{app}/add_info',[\App\Http\Controllers\ApplicationsController::class,'add_info_check']);
    Route::post('/schools/{school}/{class}/applications/{app}/add_info/save',[\App\Http\Controllers\ApplicationsController::class,'add_info_save']);
    Route::get('/schools/unlocker',[\App\Http\Controllers\ApplicationsController::class,'unlocker']);
    Route::post('/schools/unlock',[\App\Http\Controllers\ApplicationsController::class,'unlock']);
    Route::get('/app/{app}/drop',[\App\Http\Controllers\AppStatusController::class,'drop_app']);
    Route::get('/app/{app}/restore',[\App\Http\Controllers\AppStatusController::class,'restore_app']);
    Route::get('/y_school',function (){
        $school=\App\Models\schools::all()->where('user_id','=',Auth::user()->id);
        return redirect('schools/'.arr::first($school)->id.'/admin');
    });
});
Route::resource('/schools',\App\Http\Controllers\SchoolsController::class);
Route::get('/contact',function(){
    return view('contact');
});

Route::resource('{school_id}/classes',\App\Http\Controllers\ClassesController::class);


Route::get('/middle/{id}', function () {
return('działa');
})->middleware(\App\Http\Middleware\SchoolOwner::class);
