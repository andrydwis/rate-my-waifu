<?php

use App\Http\Controllers\WaifuController;
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
})->name('root.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-waifu', [WaifuController::class, 'index'])->name('my-waifu.index');
    Route::get('/my-waifu/create', [WaifuController::class, 'create'])->name('my-waifu.create');
    Route::post('/my-waifu/create', [WaifuController::class, 'store'])->name('my-waifu.store');
    Route::get('/my-waifu/{waifu:slug}', [WaifuController::class, 'show'])->name('my-waifu.show');
});

require __DIR__ . '/auth.php';
