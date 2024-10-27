<?php

$config = require("configs.php");

$db = new Database($config['database'], 'root', 'ting');
$query = "SELECT * FROM notes where user_id = :id";
$posts = $db->query($query, ['id' => 1])->getAll();

$title = "My Notes";
$href = "/notes.php";
$isActive = true;
$navTitle = "Notes";

require "views/notes.php";
