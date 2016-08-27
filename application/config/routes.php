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

$route['my_account'] = 'main/Member_ctrl/member_detail_page';

$route['add_project/([a-zA-Z0-9]{0,})'] = 'main/Project_ctrl/add_project_page';
$route['my_projects'] = 'main/Project_ctrl/member_projects_page';
$route['project/(:num)'] = 'main/Project_ctrl/view_project_page/$1';
$route['my_project/(:num)/([a-zA-Z0-9]{0,})'] = 'main/Project_ctrl/edit_project_page/$1/$2';

// Control routes
$route['sign_in'] = 'main/Authentication/authen';
$route['sign_out'] = 'main/Authentication/sign_out';
$route['check_exist_email_pro'] = 'main/Sign_up/check_unique_email';
$route['regis_pro'] = 'main/Sign_up/sign_up_pro';
$route['verify_account/(:num)/(:any)'] = 'main/Sign_up/verify_account';
$route['edit_my_account_pro'] = 'main/Member_ctrl/edit_member_pro';

$route['get_last_projects_ajax'] = 'main/Home/get_last_projects_ajax';
$route['get_categories_ajax'] = 'main/Category_ctrl/get_categories_ajax';
$route['get_sub_categories_ajax/(:num)'] = 'main/Category_ctrl/get_sub_categories_ajax/$1';
$route['get_all_units_ajax'] = 'main/Product_ctrl/get_all_units_ajax';
$route['get_project_posts_ajax'] = 'main/Project_post_ctrl/get_project_posts_ajax';
$route['get_project_shipments_ajax/(:num)'] = 'main/Shipment_ctrl/get_project_shipments_ajax/$1';
$route['member/get_farms_ajax'] = 'main/Farm_ctrl/get_member_farms_ajax';
$route['member/get_projects_ajax'] = 'main/Project_ctrl/get_member_projects_ajax';

$route['member_add/category_ajax'] = 'main/Category_ctrl/add_category_member_ajax';
$route['member/add_farm_ajax'] = 'main/Farm_ctrl/add_farm_ajax';
$route['member/add_project_step1_ajax'] = 'main/Project_ctrl/add_project_step1_ajax';
$route['member/add_project_step2_ajax'] = 'main/Project_ctrl/add_project_step2_ajax';
$route['member/add_project_step3_ajax'] = 'main/Project_ctrl/add_project_step3_ajax';
$route['member/add_project_post_ajax'] = 'main/Project_post_ctrl/add_project_post_ajax';

$route['get_all_provinces_ajax'] = 'main/Address_ctrl/get_all_provinces_ajax';
$route['get_districts_ajax'] = 'main/Address_ctrl/get_districts_ajax';
$route['get_sub_district_pro'] = 'main/Address_ctrl/get_sub_district';


// Test routes
$route['test'] = 'main/Home/test';
$route['test/gen'] = 'test/Test_general/test';
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
$route['test/member/change_type'] = 'test/Test_member/change_type';

$route['test/session'] = 'test/Test_session';
$route['test/flashdata'] = 'test/Test_session/flashdata';
$route['subtest'] = 'test/subtest/Test_directory';

// No data
//$route['(.*)'] = 'sight';