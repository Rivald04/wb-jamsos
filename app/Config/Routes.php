<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/admin/dashboard', 'Admin::index');
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');

// Tabel Jamsos
$routes->get('/jamsos', 'Jamsos::index');
$routes->get('/filter', 'Jamsos::filter');
$routes->get('/jamsos/(:any)', 'Jamsos::detail/$1');
$routes->get('/admin/jamsos/create', 'AdminJamsos::create');
$routes->post('/admin/jamsos/save', 'AdminJamsos::save');
$routes->get('/admin/jamsos/printpdf', 'AdminJamsos::printpdf');
$routes->post('/admin/jamsos/update/(:segment)', 'AdminJamsos::update/$1');
$routes->get('/admin/jamsos/edit/(:segment)', 'AdminJamsos::edit/$1');
$routes->delete('/admin/jamsos/(:num)', 'AdminJamsos::delete/$1');
$routes->get('/admin/jamsos', 'AdminJamsos::index');
$routes->get('/admin/filter', 'AdminJamsos::filter');
$routes->get('/admin/jamsos/(:any)', 'AdminJamsos::detailJamsos/$1');

// Tabel Tahun
$routes->get('/admin/tahun', 'AdminTahun::index');
$routes->get('/admin/tahun/create', 'AdminTahun::create');
$routes->post('/admin/tahun/save', 'AdminTahun::save');
// $routes->post('/admin/tahun/update/(:segment)', 'AdminTahun::update/$1');
// $routes->get('/admin/tahun/edit/(:segment)', 'AdminTahun::edit/$1');
$routes->delete('/admin/tahun/(:num)', 'AdminTahun::delete/$1');

// Tabel Users
$routes->get('/admin/users', 'Admin::user', ['filter' => 'role:Admin']);
$routes->get('/admin/users/create', 'Admin::createU', ['filter' => 'role:Admin']);
$routes->post('/admin/users/save', 'Admin::saveU', ['filter' => 'role:Admin']);
$routes->post('/admin/users/update/(:segment)', 'Admin::updateU/$1', ['filter' => 'role:Admin']);
$routes->get('/admin/users/edit/(:segment)', 'Admin::editU/$1', ['filter' => 'role:Admin']);
$routes->delete('/admin/users/(:num)', 'Admin::deleteU/$1', ['filter' => 'role:Admin']);

// Profile
$routes->get('/admin/profile', 'Admin::profile');
$routes->get('/admin/profile/edit', 'Admin::profileEdit');
$routes->post('/admin/profile/update/(:num)', 'Admin::profileUpdate/$1');


/*
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
