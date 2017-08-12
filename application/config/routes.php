<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

// $route['default_controller'] = "welcome";
// $route['default_controller'] = "home";
$route['default_controller'] = "dashboard";
$route['users/(:num)'] = "users/index/$1";
$route['operations/(:num)'] = "operations/index/$1";
$route['teams/(:num)'] = "teams/index/$1";
$route['companies/(:num)'] = "companies/index/$1";
$route['situations/(:num)'] = "situations/index/$1";
$route['jobs/(:num)'] = "jobs/index/$1";
$route['employees/(:num)'] = "employees/index/$1";
$route['workers/(:num)'] = "workers/index/$1";
$route['workers/listworkers(:num)'] = "workers/listworkers/$1";
$route['doctors/(:num)'] = "doctors/index/$1";
$route['type_certificates/(:num)'] = "type_certificates/index/$1";
$route['health_stations/(:num)'] = "health_stations/index/$1";
$route['day_offs/(:num)'] = "day_offs/index/$1";
$route['cids/(:num)'] = "cids/index/$1";
$route['medical_certificates/(:num)'] = "medical_certificates/index/$1";
$route['measures/(:num)'] = "measures/index/$1";
$route['feedbacks/(:num)'] = "feedbacks/index/$1";
$route['listmedicalcertificates/(:num)'] = "listmedicalcertificates/index/$1";
$route['attendances/(:num)'] = "attendances/index/$1";
$route['attendances/add/(:num)'] = "attendances/add/index/$1";
$route['typeAttendances/(:num)'] = "typeAttendances/index/$1";
$route['maternities/(:num)'] = "maternities/index/$1";
$route['experiences/(:num)'] = "experiences/index/$1";
$route['404_override'] = '';

//localhost/sgp_cib/attendances/add/11/12/127


/* End of file routes.php */
/* Location: ./application/config/routes.php */
