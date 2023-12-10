<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


//driver routes
$routes->get('/drivers', 'Drivers::index');
$routes->match(['get', 'post'], '/drivers/edit/(:num)', 'Drivers::edit/$1');
$routes->match(['get', 'post'], '/drivers/add', 'Drivers::add');
$routes->get('/drivers/delete/(:num)', 'Drivers::delete/$1');

//race routes
$routes->get('/races', 'Races::index');
$routes->match(['get', 'post'], '/races/edit/(:num)', 'Races::edit/$1');
$routes->match(['get', 'post'], '/races/add', 'Races::add');
$routes->get('/races/delete/(:num)', 'Races::delete/$1');

//team routes
$routes->get('/teams', 'Teams::index');
$routes->match(['get', 'post'], '/teams/edit/(:num)', 'Teams::edit/$1');
$routes->match(['get', 'post'], '/teams/add', 'Teams::add');
$routes->get('/teams/delete/(:num)', 'Teams::delete/$1');