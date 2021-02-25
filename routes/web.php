<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;
use Facade\FlareClient\Report;
use App\Http\Controllers;

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
Route::get('/' , function()
{
    return view('auth.login');
});



Route::resource('users','App\Http\Controllers\Admin\UserController');
Route::resource('screen','App\Http\Controllers\Admin\ScreenController');



Route::resource('report','App\Http\Controllers\Admin\ReportController');



//Route::get('report',[ReportController::class,'index']);
//register get method
//Route::get('/report',[Report::class,'report']);

Route::resource('userscreen','App\Http\Controllers\Admin\UserScreenController');
Route::resource('credit','App\Http\Controllers\CreditsController');
Route::get('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@authenticate');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
// Route::resource('dashboard','App\Http\Controllers\DashboardController')->name('dashboard');

Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');


Route::get('downloadPDF', 'App\Http\Controllers\DashboardController@downloadPDF')->name('downloadPDF');


Route::get('pdf', 'App\Http\Controllers\DashboardController@pdf')->name('dashboard.pdf');

Route::get('/dashboard/pdf',  'App\Http\Controllers\Dashboards@pdf');








