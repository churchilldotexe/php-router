<?php

use Core\Database;
use Core\Response;

$config = require base_path("configs.php");
$userId = 1;
$db = new Database($config['database'], 'root', 'ting');
$query = "SELECT * FROM notes where id = :id";
$post = $db->query($query, ['id' => $_POST['id']])->getOrAbort();

if ($post['user_id'] === $userId) {
    $deleteQuery = "DELETE FROM notes where id = :id";
    $post = $db->query($deleteQuery, ['id' => $_POST['id']]);
    header('Location: /notes');
}

authorize($post['user_id'] !== $userId, Response::FORBIDDEN);
