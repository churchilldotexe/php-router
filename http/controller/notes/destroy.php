<?php

use Core\Response;
use Core\App;

$db = App::container();

$userId = 1;
$query = "SELECT * FROM notes where id = :id";
$post = $db->query($query, ['id' => $_POST['id']])->getOrAbort();

if ($post['user_id'] === $userId) {
    $deleteQuery = "DELETE FROM notes where id = :id";
    $post = $db->query($deleteQuery, ['id' => $_POST['id']]);
    header('location: /notes');
}

authorize($post['user_id'] !== $userId, Response::FORBIDDEN);
