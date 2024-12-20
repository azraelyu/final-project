<?php

namespace App\Controllers\Admin;

use App\Models\Home\Product;
use App\Models\Home\User;

require_once dirname(dirname(__DIR__)) . '/models/Home/Product.php';
require_once dirname(dirname(__DIR__)) . '/models/Home/User.php';


class ProductController {
    private $productModel;
    private $userModel;

    public function __construct() {
        $this->productModel = new Product(dbConnect());
        $this->userModel = new User(dbConnect());
    }

    public function index() {
        if (!isset($_SESSION['id'])) {
            redirect(url('authentication/login/show'));
            return;
        }
        $isAdmin = $this->userModel->isAdmin($_SESSION['id']);
        if (!$isAdmin) {
            redirect(url('public/page/1'));
            return;
        }
        $products = $this->productModel->getAllProducts();
        require_once dirname(dirname(__DIR__)) . '/views/admin/index.php';
    }

    public function edit($product) {
        $product = $this->productModel->getProduct($product);
        require_once dirname(dirname(__DIR__)) . '/views/admin/edit.php';
    }

    public function store($request, $product) {
        $product = $this->productModel->getProduct($product);
        $id = $product['id'];
        $product = array_slice($product, 1, 4);
        if ($request['price']) { $product['price'] = intval($request['price']); }
        if ($request['discount']) { $product['discount'] = intval($request['discount']); }
        if ($request['description']) { $product['description'] = trim($request['description']); }
        if ($request['image'])
        $targetDir = BASE_PATH . '/public/assets/home-image/';
        $name = basename($request['image']['name']);
        $targetFile = $targetDir . $name;
        if ($request['image']['error'] === 0) {
            if (!file_exists($targetFile)) {
                // if (move_uploaded_file($request['tmp_name'], $targetFile)) {
                // echo "The file has been uploaded successfully to " . $targetFile;
                // } else {
                //     echo "Sorry, there was an error uploading your file.";
                // }
                move_uploaded_file($request['image']['tmp_name'], $targetFile);
            }
        } else {
            echo "Error: " . $request['image']['error'];
        }
        $product['image'] = "home-image/$name";
        $this->productModel->update($product, $id);
        redirect(url('admin/show'));
        return;
    }

    public function addShow() {
        require_once dirname(dirname(__DIR__)) . '/views/admin/add.php';
    }

    public function add($request) {
        if (!isset($request['image']['tmp_name']) || $request['image']['tmp_name'] == '' || !isset($request['description']) || $request['description'] == '' || !isset($request['price']) || $request['price'] == '' || !isset($request['discount']) || $request['discount'] == '') {
            redirect(url('admin/add/show'));
            return;
        }
        $targetDir = BASE_PATH . '/public/assets/home-image/';
        $name = basename($request['image']['name']);
        $targetFile = $targetDir . $name;
        if ($request['image']['error'] === 0) {
            if (!file_exists($targetFile)) {
                move_uploaded_file($request['image']['tmp_name'], $targetFile);
            }
        } else {
            echo "Error: " . $request['image']['error'];
        }
        $request['image'] = "home-image/$name";
        $this->productModel->create($request);
        redirect(url('admin/show'));
        return;
    }

    public function remove($product) {
        $product = $this->productModel->getProduct($product);
        $targetDir = BASE_PATH . '/public/assets/' . $product['image'];
        if (file_exists($targetDir)) {
            unlink($targetDir);
        }
        $this->productModel->remove($product['id']);
        redirect(url('admin/show'));
        return;
    }

    public function __destruct() {
        unset($this->productModel);
        unset($this->userModel);
    }
}
