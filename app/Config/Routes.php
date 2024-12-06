<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 /*
get( 'ruta_web' , controlador::funcion)
 */
$routes->get('/', 'Home::index');

// Cuando entre a /saludar, que imprima "hola mundo"
$routes->get('/saludar' , 'Home::saludar');
$routes->get('/saludar/(:alpha)', 'Home::saludar2/$1');
$routes->get('/saludar/(:alpha)/(:num)', 'Home::saludar3/$1/$2');
$routes->get('/calculadora/(:num)/(:num)/(:alpha)', 'Home::calculadora/$1/$2/$3');

// Rutas para USUARIOS
$routes->get('/usuarios', 'UsuarioController::index');
$routes->get('/usuarios/(:num)', 'UsuarioController::show/$1');
$routes->get('/usuarios/create', 'UsuarioController::create');
$routes->post('/usuarios/store', 'UsuarioController::store');
$routes->get('/usuarios/(:num)/edit', 'UsuarioController::edit/$1');
$routes->post('/usuarios/(:num)/update', 'UsuarioController::update/$1');
$routes->get('/usuarios/(:num)/delete', 'UsuarioController::delete/$1');
$routes->get('/login', 'UsuarioController::login');
$routes->post('/validar-login', 'UsuarioController::validarLogin');






$routes->get('/login', 'UsuarioController::login'); // view form
$routes->post('/usuarios', 'UsuarioController::validarLogin'); // control
$routes->get('/logout', 'UsuarioController::logout'); // cerrar sesión

// Rutas para PRODUCTOS
$routes->get('/productos', 'ProductoController::index'); 
$routes->get('/productos/(:num)', 'ProductoController::show/$1');
$routes->get('/productos/create', 'ProductoController::create');
$routes->post('/productos/store', 'ProductoController::store');
$routes->get('/productos/(:num)/edit', 'ProductoController::edit/$1');
$routes->post('/productos/(:num)/update', 'ProductoController::update/$1');
$routes->get('/productos/(:num)/delete', 'ProductoController::delete/$1');





$routes->get('/plantilla', 'Home::plantilla'); // Ruta para plantilla
