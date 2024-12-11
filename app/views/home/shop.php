<?php
    $title = 'محصولات';
    require_once 'layouts/top-nav.php';
?>


<main>
    <div class="shop-products">
        <section class="products">
            <h2>سفارشات</h2>
            <div class="product-list">

                <?php foreach ($orders as $order) { ?>
                <div class="product-item">
                    <a href="#">
                        <img class="img-banner" src="../../../../../../final-project/website/public/assets/home-image/logo.jpg" alt="Avatar">
                    </a>
                    <div class="description">
                        این مشخصات محصول فلان با قیمت<br>1,200,000 تومان<br>است.
                    </div>
                    <div class="buttons">
                        <a class="show-button-shop" href="#">
                            +
                        </a>
                        <div class="count">
                            3
                        </div>
                        <a class="shop-button-shop" href="#">
                            -
                        </a>
                    </div>
                </div>
                <?php }; ?>

            </div>

            <div class="order">
                <a href="#">پرداخت</a>
            </div>
        </section>
    </div>
</main>

<?php
    require_once 'layouts/footer.php';

    unset($title);
    unset($orders);
    unset($order);
?>
