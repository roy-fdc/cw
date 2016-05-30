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
$route['default_controller'] = 'PageController';

$route['admin'] = 'admin/AdminLoginController';
$route['admin/admin-login-exec'] = 'admin/AdminLoginController/login_exec';
$route['admin/admin-logout'] = 'admin/AdminLogoutController';
$route['admin/homepage'] = 'admin/AdminHomepageController';
$route['admin/admin-user-add'] = 'admin/AdminUserController/add';
$route['admin/admin-adduser-exec'] = 'admin/AdminUserController/add_exec';
$route['admin/admin-user-view'] = 'admin/AdminUserController/view';
$route['admin/admin-add-career'] = 'admin/AdminCareersController';
$route['admin/admin-add-career-exec'] = 'admin/AdminCareersController/add_exec';
$route['admin/admin-view-career'] = 'admin/AdminCareersController/view';
$route['admin/admin-edit-career/(:num)'] = 'admin/AdminCareersController/edit/$1';
$route['admin/admin-edit-career-exec'] = 'admin/AdminCareersController/edit_exec';
$route['admin/admin-status-career'] = 'admin/AdminCareersController/change_status';
$route['admin/admin-delete-career'] = 'admin/AdminCareersController/delete';
$route['admin/admin-add-benefit'] = 'admin/AdminBenefitsController'; //add benefits
$route['admin/admin-add-benefit-exec'] = 'admin/AdminBenefitsController/add_exec'; // process -> adding benefits
$route['admin/admin-view-benefit'] = 'admin/AdminBenefitsController/view'; // benefits list
$route['admin/admin-edit-benefit/(:num)'] = 'admin/AdminBenefitsController/edit/$1';
$route['admin/admin-edit-benefit-exec'] = 'admin/AdminBenefitsController/edit_exec';
$route['admin/admin-status-benefit'] = 'admin/AdminBenefitsController/change_status';
$route['admin/admin-delete-benefit'] = 'admin/AdminBenefitsController/delete';
//teams
$route['admin/admin-add-team'] = 'admin/AdminTeamsController';
$route['admin/admin-add-team-exec'] = 'admin/AdminTeamsController/add_exec';
$route['admin/admin-view-team'] = 'admin/AdminTeamsController/view';
$route['admin/admin-edit-team/(:num)'] = 'admin/AdminTeamsController/edit/$1';
$route['admin/admin-edit-team-exec'] = 'admin/AdminTeamsController/edit_exec';
$route['admin/admin-status-team'] = 'admin/AdminTeamsController/change_status';
$route['admin/admin-delete-team'] = 'admin/AdminTeamsController/delete';
//company
$route['admin/admin-company/(:any)'] = 'admin/AdminAboutsController';
$route['admin/admin-company-edit/(:num)'] = 'admin/AdminAboutsController/edit/$1';
$route['admin/admin-company-edit-exec'] = 'admin/AdminAboutsController/edit_exec';
$route['admin/admin-status-about'] = 'admin/AdminAboutsController/change_status';
//values
$route['admin/admin-add-values'] = 'admin/AdminAboutValuesController';
$route['admin/admin-add-value-exec'] = 'admin/AdminAboutValuesController/add_exec';
$route['admin/admin-view-value'] = 'admin/AdminAboutValuesController/view';
$route['admin/admin-edit-value/(:num)'] = 'admin/AdminAboutValuesController/edit/$1';
$route['admin/admin-edit-value-exec'] = 'admin/AdminAboutValuesController/edit_exec';
$route['admin/admin-status-value'] = 'admin/AdminAboutValuesController/change_status';
$route['admin/admin-delete_value'] = 'admin/AdminAboutValuesController/delete';
//gallery album
$route['admin/admin-gallery'] = 'admin/AdminGalleriesController';
$route['admin/admin-album-add-exec'] = 'admin/AdminGalleryAlbumsController/add_album_exec';
$route['admin/admin-add-gallery-exec'] = 'admin/AdminGalleriesController/add_image_exec';
$route['admin/admin-gallery-status'] = 'admin/AdminGalleryAlbumsController/change_status';
$route['admin/admin-album-update-exec'] = 'admin/AdminGalleryAlbumsController/update';
$route['admin/admin-gallery-image-delete'] = 'admin/AdminGalleriesController/delete';
$route['admin/admin-album-delete'] = 'admin/AdminGalleryAlbumsController/delete';


// API routing starts here
$route['api/all-career'] = 'api/ApisController/all_career';
$route['api/single-career/(:num)'] = 'api/ApisController/single_career/$1';
//team
$route['api/all-team'] = 'api/ApisController/all_team';
$route['api/single-team/(:num)'] = 'api/ApisController/single_team/$1';
//benefit
$route['api/all-benefit'] = 'api/ApisController/all_benefit';
$route['api/single-benefit/(:num)'] = 'api/ApisController/single_benefit/$1';
//about
$route['api/company-detail'] = 'api/ApisController/company_detail';
$route['api/company-vision'] = 'api/ApisController/company_vision';
$route['api/company-mission'] = 'api/ApisController/company_mission';
//values
$route['api/all-value'] = 'api/ApisController/all_value';
$route['api/single-value'] = 'api/ApisController/single_value';

$route['api/all-slide-image'] = 'api/ApisController/slide_images';

$route['api/all-album'] = 'api/ApisController/all_album';
$route['api/single-album/(:num)'] = 'api/ApisController/single_album/$1';

$route['api/page-introduction'] = 'api/ApisController/page_introduction';

$route['contact-us/processMail'] = 'ContactusController/processMail';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
