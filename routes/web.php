<?php

use Illuminate\Http\Request;
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


Route::get('/', function (Request $request) {
    $locales = config('app.available_locales');
    $language = $request->server('HTTP_ACCEPT_LANGUAGE');
    $locale = explode('-', $language)[0];
    $locale = in_array($locale, $locales) ? $locale : app()->getLocale();
    return redirect($locale);
});

Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'sitemapindex_xml'])->name('sitemapindex');
Route::get('/sitemap_{locale}.xml', [App\Http\Controllers\SitemapController::class, 'sitemap_xml'])->name('sitemap');

Route::group([
    'prefix' => '{locale}',
    //'where' => ['locale' => '[a-zA-Z]{2}'], // only 2 letters
    'middleware' => 'setlocale', // Setting locale
], function() {

    Auth::routes();

    Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome.index');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('privacy', App\Http\Controllers\PrivacyController::class);

    Route::resource('documentations', App\Http\Controllers\DocumentationsController::class);

    Route::resource('account', App\Http\Controllers\AccountController::class);
    Route::get('/account/edit/password', [App\Http\Controllers\AccountController::class, 'edit_password'])->name('account.edit_password');
    Route::patch('/account/update/password', [App\Http\Controllers\AccountController::class, 'update_password'])->name('account.update_password');

    Route::resource('jobs', App\Http\Controllers\JobsController::class);
    Route::get('/jobs/{job}/delete', [App\Http\Controllers\JobsController::class, 'delete'])->name('jobs.delete');

    Route::group([
        'prefix' => 'admin',
        'middleware' => [
            'auth',
        ],
    ], function() {
        $locale = \App::getLocale();

    });

    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => [
            'auth',
            'role:developer|admin'
        ],
    ], function() {
        Route::get('/', function (Request $request) {
            #dd($request);
            $locale = \App::getLocale();
            return redirect()->route('admin.dashboard.index', $locale);
        });
        Route::resource('dashboard', App\Http\Controllers\Admin\DashboardController::class);
        Route::resource('accounts', App\Http\Controllers\Admin\AccountsController::class);
        Route::resource('jobs', App\Http\Controllers\Admin\JobsController::class);
    });

});

