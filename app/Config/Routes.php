<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::libros');
$routes->get('libros', 'Home::libros');
$routes->get('listar', 'Libros::index');
