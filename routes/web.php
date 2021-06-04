<?php

use App\Http\Controllers\MyWaifuController;
use App\Http\Controllers\ReviewController;
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
    Route::get('/my-waifu', [MyWaifuController::class, 'index'])->name('my-waifu.index');
    Route::get('/my-waifu/create', [MyWaifuController::class, 'create'])->name('my-waifu.create');
    Route::post('/my-waifu/create', [MyWaifuController::class, 'store'])->name('my-waifu.store');
    Route::get('/my-waifu/{waifu:slug}', [MyWaifuController::class, 'show'])->name('my-waifu.show');
    Route::delete('/my-waifu/{waifu:slug}', [MyWaifuController::class, 'destroy'])->name('my-waifu.destroy');
    Route::get('/my-waifu/{waifu:slug}/edit', [MyWaifuController::class, 'edit'])->name('my-waifu.edit');
    Route::patch('/my-waifu/{waifu:slug}/edit', [MyWaifuController::class, 'update'])->name('my-waifu.update');

    Route::get('/waifu', [WaifuController::class, 'index'])->name('waifu.index');
    Route::get('/waifu/random', [WaifuController::class, 'random'])->name('waifu.random');
    Route::get('/waifu/{waifu:slug}', [WaifuController::class, 'show'])->name('waifu.show');

    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');
});

require __DIR__ . '/auth.php';
