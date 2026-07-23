<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Home → redirect ke produk
$routes->get('/', 'Produk::index');

// ─── Produk CRUD ────────────────────────────────────────
$routes->get('/produk',                  'Produk::index');
$routes->get('/produk/tambah',           'Produk::tambah');
$routes->post('/produk/tambah',          'Produk::tambah');
$routes->get('/produk/edit/(:segment)',  'Produk::edit/$1');
$routes->post('/produk/edit/(:segment)', 'Produk::edit/$1');
$routes->get('/produk/hapus/(:segment)', 'Produk::hapus/$1');
