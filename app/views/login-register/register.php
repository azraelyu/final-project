<?php 
    $title = 'صفحه ثبت‌ نام';
    require_once 'layouts/top-nav.php';
?>


    <div class="container">
        <h2>ثبت‌ نام</h2>
        <form id="registerForm">
            <input type="text" placeholder="نام" required>
            <input type="text" placeholder="نام خانوادگی" required>
            <input type="email" placeholder="ایمیل یا شماره" required>
            <input type="password" placeholder="رمز" required>
            <input type="password" placeholder="تکرار رمز" required>
            <button type="submit">ثبت‌ نام</button>
            <sub>قبلاً ثبت‌ نام کرده‌اید؟ <a href="login.php">ورود</a></sub>
        </form>
    </div>


<?php 
    require_once 'layouts/footer.php';
?>
