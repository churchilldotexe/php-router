<?php

$routes->get('/', 'controller/index.php');
$routes->get('/about', 'controller/about.php');
$routes->get('/contacts', 'controller/contacts.php');

$routes->get('/notes', 'controller/notes/index.php')->only('auth');
$routes->post('/notes', 'controller/notes/store.php');

$routes->get('/note', 'controller/notes/show.php');
$routes->get('/note/edit', 'controller/notes/edit.php');
$routes->patch('/notes', 'controller/notes/update.php');

$routes->get('/note/create', 'controller/notes/create.php');
$routes->delete('/note/destroy', 'controller/notes/destroy.php');

$routes->get('/register', 'controller/registration/create.php')->only('guest');
$routes->post('/register', 'controller/registration/store.php');

$routes->get('/login', 'controller/session/login.php');
$routes->post('/session', 'controller/session/session.php');
$routes->delete('/session', 'controller/session/destroy.php');
