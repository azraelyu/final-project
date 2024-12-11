<?php
$title = 'صفحه ثبت‌ نام';
require_once 'layouts/top-nav.php';

if (isset($_SESSION['error'])) {
    $message = $_SESSION['error'];
}
?>


<div class="container">
    <?php if (isset($message) && $message != null) { ?>
    <sup style="color:red;padding:10px;font-size:9px"> <?php echo $message; $_SESSION['error'] = ''; ?> </sup>
    <?php }; ?>
    <a href="<?php echo url('public/page/1') ?>">خانه</a>
    <h2>ثبت‌ نام</h2>
    <form id="registerForm" action="<?php echo url('authentication/register/store'); ?>" method="POST">
        <input type="text" name="first_name" placeholder="نام" required>
        <input type="text" name="last_name" placeholder="نام خانوادگی" required>
        <input type="email" name="email" placeholder="ایمیل" required>
        <input type="password" name="password" placeholder="رمز عبور" required>
        <input type="password" name="password-rep" placeholder="تکرار رمز عبور" required>
        <button type="submit">ثبت‌ نام</button>
        <sub>قبلاً ثبت‌ نام کرده‌اید؟ <a href="<?php echo url('authentication/login/show'); ?>">ورود</a></sub>
        <br>
        <sub><a href="<?php echo url('public/page/1') ?>">برگشت</a></sub>
    </form>
</div>


<?php
require_once 'layouts/footer.php';

unset($title);
unset($message);
unset($uppercase);
unset($lowercase);
unset($number);
unset($user);
?>
