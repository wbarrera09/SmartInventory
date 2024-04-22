<?php

use App\Http\Controllers\DownloadCategoryPDF;
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
    return view('welcome');
});

Route::prefix('generate-pdf')->name('generate-pdf.')
    ->group(function () {
        Route::controller(DownloadCategoryPDF::class)->group(function () {
            Route::get('category-report/{record}', 'category')->name('category.report');
        });
    });


