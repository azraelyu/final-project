<?php

require_once dirname(__DIR__) . '/app/controllers/Home/HomeController.php';
require_once dirname(__DIR__) . '/app/controllers/Home/UserController.php';

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

echo '404 - not found!!!';
exit;
