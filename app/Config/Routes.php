<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/admin/dashboard', 'Admin\Dashboard::index', ['filter' => 'auth']);
$routes->get('/dapur/dashboard', 'Dapur\Dashboard::index', ['filter' => 'auth']);