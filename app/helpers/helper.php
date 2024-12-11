<?php

require_once dirname(dirname(__DIR__)) . '/config/config.php';


function uri($reservedUrl, $class, $method, $methodField = "GET")
{
    // current url parts. http://localhost/helper.php?variable=2 => http://localhost/helper.php and variable=2
    $currentUrl = explode('?', currentUrl())[0];
    // remove domain form url. http://localhost/final-project/website/app/helpers/helper.php => "/app/helpers/helper.php"
    $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
    $currentUrl = trim($currentUrl, '/ ');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);
    
    // reserved url parts.
    $reservedUrl = trim($reservedUrl, '/ ');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);

    // check reserve url and current url matching
    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $methodField) {
        return false;
    }

    // cath parameters of current url 
    $parameters = [];
    for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == '{' && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == '}') {
            array_push($parameters, $currentUrlArray[$key]);
        } elseif ($currentUrlArray[$key] !== $reservedUrlArray[$key]) {
            return false;
        }
    }

    // check set parameters
    if (methodField() == 'POST') {
        $request = isset($_FILES) ? array_merge($_FILES, $_POST) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }

    $object = new $class;
    call_user_func_array([$object, $method], $parameters);
    exit;
}

// find the protocol
function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') == true ? 'https://' : 'http://';
}

// find the domain. example: http://localhost
function currentDomain()
{
    return protocol() . $_SERVER['HTTP_HOST'];
}

// catch the assets path. http://localhost/final-project/website/public/assets/
function asset($src)
{
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $src = $domain . '/public/assets/' . trim($src, '/ ');
    return $src;
}

// catch the path of a file. http://localhost/final-project/website/
function url($url)
{
    $domain = trim(CURRENT_DOMAIN, '/ ');
    $url = $domain . '/' . trim($url, '/ ');
    return $url;
}

// find the current url. like: http://localhost/final-project/website/app/helpers/helper.php
function currentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

// find the html method
function methodField()
{
    return $_SERVER['REQUEST_METHOD'];
}

// display and die
function dd($var)
{
    echo '<pre style="background-color:black;color:springgreen;padding:10px;font-size:15px">';
    var_dump($var);
    exit;
}

// set the display error configuration
function displayError($status)
{
    if ($status) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }
}
// fetch the value form config.php and set
displayError(DISPLAY_ERROR);

// get the flash messages
global $flashMessage;
if (isset($_SESSION['flash_message'])) {
    $flashMessage = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}

// set or get the message. value != null => set, value == null => get 
function flash($name, $value = null)
{
    if ($value == null) {
        global $flashMessage;
        $message = isset($flashMessage[$name]) ? $flashMessage[$name] : '';
        return $message;
    } else {
        $_SESSION['flash_message'][$name] = $value;
    }
}

// set and unset sessions
if (isset($_SESSION['old'])) {
    unset($_SESSION['temporary_old']);
}
if (isset($_SESSION['old'])) {
    $_SESSION['temporary_old'] = $_SESSION['old'];
    unset($_SESSION['old']);
}

// cath parameters of the html method and set session
$params = [];
$params = !isset($_GET) ? $params : array_merge($params, $_GET);
$params = !isset($_POST) ? $params : array_merge($params, $_POST);
$_SESSION['old'] = $params;
unset($params);

// cath the old value
function old($name)
{
    if (isset($_SESSION['temporary_old'][$name])) {
        return $_SESSION['temporary_old'][$name];
    } else {
        return null;
    }
}

// redirect
function redirect($url) {
    header('Location: ' . $url);
    die();
}

// redirect back
function redirectBack() {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
}
