<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

$routes = new \Core\Router();

require base_path("routes.php");

$path = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST["_method"] ?? $_SERVER['REQUEST_METHOD'];

$routes->route($path, $method);
/*require base_path("Database.php");*/
/*require base_path("Response.php");*/
require base_path("Core/routers.php");
