<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        echo '<title>'.$title.'</title>';
    ?>
    <link rel="stylesheet" href="<?php echo asset('home-css/styles.css'); ?>">
    <style>
        input {
            text-align: center;
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        textarea {
            text-align: center;
            width: 100%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            resize: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="<?php echo asset('home-image/logo.webp'); ?>" alt="Avatar">
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo url("admin/add/show"); ?>">اضافه کردن محصول جدید</a></li>
                <li><a href="<?php echo url("admin/show"); ?>">نمایش محصولات</a></li>
                <li><a href="<?php echo url("public/page/1"); ?>">رفتن به فروشگاه</a></li>
            </ul>
        </nav>
    </header>
