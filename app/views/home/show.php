<?php
$title = 'مشخصات محصول';
require_once 'layouts/top-nav.php';
?>


<main>
    <?php if ($product != null) { ?>
    <div class="show-product">
        <div class="product-img">
            <img src="<?php echo asset($product['image']); ?>" alt="Avatar">
        </div>
        <div class="product-text">
            <?php echo $product['description']; ?>
            <br> <br>
            <?php echo number_format(ceil($product['price'])); ?>
            <br>
            تومان
        </div>
        <div class="product-button">
            <?php if (isset($_SESSION['id'])) { ?>
            <a class="shop-button" href="<?php echo url("shop/ord/{$product['id']}/{$_SESSION['id']}"); ?>">
                افزودن به سبد خرید
            </a>
            <?php } else { ?>
            <a class="shop-button" href="<?php echo url('authentication/login/show'); ?>">
                ورود برای خرید
            </a>
            <?php } ?>
        </div>
    </div>
    <?php } else {
        $id = 1;
        redirect(url("public/show/{$id}"));
    } ?>
</main>


<?php
require_once 'layouts/footer.php';

unset($title);
unset($product);
unset($id);
?>
