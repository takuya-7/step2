<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TopController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StepsController;
use App\Http\Controllers\ChallengesController;

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
Route::get('/', [TopController::class, 'index'])->name('top');

// ユーザー認証必要ページ
Route::group(['middleware' => 'auth'], function() {
    // マイページ
    Route::get('/mypage', [UsersController::class, 'mypage'])->name('mypage');
    // プロフィール登録・編集
    Route::get('/profile/edit', [UsersController::class, 'edit'])->name('profile.edit');
    // プロフィール更新処理
    Route::patch('/profile/edit', [UsersController::class, 'update'])->name('profile.update');

    // STEP投稿画面
    Route::get('/steps/new', [StepsController::class, 'new'])->name('steps.new');
    // STEP登録処理
    Route::post('/steps', [StepsController::class, 'create'])->name('steps.create');
    // STEP編集画面
    Route::get('/steps/{id}/edit', [StepsController::class, 'edit'])->name('steps.edit');
    // STEP更新処理
    Route::post('/steps/{id}/edit', [StepsController::class, 'update'])->name('steps.update');
    // STEP削除処理
    Route::post('/steps/{id}/delete', [StepsController::class, 'destroy'])->name('steps.delete');

    // 子STEP詳細
    Route::get('/steps/{id}/{order}', [StepsController::class, 'showChild'])->name('steps.showChild');

    // STEPチャレンジ登録・解除
    Route::post('/steps/challenge/{step_id}', [ChallengesController::class, 'challenge'])->name('challenge');
    Route::post('/steps/unchallenge/{step_id}', [ChallengesController::class, 'unchallenge'])->name('unchallenge');

    // 子STEPクリア
    Route::post('/steps/clear/{step}', [ChallengesController::class, 'clear'])->name('clear');
});

// STEP一覧
Route::get('/steps', [StepsController::class, 'index'])->name('steps');
// STEP詳細
Route::get('/steps/{id}', [StepsController::class, 'show'])->name('steps.show');

// サイトマップ
Route::get('/sitemap', function () {
    return view('sitemap');
})->name('sitemap');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
