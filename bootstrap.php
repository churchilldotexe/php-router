<?php

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container();
$container->bind('Core\Database', function () {

    $config = require base_path("configs.php");

    return new Database($config['database'], 'root', 'ting');
});

App::setContainer($container->resolve('Core\Database'));
