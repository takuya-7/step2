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
Route::get('/', [App\Http\Controllers\TopController::class, 'index'])->name('top');

Route::group(['middleware' => 'auth'], function() {
    // マイページ
    Route::get('/mypage', [App\Http\Controllers\UsersController::class, 'mypage'])->name('mypage');
    // プロフィール登録・編集
    Route::get('/profile/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('profile.edit');
    // プロフィール更新処理
    Route::patch('/profile/edit', [App\Http\Controllers\UsersController::class, 'update'])->name('profile.update');
    // パスワード変更
    // Route::get('/profile/password', [App\Http\Controllers\UsersController::class, 'updatePassword'])->name('profile.password');

    // STEP投稿画面
    Route::get('/steps/new', [App\Http\Controllers\StepsController::class, 'new'])->name('steps.new');
    // STEP登録処理
    Route::post('/steps', [App\Http\Controllers\StepsController::class, 'create'])->name('steps.create');
    // STEP編集画面
    Route::get('/steps/{id}/edit', [App\Http\Controllers\StepsController::class, 'edit'])->name('steps.edit');
    // STEP更新処理
    Route::post('/steps/{id}/edit', [App\Http\Controllers\StepsController::class, 'update'])->name('steps.update');

    // STEPチャレンジ登録・解除
    Route::get('/steps/challenge/{step}', [App\Http\Controllers\ChallengesController::class, 'challenge'])->name('challenge');
    Route::get('/steps/unchallenge/{step}', [App\Http\Controllers\ChallengesController::class, 'unchallenge'])->name('unchallenge');

    // 子STEPクリア
    Route::get('/steps/clear/{step}', [App\Http\Controllers\ChallengesController::class, 'clear'])->name('clear');
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
