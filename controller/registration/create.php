<?php

$config = require base_path('configs.php');

$error = [];

view('registration/create.view.php', ['error' => $error]);
