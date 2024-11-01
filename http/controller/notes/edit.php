<?php

use Core\App;
use Core\Response;

$db = App::container();
$userId = 1;
$query = "SELECT * FROM notes where id = :id";
$post = $db->query($query, ['id' => $_GET['id']])->getOrAbort();


authorize($post['user_id'] !== $userId, Response::FORBIDDEN);


view("notes/edit.view.php", ['title' => "Edit Note",'post' => $post]);
