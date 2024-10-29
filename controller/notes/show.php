<?php

$config = require base_path("configs.php");

$db = new Database($config['database'], 'root', 'ting');
$query = "SELECT * FROM notes where id = :id";
$post = $db->query($query, ['id' => $_GET['id']])->getOrAbort();


authorize($post['user_id'] !== 1, Response::FORBIDDEN);


view("notes/show.php", ['title' => "My Note",'post' => $post]);
