<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


/* 会員登録 */

Breadcrumbs::for(
    'register',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('top')
        ->push('Register', route('register'))
);

/* ログイン */

Breadcrumbs::for(
    'login',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('top')
        ->push('Login', route('login'))
);

/* パスワード再設定 */

Breadcrumbs::for(
    'password.email',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('login')
        ->push('SendEmail', route('password.email'))
);

/*
NOTE:
ここで送った'token'の値を直接使うわけではないみたい（送り先で改めて取得していた）
なので適当な値でいいっぽい
※'token' も送らないとエラーになる
*/

Breadcrumbs::for(
    'password.reset',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('login')
        ->push('ResetPassword', route('password.reset', ['token' => 'temp_value']))
);

Breadcrumbs::for(
    'settings.password.reset',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('home')
        ->push('ResetPassword', route('settings.password.reset'))
);

/* メール認証 */

Breadcrumbs::for(
    'verification.notice',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('top')
        ->push('VerifyEmail', route('verification.notice'))
);

/* 認証メアド再登録 */

Breadcrumbs::for(
    'email.reset',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('verification.notice')
        ->push('ResetEmail', route('email.reset'))
);

Breadcrumbs::for(
    'settings.email.reset',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('home')
        ->push('ResetEmail', route('settings.email.reset'))
);

/* お届け先 */

Breadcrumbs::for(
    'settings.addressee.reset',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('home')
        ->push('ResetAddressee', route('settings.addressee.reset'))
);

/* トップ */

Breadcrumbs::for(
    'top',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->push('Top', route('top'))
);

/* 商品 */

Breadcrumbs::for(
    'products',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('top')
        ->push('Products', route('products'))
);

/* 商品詳細 */

Breadcrumbs::for(
    'products.detail',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('products')
        ->push('Detail', route('products.detail'))
);

/* アクセス */

Breadcrumbs::for(
    'access',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('top')
        ->push('Access', route('access'))
);

/* ホーム */

Breadcrumbs::for(
    'home',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('top')
        ->push('Home', route('home'))
);

/* 問い合わせ */

Breadcrumbs::for(
    'contact',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('home')
        ->push('Contact', route('contact'))
);

/* お気に入り */

Breadcrumbs::for(
    'fav-list',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('top')
        ->push('FavList', route('fav-list'))
);

/* カート */

Breadcrumbs::for(
    'cart',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('top')
        ->push('Cart', route('cart'))
);

/* 注文確認 */

Breadcrumbs::for(
    'order',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('cart')
        ->push('Order', route('order'))
);

/* 注文履歴 */

Breadcrumbs::for(
    'order.history',
    fn (BreadcrumbTrail $trail) =>
    $trail
        ->parent('home')
        ->push('OrderHistory', route('order.history'))
);
