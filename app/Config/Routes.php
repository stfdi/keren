<?php

namespace Config;

use App\Controllers\SalonController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

// // We get a performance increase by specifying the default
// // route since we don't have to scan directories.
// $routes->get('/', 'todolist::index');
// $routes->get('ktp', 'ktp::index');
// $routes->get('/', 'Pesan::index');

// use App\Controllers\AsistenController;

// $routes->get('/asisten', 'AsistenController::index');
// $routes->get('/asisten/logout', 'AsistenController::logout');
// $routes->get('/asisten/loginpages', 'AsistenController::login');
// $routes->match(
//     ['get', 'post'],
//     'asisten/simpan',
//     [AsistenController::class, 'simpan']
// );
// $routes->match(
//     ['get', 'post'],
//     'asisten/update',
//     [AsistenController::class, 'update']
// );
// $routes->match(
//     ['get', 'post'],
//     'asisten/delete',
//     [AsistenController::class, 'delete']
// );
// $routes->match(
//     ['get', 'post'],
//     'asisten/search',
//     [AsistenController::class, 'search']
// );
// $routes->match(
//     ['get', 'post'],
//     'asisten/check',
//     [AsistenController::class, 'check']
// );



// // use App\Controllers\Pages;

// // $routes->get('pages', [Pages::class, 'index']);
// // $routes->get('(:segment)', [Pages::class, 'view']);

// use App\Controllers\News;
// use App\Controllers\Pages;

// $routes->match(['get', 'post'], 'news/create', [News::class, 'create']);
// $routes->get('news/(:segment)', [News::class, 'view']);
// $routes->get('news', [News::class, 'index']);
// $routes->get('pages', [Pages::class, 'index']);
// $routes->get('(:segment)', [Pages::class, 'view']);


// =========== SALON CONTROLLER ===============
// $routes->get('/start', 'SalonController::salonStart');
$routes->get('/home', 'SalonController::index');
$routes->get('/homeL', 'SalonController::afterLogin');
$routes->get('/homeAdmin', 'SalonController::homeAdmin');
$routes->get('/salon/logout', 'SalonController::logout');
$routes->get('/tambahJasa', 'SalonController::tambahJasa');

$routes->match(['get', 'post'], 'salon/salonLogin', [SalonController::class, 'login']);
$routes->match(['get', 'post'], 'salon/salonCheckLogin', [SalonController::class, 'checkLogin']);
$routes->match(['get', 'post'], 'salon/salonLoginAdmin', [SalonController::class, 'loginAdmin']);
$routes->match(['get', 'post'], 'salon/salonCheckLoginAdmin', [SalonController::class, 'checkLoginAdmin']);
$routes->match(['get', 'post'], 'salon/salonRegister', [SalonController::class, 'register']);
$routes->match(['get', 'post'], 'salon/salonCheckRegister', [SalonController::class, 'checkRegister']);
$routes->match(['get', 'post'], 'salon/salonPricelist', [SalonController::class, 'list']);
$routes->match(['get', 'post'], 'salon/salonPriceAdmin', [SalonController::class, 'listPriceAdmin']);
$routes->match(['get', 'post'], 'salon/salonPricelistL', [SalonController::class, 'listLogin']);
$routes->match(['get', 'post'], 'salon/salonTambahJasa', [SalonController::class, 'tambahJasa']);
$routes->match(['get', 'post'], 'salon/salonHapusJasa', [SalonController::class, 'listHapusJasa']);
$routes->get('salon/hapusJasa/(:any)', [[SalonController::class, 'hapusJasa'], '$1']);
$routes->match(['get', 'post'], 'salon/simpanReservasi', [SalonController::class, 'simpanRev']);
$routes->match(['get', 'post'], '/salon/salonValidasiPembayaran', [SalonController::class, 'ValidasiPembayaran']);
$routes->get('salon/validation/(:any)', [[SalonController::class, 'validation'], '$1']);
$routes->match(['get', 'post'], '/salon/updateValidasi', [SalonController::class, 'updateValidasi']);

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
