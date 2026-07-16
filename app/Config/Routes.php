<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/crud', 'Crud::index');
$routes->get('/crud/tambah', 'Crud::tambah');
$routes->post('/crud/tambah', 'Crud::tambah');
$routes->get('/crud/hapus/(:segment)', 'Crud::hapus/$1');
$routes->get('/crud/edit/(:segment)', 'Crud::edit/$1');
$routes->post('/crud/editan', 'Crud::editan');
