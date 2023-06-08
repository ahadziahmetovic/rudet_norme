<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\WorkOrderController;
use Illuminate\Support\Facades\Auth;
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





//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\RecordController::class, 'records'])->name('home');


//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dates', [HomeController::class, 'dates'])->name('dates');
Route::get('/records', [RecordController::class, 'records'])->name('records');
/* Route::get('/reports', [RecordController::class, 'reports'])->name('reports'); */
Route::get('/records_list', [RecordController::class, 'records_list'])->name('records_list');
Route::get('/records_edit/{record}', [RecordController::class, 'update'])->name('records_edit');
Route::get('/records_delete/{record}', [RecordController::class, 'destroy'])->name('records_delete');
Route::get('/departments_delete/{department}', [DepartmentController::class, 'destroy'])->name('departments_delete');
Route::get('/series_deactivate/{serie}', [SerieController::class, 'destroy'])->name('series_deactivate');
Route::get('/workorder_detail/{value}', [WorkOrderController::class, 'show'])->name('workorder_detail');
Route::get('/workorder', [WorkOrderController::class, 'workorder'])->name('workorder');
Route::get('/newProduct', [ProductController::class, 'index'])->name('newProduct');
Route::get('/newSerie', [SerieController::class, 'index'])->name('newSerie');
Route::get('/workorder_details/{value}', [WorkOrderController::class, 'show'])->name('workorder_details');
Route::get('/newEmployee', [EmployeeController::class, 'index'])->name('newEmployee');
Route::get('/newDepartment', [DepartmentController::class, 'index'])->name('newDepartment');
Route::get('/newOperation', [OperationController::class, 'index'])->name('newOperation');
Route::post('createOperation', [OperationController::class, 'create']);
Route::post('createDepartment', [DepartmentController::class, 'create']);
Route::post('createEmployee', [EmployeeController::class, 'create']);
Route::post('createProduct', [ProductController::class, 'create']);
Route::post('createSerie', [SerieController::class, 'create']);
Route::post('vrati_proizvode', [ProductController::class, 'vrati_proizvode']);
Route::post('import_records', [RecordController::class, 'import_records']);
Route::post('import_workorder', [WorkOrderController::class, 'import_workorder']);
Route::get('/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);
Route::any('reports', [RecordController::class, 'reports'])->name('reports');
Route::any('reports_total', [RecordController::class, 'reports_total'])->name('reports_total');

		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

