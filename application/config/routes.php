<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//default router
$route['default_controller'] = 'home';


$route['login'] = 'auth/login';
$route['admin'] = 'admin/admin';
$route['lupa-password'] = 'auth/forgot';
$route['login/identify'] = 'auth/login/forget';
$route['register'] = 'auth/register';

// lapangan
$route['admin/input_lapangan'] = 'admin/lapangan/input_lapangan';
$route['admin/edit_lapangan/(:num)'] = 'admin/lapangan/edit_lapangan/$1';


//booking
$route['admin/input_booking'] = 'admin/booking/input_booking';
$route['admin/edit_halaman/(:num)'] = 'admin/booking/edit_halaman/$1';


// error routes
$route['auth/forgot'] = 'auth/forbidden';
$route['auth/login'] = 'auth/forbidden';
$route['admin/akun'] = 'errors/error_500';
$route['admin/cek_kode_booking'] = 'errors/error_500';
$route['404_override'] = 'errors';


// pelanggan routes
$route['admin/input_pelanggan'] = 'admin/pelanggan/input_pelanggan';
$route['admin/pelanggan'] = 'admin/pelanggan/daftar_pelanggan';
$route['translate_uri_dashes'] = FALSE;



//tour 

$route['admin/edit_tour/(:num)'] = 'admin/tour/edit_tour/$1';


// Membership 
$route['admin/daftar_member'] = 'admin/member';
$route['member/login'] = 'member/auth/login';
$route['member'] = 'member/member';
$route['member/register'] = 'member/auth/register';

// pembayaran 
$route['admin/booking/pay/(:num)'] = 'admin/booking/pay/$1';

