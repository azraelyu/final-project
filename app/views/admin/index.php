<?php
$title = 'پنل ادمین';
require_once 'layouts/top-nav.php';
?>


<main>
    <section class="products">
        <div class="product-list">

            <?php foreach ($products as $product) { ?>
            <div class="product-item">
                <a href="<?php echo url("admin/edit/{$product['id']}/show"); ?>">
                    <img class="img-banner" src="<?php echo asset($product['image']); ?>" alt="Avatar">
                </a>
                <div class="description">
                    <?php echo $product['description']; ?> <br> <?php echo number_format($product['price']); ?> <br> است.
                </div>
                <div class="buttons">
                    <a class="show-button" href="<?php echo url("admin/edit/{$product['id']}/show"); ?>">
                        ویرایش
                    </a>
                    <a class="shop-button" href="<?php echo url("admin/remove/{$product['id']}"); ?>">
                        حذف
                    </a>
                </div>
            </div>
            <?php } ?>

        </div>
    </section>
</main>


<?php
require_once 'layouts/footer.php';

unset($title);
unset($products);
unset($product);
?>
