<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//? rutas creadas
//se declara una variable $routes, y seleccionamos el metodo HTTP que queremos usar, luego recibimos la solicitud para la URL en la primera parte y en la segunda, seleccionamos el controlador y el metodo a mostrar
$routes->get('/', 'Home::index');
$routes->get('listar', 'Libros::index');
$routes->get('crear', 'Libros::crear');
$routes->post('guardar', 'Libros::guardar');
$routes->get('borrar/(:num)', 'Libros::borrar/$1');
$routes->get('editar/(:num)', 'Libros::editar/$1');
$routes->post('actualizar', 'Libros::actualizar');