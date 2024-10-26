<?php


require "functions.php";


/*require "routers.php";*/
require "Database.php";

$config = [
    'host' => '127.0.0.1' ,
    'port' => '3306',
    'dbname' => 'myapp',
    'charset' => 'utf8mb4'
];
/*$dsn = "mysql:host=127.0.0.1;port=3306;dbname=myapp;user=root;password=ting;charset=utf8mb4";*/
$db = new Database($config, 'root', 'ting');
$posts = $db->query("SELECT * FROM posts");


foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
