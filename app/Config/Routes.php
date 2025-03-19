<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/DetailProfile', 'DetailProfileController::index');
$routes->get('/UpdateProfile', 'UpdateProfileController::index');
$routes->get('/JelajahKarya', 'JelajahKaryaController::index');
$routes->get('/KaryaSiswa', 'KaryaSiswaController::index');
$routes->get('/DetailKarya/(:num)', 'DetailKaryaController::index/$1');
$routes->get('/DetailProfile/(:num)', 'DetailProfileController::detailUser/$1');


$routes->post('/register', 'AuthController::register');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');


$routes->get('/TambahKarya', 'TambahKaryaController::index');
$routes->post('/Karya/simpan', 'TambahKaryaController::simpan');

$routes->get('/EditKarya/(:num)', 'EditKaryaController::index/$1');
$routes->post('/karya/update/(:num)', 'EditKaryaController::update/$1');
$routes->post('/karya/delete/(:num)', 'EditKaryaController::delete/$1');

$routes->get('/EditProfile', 'AuthController::nampilinFormEdit');
$routes->post('/Profile/update', 'AuthController::updateProfile');



