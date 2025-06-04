<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/dashboard', 'DashboardController::index');

// $routes->resource('parts', ['controller' => 'PartController']);$routes->get('/part', 'PartViewController::index');            // list semua part
$routes->get('/part/create', 'PartViewController::create');    // form tambah
$routes->post('/part/create', 'PartViewController::store');    // proses tambah
$routes->get('/part/update/(:segment)', 'PartViewController::edit/$1');  // form edit
$routes->post('/part/update/(:segment)', 'PartViewController::update/$1'); // proses update
$routes->get('/part/detail/(:segment)', 'PartViewController::detail/$1');  // detail data

$routes->resource('users', ['controller' => 'UserController']);

$routes->get('/dashboard', 'DashboardController::index');

// PART
// $routes->get('/parts', 'PartController::index');
// $routes->get('/parts/(:segment)', 'PartController::show/$1');
// $routes->post('/parts', 'PartController::create');
// $routes->put('/parts/(:segment)', 'PartController::update/$1');
// $routes->delete('/parts/(:segment)', 'PartController::delete/$1');

// // USER
// $routes->get('/users', 'UserController::index');
// $routes->get('/users/(:segment)', 'UserController::show/$1');
// $routes->post('/users', 'UserController::create');
// $routes->put('/users/(:segment)', 'UserController::update/$1');
// $routes->delete('/users/(:segment)', 'UserController::delete/$1');

$routes->get('processes', 'PartProcessController::index');
$routes->get('processes/(:segment)', 'PartProcessController::show/$1');
$routes->put('processes/(:segment)', 'PartProcessController::update/$1');

