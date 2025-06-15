<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'AuthController::logout'); 
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/testDb', 'LoginController::testDb');

// $routes->resource('parts', ['controller' => 'PartController']);$routes->get('/part', 'PartViewController::index');            // list semua part
$routes->get('/part', 'PartController::index');
$routes->get('/part/create', 'PartController::create');
$routes->post('/part/store', 'PartController::store');
$routes->get('/part/edit/(:segment)', 'PartController::edit/$1');
$routes->post('/part/update/(:segment)', 'PartController::update/$1');
$routes->get('/part/delete/(:segment)', 'PartController::delete/$1');
$routes->get('/part/show/(:segment)', 'PartController::show/$1');

$routes->get('/dashboard', 'DashboardController::index');


$routes->get('/users', 'UserController::index');
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:segment)', 'UserController::edit/$1');
$routes->post('/users/update/(:segment)', 'UserController::update/$1');
$routes->get('/users/delete/(:segment)', 'UserController::delete/$1');
$routes->get('/users/show/(:segment)', 'UserController::show/$1');


$routes->get('processes', 'PartProcessController::index');
$routes->get('processes/(:segment)', 'PartProcessController::show/$1');
$routes->put('processes/(:segment)', 'PartProcessController::update/$1');

