<?php

$config = require base_path("configs.php");

$title = "Create Notes";
$error = [];


view("notes/create.php", ['title' => "Create Notes", 'error' => $error]);
