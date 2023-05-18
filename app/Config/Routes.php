<?php

namespace Config;

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
// $routes->get('/', 'Home::index');
// $routes->get('/about', 'Page::about');

$routes->get('/page', 'User::index');
$routes->get('/login', 'Login::index');
$routes->get('/login/create', 'Login::create');
$routes->post('/login/save', 'Login::save');
$routes->get('/login/isLogged_in', 'Login::isLogged_in');

// admin
$routes->get('/product', 'Product::index');
$routes->get('/product/create', 'Product::create');
$routes->post('/product/save', 'Product::save');
$routes->get('/product/delete/(:num)', 'Product::delete/$1');
$routes->get('/product/edit/(:num)', 'Product::edit/$1');
$routes->post('/product/update/(:num)', 'Product::update/$1');

$routes->get('/project', 'Project::index');
$routes->get('/project/create', 'Project::create');
$routes->post('/project/save', 'Project::save');
$routes->get('/project/delete/(:num)', 'Project::delete/$1');
$routes->get('/project/edit/(:num)', 'Project::edit/$1');
$routes->post('/project/update/(:num)', 'Project::update/$1');

$routes->get('/frontPage', 'FrontPage::index');
$routes->get('/frontPage/create', 'FrontPage::create');
$routes->post('/frontPage/save', 'FrontPage::save');
$routes->get('/frontPage/delete/(:num)', 'FrontPage::delete/$1');
$routes->get('/frontPage/edit/(:num)', 'FrontPage::edit/$1');
$routes->post('/frontPage/update/(:num)', 'FrontPage::update/$1');

$routes->get('/store', 'Store::index');
$routes->get('/store/create', 'Store::create');
$routes->post('/store/save', 'Store::save');
$routes->get('/store/delete/(:num)', 'Store::delete/$1');
$routes->get('/store/edit/(:num)', 'Store::edit/$1');
$routes->post('/store/update/(:num)', 'Store::update/$1');

$routes->get('/category', 'Category::index');
$routes->get('/category/create', 'Category::create');
$routes->post('/category/save', 'Category::save');
$routes->get('/category/delete/(:num)', 'Category::delete/$1');
$routes->get('/category/edit/(:num)', 'Category::edit/$1');
$routes->post('/category/update/(:num)', 'Category::update/$1');

$routes->get('/room', 'Room::index');
$routes->get('/room/create', 'Room::create');
$routes->post('/room/save', 'Room::save');
$routes->get('/room/delete/(:num)', 'Room::delete/$1');
$routes->get('/room/edit/(:num)', 'Room::edit/$1');
$routes->post('/room/update/(:num)', 'Room::update/$1');

$routes->get('/aboutUs', 'AboutUs::index');
$routes->get('/aboutUs/create', 'AboutUs::create');
$routes->post('/aboutUs/save', 'AboutUs::save');
$routes->get('/aboutUs/delete/(:num)', 'AboutUs::delete/$1');
$routes->get('/aboutUs/edit/(:num)', 'AboutUs::edit/$1');
$routes->post('/aboutUs/update/(:num)', 'AboutUs::update/$1');

$routes->get('/ourTeam', 'OurTeam::index');
$routes->get('/ourTeam/create', 'OurTeam::create');
$routes->post('/ourTeam/save', 'OurTeam::save');
$routes->get('/ourTeam/delete/(:num)', 'OurTeam::delete/$1');
$routes->get('/ourTeam/edit/(:num)', 'OurTeam::edit/$1');
$routes->post('/ourTeam/update/(:num)', 'OurTeam::update/$1');

$routes->get('/contactUs', 'ContactUs::index');
$routes->get('/contactUs/create', 'ContactUs::create');
$routes->post('/contactUs/save', 'ContactUs::save');
$routes->get('/contactUs/delete/(:num)', 'ContactUs::delete/$1');
$routes->get('/contactUs/edit/(:num)', 'ContactUs::edit/$1');
$routes->post('/contactUs/update/(:num)', 'ContactUs::update/$1');

$routes->get('/workshop', 'Workshop::index');
$routes->get('/workshop/create', 'Workshop::create');
$routes->post('/workshop/save', 'Workshop::save');
$routes->get('/workshop/delete/(:num)', 'Workshop::delete/$1');
$routes->get('/workshop/edit/(:num)', 'Workshop::edit/$1');
$routes->post('/workshop/update/(:num)', 'Workshop::update/$1');
// end admin

$routes->get('/cart', 'Cart::index');
$routes->post('/cart/add', 'Cart::add');
$routes->get('/cart/plusButton/(:num)', 'Cart::plusButton/$1');
$routes->get('/cart/removeButton/(:num)', 'Cart::removeButton/$1');
$routes->get('/cart/minButton/(:num)', 'Cart::minButton/$1');

$routes->get('/ecommerce', 'Ecommerce::index');

$routes->post('/contact', 'Contact::index');

$routes->get('/', 'User::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');

$routes->get('/admin', 'Admin::index');

// rout user
$routes->get('/userProject', 'User::project');
$routes->get('/userStore', 'User::ecommerce');
$routes->get('/userService', 'User::service');
$routes->get('/userAbout', 'User::about');
$routes->get('/userContact', 'User::contactUs');
$routes->get('/userDesign', 'User::design');
$routes->get('/userWorkshop', 'User::workshop');

$routes->get('/userStore/cat/(:num)', 'User::cat/$1');

$routes->get('/userProjectDesc/(:num)', 'User::projectDesc/$1');
$routes->get('/userRoomDesc/(:num)', 'User::roomDesc/$1');
$routes->get('/userProductDesc/(:num)', 'User::productDesc/$1');

$routes->post('contact/orderProduct/', 'contact::orderProduct');
$routes->get('/forgot/(:num)', 'Login::forgot/$1');
$routes->post('/login/forgotPass/(:num)', 'Login::forgotPass/$1');
// $routes->post('/login/forgotPass', 'Login::forgotPass');
$routes->get('/resetpass', 'Login::resetpass');

// routes
$routes->match(['get', 'post'], 'forgotpass', 'SendEmail::index');


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
