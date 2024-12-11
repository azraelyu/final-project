<?php
$title = 'صفحه ورود';
require_once 'layouts/top-nav.php';

if (isset($_SESSION['error'])) {
    $message = $_SESSION['error'];
}
?>


<div class="container">
    <?php if (isset($message) && $message != null) { ?>
    <sup style="color:red;padding:10px;font-size:9px"> <?php echo $message;
    $_SESSION['error'] = ''; ?> </sup>
    <?php }; ?>
    <h2>ورود به حساب کاربری</h2>
    <form id="loginForm" action="<?php echo url('authentication/login/check'); ?>" method="POST">
        <input name="email" type="text" placeholder="ایمیل" required>
        <input name="password" type="password" placeholder="رمز" required>
        <button type="submit">ورود</button>
        <a href="#" id="resetPassword">رمز عبور را فراموش کرده اید؟</a>
        <br>
        <sub>از اینجا ثبت‌ نام کنید <a href="<?php echo url('authentication/register/show'); ?>">ثبت‌ نام</a></sub>
        <br>
        <sub><a href="<?php echo url('public/page/1') ?>">برگشت</a></sub>
    </form>
</div>


<?php
require_once 'layouts/footer.php';

unset($title);
unset($message);
unset($user);
?>
