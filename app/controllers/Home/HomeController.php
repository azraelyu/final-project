<?php

namespace App\Controllers\Home;

use App\Models\Home\Product;

require_once dirname(dirname(__DIR__)) . '/models/Home/Product.php';


class HomeController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product(dbConnect());
    }

    public function index($page) {
        $countOfProducts = $this->productModel->getCountOfProducts();
        $countOfProducts = $countOfProducts['COUNT(*)'];
        $countOfPages = ceil($countOfProducts / 4);
        if ($page > $countOfPages) $page = 1;
        $allProducts = $this->productModel->getAllProducts();
        $products = array_slice($allProducts, ($page-1) * 4, 4);
        $banners = $this->productModel->getBanners();
        require_once dirname(dirname(__DIR__)) . '/views/Home/index.php';
    }

    public function show($id) {
        $product = $this->productModel->getProduct($id);
        require_once dirname(dirname(__DIR__)) . '/views/Home/show.php';
    }

    public function __destruct() {
        unset($this->productModel);
    }
}
