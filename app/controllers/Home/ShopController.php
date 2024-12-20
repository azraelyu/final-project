<?php

namespace App\Controllers\Home;

use App\Models\Home\Product;
use App\Models\Home\Order;
use App\Models\Home\OrderItems;
use App\Models\Home\Payment;

require_once dirname(dirname(__DIR__)) . '/models/Home/Product.php';
require_once dirname(dirname(__DIR__)) . '/models/Home/Order.php';
require_once dirname(dirname(__DIR__)) . '/models/Home/OrderItems.php';
require_once dirname(dirname(__DIR__)) . '/models/Home/Payment.php';


class ShopController {
    private $productModel;
    private $orderModel;
    private $orderItemsModel;
    private $paymentModel;

    public function __construct() {
        $this->productModel = new Product(dbConnect());
        $this->orderModel = new Order(dbConnect());
        $this->orderItemsModel = new OrderItems(dbConnect());
        $this->paymentModel = new Payment(dbConnect());
    }

    public function index($user) {
        $order = $this->orderModel->getUserActiveOrders($user);
        if ($order) {
            $items = $this->orderItemsModel->getOrderItems($order['id']);
            $products = [];
            foreach ($items as $item) {
                array_push($products, $this->productModel->getProduct($item['product_id']));
            }
        } else {
            $items = '';
        }
        require_once dirname(dirname(__DIR__)) . '/views/Home/shop.php';
    }

    public function add($order_item) {
        $orItems = $this->orderItemsModel->addNumber($order_item);
        redirectBack();
        return;
    }

    public function dec($order_item) {
        $orItems = $this->orderItemsModel->decNumber($order_item);
        redirectBack();
        return;
    }

    public function ord($product ,$user) {
        $order = $this->orderModel->getUserActiveOrders($user);
        if ($order) {
            $orItems = $this->orderItemsModel->haveProduct($order['id'], $product);
            if ($orItems) {
                $this->orderItemsModel->addNumber($orItems[0]['id']);
            } else {
                $product = $this->productModel->getProduct($product);
                $this->orderItemsModel->crateItem($order['id'], $product);
            }
        } else {
            $this->orderModel->createOrd($user);
            $order = $this->orderModel->getUserActiveOrders($user);
            $product = $this->productModel->getProduct($product);
            $this->orderItemsModel->crateItem($order['id'], $product);
        }
        redirectBack();
        return;
    }

    public function pay($user) {
        $order = $this->orderModel->getUserActiveOrders($user);
        if ($order) {
            $items = $this->orderItemsModel->getOrderItems($order['id']);
        }
        $products = [];
        foreach ($items as $item) {
            array_push($products, $this->productModel->getProduct($item['product_id']));
        }
        require_once dirname(dirname(__DIR__)) . '/views/Home/pay.php';
    }

    public function payed($user) {
        // $amount = 1;
        // $user_id = $user;
        // $gateway = 'Saman-Bank';
        // $transaction_id = 1;
        // $bank_first_response = 'yes';
        // $bank_second_response = 'yes';

        $this->paymentModel->create($user);
        $payment = $this->paymentModel->getPayment($user);
        $this->paymentModel->change($payment['id']);
        $this->orderModel->pay($payment['id'], $user);

        redirect(url('public/page/1'));
        return;
    }

    public function __destruct() {
        unset($this->productModel);
        unset($this->orderModel);
        unset($this->orderItemsModel);
        unset($this->paymentModel);
    }
}
