<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::libros');
$routes->get('listar', 'Libros::index');
$routes->get('crear', 'Libros::crear');
$routes->post('guardar', 'Libros::guardar');
$routes->get('borrar/(:num)', 'Libros::borrar/$1');
