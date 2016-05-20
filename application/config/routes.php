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
//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'homepagecontroller';
$route['careers'] = 'careerscontroller';
$route['about-us'] = 'aboutuscontroller';
$route['our-team'] = 'ourteamcontroller';
$route['galleries'] = 'galleriescontroller';
$route['benefits'] = 'benefitscontroller';
$route['contact-us'] = 'contactuscontroller';

$route['sample'] = 'welcome/sample';

$route['admin'] = 'admin/AdminLoginController';
$route['admin/admin-login-exec'] = 'admin/AdminLoginController/login_exec';
$route['admin/admin-logout'] = 'admin/adminlogoutcontroller';

$route['admin/homepage'] = 'admin/AdminHomepageController';

$route['admin/admin-user-add'] = 'admin/AdminUserController/add';
$route['admin/admin-adduser-exec'] = 'admin/adminusercontroller/add_exec';
$route['admin/admin-user-view'] = 'admin/adminusercontroller/view';

$route['admin/admin-add-career'] = 'admin/admincareerscontroller';
$route['admin/admin-add-career-exec'] = 'admin/admincareerscontroller/add_exec';
$route['admin/admin-view-career'] = 'admin/admincareerscontroller/view';
$route['admin/admin-edit-career/(:num)'] = 'admin/admincareerscontroller/edit/$1';
$route['admin/admin-edit-career-exec'] = 'admin/admincareerscontroller/edit_exec';
$route['admin/admin-status-career'] = 'admin/admincareerscontroller/change_status';
$route['admin/admin-delete-career'] = 'admin/admincareerscontroller/delete';


$route['admin/admin-add-benefit'] = 'admin/adminbenefitscontroller'; //add benefits
$route['admin/admin-add-benefit-exec'] = 'admin/adminbenefitscontroller/add_exec'; // process -> adding benefits
$route['admin/admin-view-benefit'] = 'admin/adminbenefitscontroller/view'; // benefits list
$route['admin/admin-edit-benefit/(:num)'] = 'admin/adminbenefitscontroller/edit/$1';
$route['admin/admin-edit-benefit-exec'] = 'admin/adminbenefitscontroller/edit_exec';
$route['admin/admin-status-benefit'] = 'admin/adminbenefitscontroller/change_status';
$route['admin/admin-delete-benefit'] = 'admin/adminbenefitscontroller/delete';

//teams
$route['admin/admin-add-team'] = 'admin/adminteamscontroller';
$route['admin/admin-add-team-exec'] = 'admin/adminteamscontroller/add_exec';
$route['admin/admin-view-team'] = 'admin/adminteamscontroller/view';
$route['admin/admin-edit-team/(:num)'] = 'admin/adminteamscontroller/edit/$1';
$route['admin/admin-edit-team-exec'] = 'admin/adminteamscontroller/edit_exec';
$route['admin/admin-status-team'] = 'admin/adminteamscontroller/change_status';
$route['admin/admin-delete-team'] = 'admin/adminteamscontroller/delete';

$route['admin/admin-company/(:any)'] = 'admin/adminaboutscontroller';
$route['admin/admin-company-edit/(:num)'] = 'admin/adminaboutscontroller/edit/$1';
$route['admin/admin-company-edit-exec'] = 'admin/adminaboutscontroller/edit_exec';
$route['admin/admin-status-about'] = 'admin/adminaboutscontroller/change_status';

$route['admin/admin-add-values'] = 'admin/adminaboutvaluescontroller';
$route['admin/admin-add-value-exec'] = 'admin/adminaboutvaluescontroller/add_exec';
$route['admin/admin-view-value'] = 'admin/adminaboutvaluescontroller/view';
$route['admin/admin-edit-value/(:num)'] = 'admin/adminaboutvaluescontroller/edit/$1';
$route['admin/admin-edit-value-exec'] = 'admin/adminaboutvaluescontroller/edit_exec';
$route['admin/admin-status-value'] = 'admin/adminaboutvaluescontroller/change_status';
$route['admin/admin-delete_value'] = 'admin/adminaboutvaluescontroller/delete';

$route['admin/admin-image-slide'] = 'admin/adminslideimagescontroller';
$route['admin/admin-image-add-exec'] = 'admin/adminslideimagescontroller/add_exec';
$route['admin/admin-image-status'] = 'admin/adminslideimagescontroller/change_status';
$route['admin/admin-image-delete'] = 'admin/adminslideimagescontroller/delete';

$route['admin/admin-gallery'] = 'admin/admingalleriescontroller';
$route['admin/admin-album-add-exec'] = 'admin/admingalleryalbumscontroller/add_album_exec';
$route['admin/admin-add-gallery-exec'] = 'admin/admingalleriescontroller/add_image_exec';
$route['admin/admin-gallery-status'] = 'admin/admingalleryalbumscontroller/change_status';
$route['admin/admin-album-update-exec'] = 'admin/admingalleryalbumscontroller/update';
$route['admin/admin-gallery-image-delete'] = 'admin/admingalleriescontroller/delete';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
