<?php


use Core\Validator;
use Core\App;

$db = App::container();

$title = "Create Notes";
$error = [];

$body = $_POST['body'];
if (!Validator::string($body, 1, 1000)) {
    $error['body'] = "Note of 1000 Characters max is required";
}

if (!empty($error)) {
    return view("notes/create.view.php", ['title' => "Create Notes", 'error' => $error]);
}

$query = "INSERT INTO notes(body,user_id) VALUES(:body,:user_id);";
$db->query($query, ['body' => $body,'user_id' => 1]);

header("location: /notes");
die();
