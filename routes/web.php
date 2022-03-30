<?php

use App\Http\Controllers\CollectionController;
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

Route::get('average', [CollectionController::class, 'average'])->name('average');
Route::get('max', [CollectionController::class, 'max'])->name('max');

Route::get('median', [CollectionController::class, 'median'])->name('median');
Route::get('min', [CollectionController::class, 'min'])->name('min');
Route::get('collapse', [CollectionController::class, 'collapse'])->name('collapse');