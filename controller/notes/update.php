<?php


use Core\Validator;
use Core\App;

$db = App::container();

$error = [];

$body = $_POST['body'];
$id = $_POST['id'];
if (!Validator::string($body, 1, 1000)) {
    $error['body'] = "Note of 1000 Characters max is required";
}

if (!empty($error)) {
    return view("notes/edit.view.php", ['title' => "Edit Note", 'error' => $error]);
}

$query = "UPDATE notes SET body= :body WHERE id= :id;";
$db->query($query, ['body' => $body,'id' => $id]);

header("location: /notes");
die();
