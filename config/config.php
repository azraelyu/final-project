<?php

// config
define('BASE_PATH', dirname(__DIR__));
define('DISPLAY_ERROR', true);
define('CURRENT_DOMAIN', trim(currentDomain(), '/') . '/final-project/website');
define('DB_HOST', 'localhost');
define('DB_NAME', 'final');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');


// Database connection
function dbConnect() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        return new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
