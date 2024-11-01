<?php

use Core\App;

$db = App::container();
$query = "SELECT * FROM notes where user_id = :id";
$posts = $db->query($query, ['id' => 1])->getAll();


view("notes/index.view.php", ['title' => "My Notes", 'posts' => $posts]);
