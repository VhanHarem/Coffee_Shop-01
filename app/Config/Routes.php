<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('home', 'Pages::index');
$routes->get('categories', 'Pages::categories');
$routes->get('orders','Pages::orders');
$routes->get('stamps','Pages::stamps');
$routes->get('profile','Pages::profile');
$routes->get('login','Pages::login');
