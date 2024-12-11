<?php

namespace App\Controllers\Home;

use App\Models\Home\User;

session_start();
require_once dirname(dirname(__DIR__)) . '/models/Home/User.php';



class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User(dbConnect());
    }

    public function register() {
        require_once dirname(dirname(__DIR__)) . '/views/login-register/register.php';
    }

    public function registerStore($request) {
        // Verify the user email
        if(!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'فرمت ایمیل وارد شده نادرست است.';
            redirectBack();
            return;
        }
        // Verify the user password
        $uppercase = preg_match('@[A-Z]@', $request['password']);
        $lowercase = preg_match('@[a-z]@', $request['password']);
        $number    = preg_match('@[0-9]@', $request['password']);
        if(!$uppercase || !$lowercase || !$number || strlen($request['password']) < 8) {
            $_SESSION['error'] = 'حداقل تعداد کاراکترهای رمز عبور شما باید 8 تا باشد و شامل حروف بزرگ کوچک و عدد باشد.';
            redirectBack();
            return;
        }
        // create user or redirect to login page
        $user = $this->userModel->getUser($request['email']);
        if ($user == null) {
            $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
            $this->userModel->createUser($request);
            $user = $this->userModel->getUser($request['email']);
            $_SESSION['id'] = $user['id'];
            redirect(url('public/page/1'));
            return;
        } else {
            redirect(url('authentication/login/show'));
            return;
        }
    }

    public function login() {
        require_once dirname(dirname(__DIR__)) . '/views/login-register/login.php';
    }

    public function loginCheck($request) {
        // Verify the user email
        if(!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'فرمت ایمیل وارد شده نادرست است.';
            redirectBack();
            return;
        }
        $user = $this->userModel->getUser($request['email']);
        if ($user) {
            if (!password_verify($request['password'], $user['password'])) {
                $_SESSION['error'] = 'ایمیل یا رمز عبور نادرست است.';
                redirectBack();
                return;
            }
            unset($_SESSION['id']);
            $_SESSION['id'] = $user['id'];
            redirect(url('public/page/1'));
            return;
        } else {
            $_SESSION['error'] = 'شما در این جا حسابی ندارید.';
            redirect(url('authentication/register/show'));
            return;
        }
    }

    public function logout() {
        unset($_SESSION['id']);
        session_destroy();
        redirectBack();
        return;
    }

    public function __destruct() {
        unset($this->userModel);
    }
}
