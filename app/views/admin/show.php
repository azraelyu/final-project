<?php
    $title = 'تغییر مشخصات محصول';
    require_once 'layouts/top-nav.php';
?>


<main>
    <form class="show-product">
        <div class="product-img">
            <img src="../../../../../../final-project/website/public/assets/home-image/logo.jpg" alt="Avatar">
        </div>
        <div class="product-text">
            <label for="text">عکس:</label>
            <br>
            <input type="file">
            <br>
            <label for="text">مشخصات:</label>
            <textarea id="text" name="text" rows="4" cols="50">
                At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
            </textarea>
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
?>
