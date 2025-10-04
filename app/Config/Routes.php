<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/attemptLogin', 'Auth::attemptLogin');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/bahan/tambahBahan', 'BahanController::tambahBahan');
$routes->post('/bahan/simpanBahan', 'BahanController::simpanBahan');
$routes->get('/bahan/lihatBahan', 'BahanController::lihatBahan');

$routes->get('/bahan/editStok/(:num)', 'BahanController::editBahan/$1');
$routes->post('/bahan/updateStok/(:num)', 'BahanController::updateStok/$1');
// $routes->get('hapusBahan/(:num)', 'BahanController::hapusBahan/$1');
$routes->get('/bahan/hapusBahan/(:num)', 'BahanController::hapusBahan/$1');
