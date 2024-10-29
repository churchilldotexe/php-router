<?php

use Core\Database;
use Core\Response;

$config = require base_path("configs.php");
$userId = 1;
$db = new Database($config['database'], 'root', 'ting');
$query = "SELECT * FROM notes where id = :id";
$post = $db->query($query, ['id' => $_GET['id']])->getOrAbort();

authorize($post['user_id'] !== $userId, Response::FORBIDDEN);


view("notes/show.php", ['title' => "My Note",'post' => $post]);
