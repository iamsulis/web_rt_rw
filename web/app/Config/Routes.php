<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/layananwarga', 'Layananwarga::index');
$routes->get('/login/logout', 'Login::logout');

$routes->get('/admin', 'Admin::index');

$routes->get('/layanan', 'Layanan::index');
$routes->post('/layanan/insertData', 'Layanan::insertData');
$routes->post('/layanan/updateData/(:any)', 'Layanan::updateData/$1');
$routes->get('/layanan/deleteData/(:any)', 'Layanan::deleteData/$1');

$routes->get('/warga', 'Warga::index');
$routes->post('/warga/insertData', 'Warga::insertData');
$routes->post('/warga/updateData/(:any)', 'Warga::updateData/$1');
$routes->get('/warga/deleteData/(:any)', 'Warga::deleteData/$1');

$routes->get('/layananwarga', 'Layananwarga::index');
$routes->post('/layananwarga/insertData', 'Layananwarga::insertData');
$routes->post('/layananwarga/updateData/(:any)', 'Layananwarga::updateData/$1');
$routes->get('/layananwarga/deleteData/(:any)', 'Layananwarga::deleteData/$1');
$routes->post('/layananwarga/verifikasirw/(:any)', 'Layananwarga::verifikasirw/$1');
$routes->post('/layananwarga/verifikasirt/(:any)', 'Layananwarga::verifikasirt/$1');

$routes->get('/pdf/(:any)', 'PdfController::generate/$1');

$routes->post('/login/ceklogin', 'Login::cekLogin');
$routes->post('/warga/insertData', 'Warga::insertData');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
