<?php

$config = require("configs.php");

$db = new Database($config['database'], 'root', 'ting');
$query = "SELECT * FROM notes where id = :id";
$post = $db->query($query, ['id' => $_GET['id']])->getOrAbort();


authorize($post['user_id'] !== 1, Response::FORBIDDEN);

$title = "My Notes";

require "views/note.php";
