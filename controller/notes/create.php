<?php

$config = require base_path("configs.php");
require base_path("Validator.php");



$title = "Create Notes";
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];
    if (!Validator::string($body, 1, 1000)) {
        $error['body'] = "Note of 1000 Characters max is required";
    }

    if (empty($error)) {
        $db = new Database($config['database'], 'root', 'ting');
        $query = "INSERT INTO notes(body,user_id) VALUES(:body,:user_id)";
        $db->query($query, ['body' => $body,'user_id' => 1]);
    }
}

view("notes/create.php", ['title' => "Create Notes", 'error' => $error]);
