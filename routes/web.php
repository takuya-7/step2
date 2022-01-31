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

// トップページ
Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'auth'], function() {
    // マイページ
    Route::get('/mypage', [App\Http\Controllers\UsersController::class, 'mypage'])->name('mypage');
    // プロフィール登録・編集
    Route::get('/profile/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('profile.edit');
    // パスワード変更
    Route::get('/profile/password', [App\Http\Controllers\UsersController::class, 'updatePassword'])->name('profile.password');

    // STEP投稿画面
    Route::get('/steps/new', [App\Http\Controllers\StepsController::class, 'new'])->name('steps.new');
    // STEP登録処理
    Route::post('/steps', [App\Http\Controllers\StepsController::class, 'create'])->name('steps.create');
    // STEP編集
    Route::get('/steps/{id}/edit', [App\Http\Controllers\StepsController::class, 'edit'])->name('steps.edit');
});

// STEP一覧
Route::get('/steps', [App\Http\Controllers\StepsController::class, 'index'])->name('steps');
// STEP詳細
Route::get('/steps/{id}', [App\Http\Controllers\StepsController::class, 'show'])->name('steps.show');
// 子STEP詳細
Route::get('/steps/{id}/{order}', [App\Http\Controllers\StepsController::class, 'showChild'])->name('steps.showChild');

// サイトマップ
Route::get('/sitemap', function () {
    return view('sitemap');
})->name('sitemap');


// デフォルト設定↓

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
