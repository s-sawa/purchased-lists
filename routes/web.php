<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Purchase\IndexController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//データ表示用
Route::get('/', [IndexController::class, 'getData'])->middleware(['auth'])->name('index');
// Route::post('/create', [IndexController::class, 'createList'])->name('create');

//データ追加用
Route::post('/lists', [IndexController::class, "store"])->name('lists_store');

//詳細ページ
Route::get('/detail/{id}', [IndexController::class, "detail"]);

//ajax
Route::post('/ajax', [IndexController::class, "ajax"])->name('ajax');

//更新
Route::post('/list/update', [IndexController::class, "update"])->name('list_update');

//削除 削除ボタンよう
// Route::delete('/list/{listId}', [ IndexController::class, "destroy"])->name('list_destroy');

//削除ajax
// Route::post( '/delete/{id}', function(){
//     return view('dashboard');
// });
Route::post('/delete/{id}', [IndexController::class, "ajaxDestroy"])->name('list_destroy');

require __DIR__ . '/auth.php';