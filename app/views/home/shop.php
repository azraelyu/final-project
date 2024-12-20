<?php
$title = 'سبد خرید';
require_once 'layouts/top-nav.php';
?>


<main>
    <div class="shop-products">
        <section class="products">
            <h2>سفارشات</h2>
            <div class="product-list">

                <?php if ($items) foreach ($products as $key=>$product) { ?>
                <div class="product-item">
                    <a href="<?php echo url("public/show/{$product['id']}"); ?>">
                        <img class="img-banner" src="<?php echo asset($product['image']); ?>" alt="Avatar">
                    </a>
                    <div class="description">
                        <?php echo $product['description']; ?> <br><?php echo number_format($items[$key]['number'] * $product['price']); ?> <br> است.
                    </div>
                    <div class="buttons">
                        <a class="show-button-shop" href="<?php echo url("shop/add/{$items[$key]['id']}"); ?>">
                            +
                        </a>
                        <div class="count">
                            <?php echo $items[$key]['number'] ?>
                        </div>
                        <a class="shop-button-shop" href="<?php echo url("shop/dec/{$items[$key]['id']}"); ?>">
                            -
                        </a>
                    </div>
                </div>
                <?php } else { echo 'سبد خرید خالی است.'; } ?>

            </div>

            <?php if ($items) { ?>
            <div class="order">
                <a href="<?php echo url("shop/pay/show/{$_SESSION['id']}"); ?>">پرداخت</a>
            </div>
            <?php } else { ?>
            <div class="order">
                <a href="<?php echo url("public/page/1"); ?>">برگشت</a>
            </div>
            <?php } ?>
        </section>
    </div>
</main>

<?php
require_once 'layouts/footer.php';

unset($title);
unset($items);
unset($item);
unset($orders);
unset($products);
unset($product);
?>
