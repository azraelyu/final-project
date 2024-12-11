<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        echo '<title>'.$title.'</title>';
    ?>
    <link rel="stylesheet" href="<?php echo asset('home-css/styles.css') ?>">
</head>

<body>
    <header>
        <div class="logo">
            <img src="<?php echo asset('home-image/logo.webp') ?>" alt="logo">
        </div>
        <nav>
            <ul>
                <?php if (isset($_SESSION['id'])) { ?>
                <li><a href="<?php echo url('authentication/logout/{$_SESSION["id"]}') ?>">خروج</a></li>
                <?php } else { ?>
                <li><a href="<?php echo url('authentication/login/show') ?>">ورود</a></li>
                <?php } ?>
                <li><a href="#contact-info">پشتیبانی</a></li>
                <li><a href="<?php echo url('shop/show/{$_SESSION["id"]}') ?>">سبد خرید</a></li>
                <li><a href="<?php echo url('public/page/1') ?>">خانه</a></li>
            </ul>
        </nav>
    </header>
