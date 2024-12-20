<?php
$title = 'صفحه پرداخت';
require_once 'layouts/top-nav.php';
?>


<main>
    <div class="shop-products">
        <div>
            هزینه کل محصولات شما برابر است با <br> <?php 
                $price = 0;
                foreach ($products as $key=>$product) {
                    $price += $product['price'] * $items[$key]['number'];
                }
                echo number_format($price);
            ?> <br>
            پس از نوشتن پلاگین پرداخت این صفحه تکمیل خواهد شد.
        </div>

        <div>
            <a href="<?php echo url("shop/payed/{$_SESSION['id']}"); ?>">پرداخت انجام شد</a>
        </div>
    </div>
</main>

<?php
require_once 'layouts/footer.php';

unset($title);
unset($price);
unset($products);
unset($product);
unset($price);
?>
