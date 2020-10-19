<?php

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

        /* if (! in_array($locale, ['en', 'de'])) {
            abort(400);
        } */


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/job', App\Http\Controllers\JobController::class);

});
