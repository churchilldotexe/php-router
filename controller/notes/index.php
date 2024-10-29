<?php

$config = require base_path("configs.php");

$db = new Database($config['database'], 'root', 'ting');
$query = "SELECT * FROM notes where user_id = :id";
$posts = $db->query($query, ['id' => 1])->getAll();


view("notes/index.php", ['title' => "My Notes", 'posts' => $posts]);
