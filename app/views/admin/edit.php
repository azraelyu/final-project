<?php
$title = 'تغییر مشخصات محصول';
require_once 'layouts/top-nav.php';
?>


<main>
    <form class="show-product" action="<?php echo url("admin/edit/{$product['id']}/store"); ?>" enctype="multipart/form-data" method="POST">
        <div class="product-img">
            <img src="<?= asset($product['image']) ?>" alt="Avatar">
        </div>
        <div class="product-text">
            <label for="image">عکس:</label>
            <br>
            <input name="image" id="image" type="file">
            <br>
            <label for="description">مشخصات:</label>
            <textarea id="description" name="description" rows="4" cols="50">
                <?= $product['description'] ?>
            </textarea>
            <br>
            <label for="price">قیمت:&nbsp;&nbsp;</label>
            <input id="price" name="price" type="number" placeholder="<?= number_format($product['price']) ?>">
            <br>
            <label for="discount">تخفیف:</label>
            <input id="discount" name="discount" type="number" placeholder="<?= $product['discount'] ?>">
        </div>
        <div class="product-button">
            <button class="" type="submit" style="margin-right: 70%;">تایید</button>
        </div>
    </form>
</main>


<?php
require_once 'layouts/footer.php';

unset($title);
unset($product);
?>
