<?php

$routes->get('/', 'index.php');
$routes->get('/about', 'about.php');
$routes->get('/contacts', 'contacts.php');

$routes->get('/notes', 'notes/index.php')->only('auth');
$routes->post('/notes', 'notes/store.php');

$routes->get('/note', 'notes/show.php');
$routes->get('/note/edit', 'notes/edit.php');
$routes->patch('/notes', 'notes/update.php');

$routes->get('/note/create', 'notes/create.php');
$routes->delete('/note/destroy', 'notes/destroy.php');

$routes->get('/register', 'registration/create.php')->only('guest');
$routes->post('/register', 'registration/store.php');

$routes->get('/login', 'session/create.php');
$routes->post('/session', 'session/store.php');
$routes->delete('/session', 'session/destroy.php');
