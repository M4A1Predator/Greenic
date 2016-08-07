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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'sight';
//$route['default_controller'] = 'main/home/test';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Custom routes
// View routes
$route['index'] = 'main/Home';
$route['main'] = 'main/Home';
$route['sos'] = 'Sight/page';

// Control routes
$route['verify_account/(:num)/(:any)'] = 'main/Sigh_up/verify_account';

// Test routes
$route['test'] = 'main/Home/test';
$route['test/status'] = 'test/Test_status/show_status';
$route['test/project_type'] = 'test/Test_project_type/test_project_type';
$route['test/status_filter'] = 'test/Test_status/filter_status';
$route['test/status_filter_single'] = 'test/Test_status/filter_single_status';

$route['test/add_admin'] = 'test/Test_member/add_admin';
$route['test/add_member'] = 'test/Test_member/add_member';
$route['test/crypt'] = 'test/Test_member/crypt';
$route['test/crypt2'] = 'test/Test_member/random_string';
$route['test/member_login'] = 'test/Test_member/login';
$route['test/send_email'] = 'test/Test_member/send_email';
$route['test/time'] = 'test/Test_member/get_time';

// No data
//$route['(.*)'] = 'sight';