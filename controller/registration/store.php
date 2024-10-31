<?php

use Core\App;
use Core\Validator;

$db = App::container();
$validator = new Validator;

$error = [];

$password = $_POST['password'];
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if (! $email) {
    $error['email'] = 'Invalid email, Please try again with a valid one.';

    return view('registration/create.view.php', ['error' => $error]);
}
if (! $validator->string($password, 7, 255)) {
    $error['password'] = 'Invalid password, Password must be atleast 7 characters.';

    return view('registration/create.view.php', ['error' => $error]);
}

// check if email exists,
$query = 'SELECT COUNT(email) as count FROM users WHERE email = :email';
$emailCount = $db->query($query, ['email' => $email])->getOne();
if ($emailCount['count'] >= 1) {
    header('location: /');
    exit();
}

$createQuery = 'INSERT INTO users(email,password) VALUES (:email,:password)';
$db->query($createQuery, ['email' => $email, 'password' => $password]);

$_SESSION['user'] = ['email' => $email];

header('location: /');
exit();
