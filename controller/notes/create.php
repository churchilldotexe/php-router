<?php

$config = require base_path("configs.php");

$title = "Create Notes";
$error = [];


view("notes/create.view.php", ['title' => "Create Notes", 'error' => $error]);
