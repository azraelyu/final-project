<?php

require_once dirname(__DIR__) . '/app/controllers/Home/HomeController.php';
require_once dirname(__DIR__) . '/app/controllers/Home/UserController.php';
require_once dirname(__DIR__) . '/app/controllers/Home/ShopController.php';
require_once dirname(__DIR__) . '/app/controllers/Admin/ProductController.php';

/* User side links */

// Products
uri('/public/page/{$page}', 'App\Controllers\Home\HomeController', 'index');
uri('/public/show/{id}', 'App\Controllers\Home\HomeController', 'show');

// Login-register
uri('/authentication/register/show', 'App\Controllers\Home\UserController', 'register');
uri('/authentication/register/store', 'App\Controllers\Home\UserController', 'registerStore', 'POST');
uri('/authentication/login/show', 'App\Controllers\Home\UserController', 'login');
uri('/authentication/login/check', 'App\Controllers\Home\UserController', 'loginCheck', 'POST');
uri('/authentication/logout/{user}', 'App\Controllers\Home\UserController', 'logout');

// Shop
uri('/shop/show/{id}', 'App\Controllers\Home\ShopController', 'index');
uri('/shop/add/{order_item}', 'App\Controllers\Home\ShopController', 'add');
uri('/shop/dec/{order_item}', 'App\Controllers\Home\ShopController', 'dec');
uri('/shop/ord/{product}/{user}', 'App\Controllers\Home\ShopController', 'ord');
uri('/shop/pay/show/{user}', 'App\Controllers\Home\ShopController', 'pay');
uri('/shop/payed/{user}', 'App\Controllers\Home\ShopController', 'payed');

/* \(._.)/ */


/* Admin side links */

// Shop
uri('/admin/show', 'App\Controllers\Admin\ProductController', 'index');
uri('/admin/edit/{product}/show', 'App\Controllers\Admin\ProductController', 'edit');
uri('/admin/edit/{product}/store', 'App\Controllers\Admin\ProductController', 'store', 'POST');
uri('/admin/add/show', 'App\Controllers\Admin\ProductController', 'addShow');
uri('/admin/add', 'App\Controllers\Admin\ProductController', 'add', 'POST');
uri('/admin/remove/{product}', 'App\Controllers\Admin\ProductController', 'remove');


echo '404 - not found!!!';
exit;
