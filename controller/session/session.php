<?php

use Core\App;
use Core\Validator;

$db = App::container();
$validator = new Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$error = [];

if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error['email'] = 'Please enter a valid email';
}
if (! $validator->string($password)) {
    $error['password'] = 'Please enter a vlaid email';
}
if (! empty($error)) {
    return require view('session/login.view.php', ['error' => $error]);
    exit();
}

$userInfo = $db->query('SELECT * FROM users Where email = :email', ['email' => $email])->getOne();
if ($userInfo && password_verify($password, $userInfo['password'])) {

    login($userInfo);
    header('location: /');
}

return require view('session/login.view.php', ['error' => 'Unable to find your email or password.']);
exit();
