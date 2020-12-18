<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'User::index');
$routes->get('/logout', 'User::logout');
$routes->get('/login', 'User::showLogin');
$routes->post('/login', 'User::checkLogin');
$routes->get('/register', 'User::showRegister');
$routes->post('/register', 'User::saveRegister');

$routes->group('movies', function ($routes) {
	$routes->get('', 'Movie::index');
	$routes->post('save', 'Movie::save');
	$routes->get('add-movie', 'Movie::showAddForm');
	$routes->get('edit-movie/(:num)', 'Movie::showEdit/$1');
	$routes->post('update/(:num)', 'Movie::saveEdit/$1');
	$routes->delete('(:num)', 'Movie::delete/$1');
	$routes->get('(:any)', 'Movie::detail/$1');
});

// $routes->get('/', 'Home::index', ['filter' => 'authuser']);
// $routes->get('/dashboard', 'User::index', ['filter' => 'authuser']);
// $routes->get('/logout', 'User::logout');
// $routes->get('/login', 'User::showLogin');
// $routes->post('/login', 'User::checkLogin');
// $routes->get('/register', 'User::showRegister');
// $routes->post('/register', 'User::saveRegister');



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
