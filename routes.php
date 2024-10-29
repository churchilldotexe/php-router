<?php


$routes->get('/', 'controller/index.php');
$routes->get('/about', 'controller/about.php');
$routes->get('/contacts', 'controller/contacts.php');

$routes->get('/notes', 'controller/notes/index.php');
$routes->post('/notes', 'controller/notes/store.php');

$routes->get('/note', 'controller/notes/show.php');

$routes->get('/note/create', 'controller/notes/create.php');
$routes->delete('/note/destroy', 'controller/notes/destroy.php');
