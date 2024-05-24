<?php

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Http\Controllers\DownloadCategoryPDF;
use App\Http\Controllers\DownloadProductPDF;
use App\Http\Controllers\DownloadUserPDF;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return view('welcome');
});

Route::prefix('generate-pdf')->name('generate-pdf.')
    ->group(function () {
        Route::controller(DownloadCategoryPDF::class)->group(function () {
            Route::get('category-report/{record}', 'category')->name('category.report');
        });
    });

Route::prefix('generate-pdf')->name('generate-pdf.')
    ->group(function () {
        Route::controller(DownloadProductPDF::class)->group(function () {
            Route::get('product-report/{record}', 'product')->name('product.report');
        });
    });

Route::prefix('generate-pdf')->name('generate-pdf.')
    ->group(function () {
        Route::controller(DownloadUserPDF::class)->group(function () {
            Route::get('user-report/{record}', 'user')->name('user.report');
        });
    });
