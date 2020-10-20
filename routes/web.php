<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return redirect(app()->getLocale());
});

Route::group([
    'prefix' => '{locale}',
    //'where' => ['locale' => '[a-zA-Z]{2}'], // only 2 letters
    'middleware' => 'setlocale', // Setting locale
], function() {

    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Route::middleware(['web', 'auth'])->group(function () {

        Route::resource('/job', App\Http\Controllers\JobController::class);

    //});

    Route::resource('/jobs', App\Http\Controllers\JobsController::class);

});

