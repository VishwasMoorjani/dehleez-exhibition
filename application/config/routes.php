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
$route['default_controller'] = 'home';
$route['about'] = 'home/about';
$route['exhibitions'] = 'home/exhibitions';
$route['completed'] = 'home/completed'; 
$route['upcoming'] = 'home/upcoming';
$route['ongoing'] = 'home/ongoing';
$route['stalls/(:any)'] = 'home/stalls/$1';
$route['gallery'] = 'home/gallery';
$route['video'] = 'home/video';
$route['checkout'] = 'home/checkout';
$route['blog'] = 'home/blogs';
$route['blog(:any)'] = 'home/blog/$1';
$route['cart'] = 'home/cart';
$route['contact'] = 'home/contact';
$route['enquiry'] = 'home/enquiry';
$route['check_availability'] = 'home/check_availability';
$route['careers-thanks'] = 'home/careersenquiry';

$route['privacy-policy'] = 'home/privacy';
$route['terms-conditions'] = 'home/terms';
$route['refund-policy'] = 'home/refund';

$route['blog'] = 'home/blogs';
$route['blog/category/(:any)'] = 'home/category/$1';
$route['blog/(:any)'] = 'home/blog/$1';

$route['thanks'] = 'home/thanks';
$route['error'] = 'home/error';


$route['register'] = 'user/register';
$route['register/(:any)'] = 'user/register/$1';


$route['404_override'] = 'home/redirecterror';
$route['translate_uri_dashes'] = FALSE;
$route['admin/change-password'] = 'admin/change_password';



$route['staff/deactivate/category/(:any)'] = 'staff/deactivate/category/$1';
$route['staff/activate/category/(:any)'] = 'staff/activate/category/$1';
$route['staff/delete/category/(:any)'] = 'staff/delete/category/$1';

$route['staff/deactivate/product/(:any)'] = 'staff/deactivate/product/$1';
$route['staff/activate/product/(:any)'] = 'staff/activate/product/$1';
$route['staff/delete/product/(:any)'] = 'staff/delete/product/$1';


$route['staff/editproduct/removeimg/(:any)'] = 'staff/removeimg/$1';
$route['staff/editproduct/removepdf/(:any)'] = 'staff/removepdf/$1';

$route['staff/editcategory/removeimg/(:any)'] = 'staff/removecatimg/$1';

$route['staff/editcarcategory/removeimg/(:any)'] = 'staff/removecarcatimg/$1';
$route['staff/editfarmcategory/removeimg/(:any)'] = 'staff/removefarmcatimg/$1';

$route['staff/editsubcategory/removeimg/(:any)'] = 'staff/removecatimg/$1'; 
$route['staff/editclient/removeclient/(:any)'] = 'staff/removeclient/$1';   

$route['staff/editblog/removeimage/(:any)'] = 'staff/removeblogger/$1';   
$route['staff/editblog/removeimg/(:any)'] = 'staff/removeblog/$1';   
$route['staff/editbrand/removebrand/(:any)'] = 'staff/removebrand/$1';   
$route['staff/editservice/removeservice/(:any)'] = 'staff/removeservice/$1';   

$route['staff/removeabout'] = 'staff/removeabout';

$route['staff/change-password'] = 'staff/changepassword';

$route['staff/allusers'] = 'staff/users/all';
$route['staff/users'] = 'staff/users/customer';
$route['staff/subscribers'] = 'staff/users/subscriber';

$route['staff/editproduct/getsubcategory'] = "staff/getsubcategory";    