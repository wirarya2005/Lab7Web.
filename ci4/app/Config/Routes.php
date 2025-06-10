<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);

$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');


$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
$routes->get('/artikel', 'Artikel::index');



$routes->group('admin', ['filter' => 'auth'],function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});


$routes->get('/ajax', 'AjaxController::index');
$routes->get('/ajax/getData', 'AjaxController::getData');
// $routes->delete('/artikel/delete/(:num)', 'AjaxController::delete/$1');
$routes->post('/ajax/delete/(:num)', 'AjaxController::delete/$1');


$routes->post('/ajax/create', 'AjaxController::create');
$routes->post('/ajax/update/(:num)', 'AjaxController::update/$1');

$routes->get('/ajax/form', 'AjaxController::formTambah');
$routes->get('/ajax/form/(:num)', 'AjaxController::formEdit/$1');
