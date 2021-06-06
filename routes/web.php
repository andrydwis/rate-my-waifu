<?php

use App\Http\Controllers\MyWaifuController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RootController;
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

Route::get('/', [RootController::class, 'index'])->name('root.index');

Route::get('/about', [RootController::class, 'about'])->name('root.about');

Route::get('/waifu', [WaifuController::class, 'index'])->name('waifu.index');
Route::get('/waifu/random', [WaifuController::class, 'random'])->name('waifu.random');
Route::get('/waifu/top-love', [WaifuController::class, 'topLove'])->name('waifu.top-love');
Route::get('/waifu/top-meh', [WaifuController::class, 'topMeh'])->name('waifu.top-meh');
Route::post('/waifu/search', [WaifuController::class, 'search'])->name('waifu.search');
Route::get('/waifu/search/{keyword}', [WaifuController::class, 'result'])->name('waifu.result');
Route::get('/waifu/{waifu:slug}', [WaifuController::class, 'show'])->name('waifu.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-waifu', [MyWaifuController::class, 'index'])->name('my-waifu.index');
    Route::get('/my-waifu/gacha/{type}', [MyWaifuController::class, 'gacha'])->name('my-waifu.gacha');
    Route::post('/my-waifu/create', [MyWaifuController::class, 'store'])->name('my-waifu.store');
    Route::get('/my-waifu/{waifu:slug}', [MyWaifuController::class, 'show'])->name('my-waifu.show');
    Route::delete('/my-waifu/{waifu:slug}', [MyWaifuController::class, 'destroy'])->name('my-waifu.destroy');
    Route::get('/my-waifu/{waifu:slug}/edit', [MyWaifuController::class, 'edit'])->name('my-waifu.edit');
    Route::patch('/my-waifu/{waifu:slug}/edit', [MyWaifuController::class, 'update'])->name('my-waifu.update');

    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');

    Route::post('/rate', [RateController::class, 'store'])->name('rate.store');
});

require __DIR__ . '/auth.php';
