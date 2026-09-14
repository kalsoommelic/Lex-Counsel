<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/

$routes->get('/', 'Home::index');

$routes->get('about', 'Home::about');

$routes->get(
    'practice-areas',
    'Home::practiceAreas'
);

$routes->get(
    'practice-areas/(:segment)',
    'Home::practiceAreaDetail/$1'
);

$routes->get(
    'attorneys',
    'Home::attorneys'
);

$routes->get(
    'attorneys/(:segment)',
    'Home::attorneyDetail/$1'
);

$routes->get(
    'blog',
    'Home::blog'
);

$routes->get(
    'blog/(:segment)',
    'Home::blogDetail/$1'
);

$routes->get(
    'contact',
    'Home::contact'
);

$routes->post(
    'contact/submit',
    'Home::submitContact'
);

$routes->get(
    'consultation',
    'Home::consultation'
);
$routes->post(
    'consultation/submit',
    'Home::submitConsultation'
);


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/

$routes->get(
    'admin/login',
    'Admin::login'
);

$routes->post(
    'admin/login',
    'Admin::login'
);

$routes->get(
    'admin/logout',
    'Admin::logout'
);


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

$routes->get(
    'admin',
    'Admin::index'
);


/*
|--------------------------------------------------------------------------
| ADMIN CONTACTS
|--------------------------------------------------------------------------
*/

$routes->get(
    'admin/contact/(:num)',
    'Admin::viewContact/$1'
);

$routes->get(
    'admin/contact/delete/(:num)',
    'Admin::deleteContact/$1'
);

$routes->post(
    'admin/contact/status/(:num)',
    'Admin::updateStatus/$1'
);


/*
|--------------------------------------------------------------------------
| ADMIN PASSWORD
|--------------------------------------------------------------------------
*/

$routes->get(
    'admin/change-password',
    'Admin::changePassword'
);

$routes->post(
    'admin/change-password',
    'Admin::changePassword'
);

$routes->get(
    'admin/forgot-password',
    'Admin::forgotPassword'
);

$routes->post(
    'admin/forgot-password',
    'Admin::forgotPassword'
);

$routes->get(
    'admin/reset-password/(:segment)',
    'Admin::resetPassword/$1'
);

$routes->post(
    'admin/reset-password/(:segment)',
    'Admin::resetPassword/$1'
);


/*
|--------------------------------------------------------------------------
| ADMIN ATTORNEYS
|--------------------------------------------------------------------------
*/

$routes->get(
    'admin/attorneys',
    'Admin::attorneys'
);

$routes->get(
    'admin/attorneys/add',
    'Admin::addAttorney'
);

$routes->post(
    'admin/attorneys/add',
    'Admin::addAttorney'
);

$routes->get(
    'admin/attorneys/edit/(:num)',
    'Admin::editAttorney/$1'
);

$routes->post(
    'admin/attorneys/edit/(:num)',
    'Admin::editAttorney/$1'
);

$routes->get(
    'admin/attorneys/delete/(:num)',
    'Admin::deleteAttorney/$1'
);


/*
|--------------------------------------------------------------------------
| ADMIN PRACTICE AREAS
|--------------------------------------------------------------------------
*/

$routes->get(
    'admin/practice-areas',
    'Admin::practiceAreas'
);

$routes->get(
    'admin/practice-areas/add',
    'Admin::addPracticeArea'
);

$routes->post(
    'admin/practice-areas/add',
    'Admin::addPracticeArea'
);

$routes->get(
    'admin/practice-areas/edit/(:num)',
    'Admin::editPracticeArea/$1'
);

$routes->post(
    'admin/practice-areas/edit/(:num)',
    'Admin::editPracticeArea/$1'
);

$routes->get(
    'admin/practice-areas/delete/(:num)',
    'Admin::deletePracticeArea/$1'
);


/*
|--------------------------------------------------------------------------
| ADMIN BLOG POSTS
|--------------------------------------------------------------------------
*/

$routes->get(
    'admin/posts',
    'Admin::posts'
);

$routes->get(
    'admin/posts/add',
    'Admin::addPost'
);

$routes->post(
    'admin/posts/add',
    'Admin::addPost'
);

$routes->get(
    'admin/posts/edit/(:num)',
    'Admin::editPost/$1'
);

$routes->post(
    'admin/posts/edit/(:num)',
    'Admin::editPost/$1'
);

$routes->get(
    'admin/posts/delete/(:num)',
    'Admin::deletePost/$1'
);

/*
|--------------------------------------------------------------------------
| ADMIN CONSULTATIONS
|--------------------------------------------------------------------------
*/

$routes->get(
    'admin/consultations',
    'Admin::consultations'
);

$routes->get(
    'admin/consultation/(:num)',
    'Admin::viewConsultation/$1'
);

$routes->post(
    'admin/consultation/status/(:num)',
    'Admin::updateConsultationStatus/$1'
);

$routes->get(
    'admin/consultation/delete/(:num)',
    'Admin::deleteConsultation/$1'
);