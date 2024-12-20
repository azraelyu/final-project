<?php
$title = 'اضافه کردن محصول';
require_once 'layouts/top-nav.php';
?>


<main>
    <form class="show-product" action="<?= url('admin/add') ?>" enctype="multipart/form-data" method="POST">
        <div class="product-text">
            <label for="image">عکس:</label>
            <br>
            <input type="file" name="image" id="image">
            <br>
            <label for="description">مشخصات:</label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea>
            <br>
            <label for="price">قیمت:&nbsp;&nbsp;</label>
            <input id="price" name="price" type="number" placeholder="1,200,000">
            <br>
            <label for="discount">تخفیف:</label>
            <input id="discount" name="discount" type="ratio" placeholder="10%">
        </div>
        <div class="product-button">
            <button class="" type="submit" style="margin-right: 70%;">تایید</button>
        </div>
    </form>
</main>


<?php
require_once 'layouts/footer.php';

unset($title);
?>
