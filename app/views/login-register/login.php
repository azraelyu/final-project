<?php 
    $title = 'صفحه ورود';
    require_once 'layouts/top-nav.php';
?>


    <div class="container">
        <h2>ورود به حساب کاربری</h2>
        <form id="loginForm">
            <input type="text" placeholder="نام کاربری" required>
            <input type="password" placeholder="رمز" required>
            <button type="submit">ورود</button>
            <a href="#" id="resetPassword">رمز عبور را فراموش کرده اید؟</a>
            <br>
            <sub>از اینجا ثبت‌ نام کنید  <a href="register.php">ثبت‌ نام</a></sub>
        </form>
    </div>


<?php 
    require_once 'layouts/footer.php';
?>
