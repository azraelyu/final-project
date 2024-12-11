<?php

namespace App\Controllers\Home;

use App\Models\Home\Product;
use App\Models\Home\Order;

require_once dirname(dirname(__DIR__)) . '/models/Home/Product.php';
require_once dirname(dirname(__DIR__)) . '/models/Home/Order.php';


class ShopController {
    private $productModel;
    private $orderModel;

    public function __construct() {
        $this->productModel = new Product(dbConnect());
        $this->orderModel = new Order(dbConnect());
    }

    public function index($user) {
        $orders = $this->orderModel->getAllUserOrder($user);
        require_once dirname(dirname(__DIR__)) . '/views/Home/shop.php';
    }

    public function show($id) {
        $product = $this->productModel->getProduct($id);
        require_once dirname(dirname(__DIR__)) . '/views/Home/show.php';
    }

    public function __destruct() {
        unset($this->productModel);
        unset($this->orderModel);
    }
}
