<?php

use Core\App;
use Core\Response;

$db = App::container();
$userId = 1;
$query = "SELECT * FROM notes where id = :id";
$post = $db->query($query, ['id' => $_GET['id']])->getOrAbort();

authorize($post['user_id'] !== $userId, Response::FORBIDDEN);


view("notes/show.view.php", ['title' => "My Note",'post' => $post]);
