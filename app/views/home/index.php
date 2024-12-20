<?php
$title = 'صفحه اصلی';
require_once 'layouts/top-nav.php';

$bigBanners = array_slice($banners, 0, 2);
$smallBanners = array_slice($banners, 2);
?>


<main>
    <section class="banner">
        <h2>محصولات پر فروش</h2>
        <div class="banner-carousel">
            <div class="banner-wrapper">
                <div class="banner-item-small">
                    <a href="<?php echo url("public/show/{$smallBanners[0]['id']}"); ?>">
                        <img class="img-banner" src="<?php echo asset($smallBanners[0]['image']); ?>" alt="Avatar">
                    </a>
                </div>

                <?php foreach ($bigBanners as $banner): ?>
                <div class="banner-item-big">
                    <a href="<?php echo url("public/show/{$banner['id']}"); ?>">
                        <img class="img-banner" src="<?php echo asset($banner['image']); ?>" alt="Avatar">
                    </a>
                </div>
                <?php endforeach; ?>

                <div class="banner-item-small">
                    <a href="<?php echo url("public/show/{$smallBanners[1]['id']}"); ?>">
                        <img class="img-banner" src="<?php echo asset($smallBanners[1]['image']); ?>" alt="Avatar">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="products">
        <h2>محصولات</h2>
        <div class="product-list">

            <?php foreach ($products as $product): ?>
            <div class="product-item">
                <a href="<?php echo url("public/show/{$product['id']}"); ?>">
                    <img class="img-banner" src="<?php echo asset($product['image']); ?>" alt="Avatar">
                </a>
                <div class="description">
                    <?php echo $product['description']; ?>
                    <br> <?php echo number_format(ceil($product['price'])); ?> تومان
                    <br>است.
                </div>
                <div class="buttons">
                    <a class="show-button" href="<?php echo url("public/show/{$product['id']}"); ?>">
                        مشاهده
                    </a>

                    <?php if (isset($_SESSION['id'])) { ?>
                    <a class="shop-button" href="<?php echo url("shop/ord/{$product['id']}/{$_SESSION['id']}"); ?>">
                        افزودن به سبد خرید
                    </a>
                    <?php } else { ?>
                    <a class="shop-button" href="<?php echo url("authentication/login/show"); ?>">
                        ورود برای خرید
                    </a>
                    <?php } ?>

                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <div class="pagination">
            <div class="move-button">
                <?php $move = $page - 1; ?>
                <a href="<?php echo url("public/page/{$move}"); ?>"><?php echo $page > 1 ? 'قبل >' : ''; ?></a>
            </div>

            <?php if ($page < $countOfPages) { ?>
            <div class="move-button">
                <?php $move = $page + 1; ?>
                <a href="<?php echo url("public/page/{$move}"); ?>"><?php echo $page + 1; ?></a>
            </div>
            <?php }; ?>

            <?php if ($page + 1 < $countOfPages) { ?>
            <div class="move-button">
                <?php $move = $page + 2; ?>
                <a href="<?php echo url("public/page/{$move}"); ?>"><?php echo $page + 2; ?></a>
            </div>
            <?php }; ?>

            <?php if ($page + 2 < $countOfPages) { ?>
            <div class="move-button">
                <?php $move = $page + 3; ?>
                <a href="<?php echo url("public/page/{$move}"); ?>"><?php echo $page + 3; ?></a>
            </div>
            <?php }; ?>

            <div class="move-button">
                <?php $move = $page + 1; ?>
                <a href="<?php echo url("public/page/{$move}"); ?>"><?php echo $page < $countOfPages ? '< بعد' : ''; ?></a>
            </div>
        </div>
    </section>
</main>


<?php
require_once 'layouts/footer.php';

unset($title);
unset($bigBanners);
unset($smallBanners);
unset($banners);
unset($banner);
unset($allProducts);
unset($products);
unset($product);
unset($countOfProducts);
unset($countOfPages);
unset($page);
unset($move);
?>
