<?php

use Core\App;
use Core\Session;
use Core\Validator;
use http\Forms\Login;

$db = App::container();
$validator = new Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$login = new Login;

if ($login->validate($email, $password)) {

    $userInfo = $db->query('SELECT * FROM users Where email = :email', ['email' => $email])->getOne();
    if ($userInfo && password_verify($password, $userInfo['password'])) {

        Session::login($userInfo);
        redirect('/');
    }
}

$login->addError('email', 'Unable to find your email or password.');

Session::flash('error', $login->getErrors());

redirect('/login');
