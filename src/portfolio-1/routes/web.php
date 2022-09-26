<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

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

/* 会員登録 */

Route::get('register', App\Http\Livewire\Auth\Register::class)
    ->name('register')
    ->middleware('guest');

/* ログイン */

Route::get('login', App\Http\Livewire\Auth\Login::class)
    ->name('login')
    ->middleware('guest');

/* ログアウト */

Route::get('logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/* 退会 */

Route::get('withdrawal', [AuthController::class, 'withdrawal'])
    ->middleware('auth')
    ->name('withdrawal');

/* パスワード再設定 */

Route::get('password/email', App\Http\Livewire\Auth\SendPasswordResetEmail::class)
    ->name('password.email')
    ->middleware('guest');

Route::get('password/reset/{token}', App\Http\Livewire\Auth\ResetForgotPassword::class)
    ->name('password.reset')
    ->middleware('guest');

Route::get('settings/password/reset', App\Http\Livewire\Auth\ResetPassword::class)
    ->name('settings.password.reset')
    ->middleware('verified');

/* メール認証 */

Route::get('email/verify', App\Http\Livewire\Auth\Verification::class)
    ->middleware('auth')
    ->name('verification.notice');

Route::get('email/verify/{id}/{hash}', [App\Http\Livewire\Auth\Verification::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('email/resend', [App\Http\Livewire\Auth\Verification::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.resend');

/* 認証メアド再登録*/

Route::get('email/reset', App\Http\Livewire\Auth\ResetEmail::class)
    ->middleware('auth')
    ->name('email.reset');

Route::get('settings/email/reset', App\Http\Livewire\Auth\ResetEmail::class)
    ->middleware('auth')
    ->name('settings.email.reset');

/* お届け先 */

Route::get('settings/addressee/reset', App\Http\Livewire\Auth\ResetAddressee::class)
    ->name('settings.addressee.reset')
    ->middleware('verified');





/* トップ */

Route::get('/', App\Http\Livewire\Top::class)
    ->name('top');

/* 商品 */

Route::get('products', App\Http\Livewire\Products::class)
    ->name('products');

/* 商品詳細 */

Route::get('products/detail', App\Http\Livewire\ProductDetail::class)
    ->name('products.detail');

/* アクセス */

Route::get('access', App\Http\Livewire\Access::class)
    ->name('access');

/* ホーム */
Route::get('home', App\Http\Livewire\Home::class)
    ->name('home')
    ->middleware('verified');

/* 問い合わせ */

Route::get('contact', App\Http\Livewire\Contact::class)
    ->name('contact')
    ->middleware('verified');

/* お気に入り */

Route::get('fav-list', App\Http\Livewire\FavList::class)
    ->name('fav-list');

/* カート */

Route::get('cart', App\Http\Livewire\Cart::class)
    ->name('cart');

/* 注文 */

Route::get('order', App\Http\Livewire\Order::class)
    ->name('order')
    ->middleware('verified');

/* 注文履歴 */

Route::get('order/history', App\Http\Livewire\OrderHistory::class)
    ->name('order.history')
    ->middleware('verified');
