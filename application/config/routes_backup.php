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
$route['default_controller'] = 'Controller_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//login
$route['login']['get'] = 'Controller_login/index';
$route['login']['post'] = 'Controller_login/getlogin';
$route['register']['get'] = 'Controller_login/registrasi';
$route['register']['post'] = 'Controller_login/regis';
$route['logout'] = 'Controller_login/logout';
$route['forum'] = 'Controller_home/index';
$route['profile'] = 'Controller_home/profile';
$route['suntingprofile'] = 'Controller_home/sunting';
$route['ubahpassword'] = 'Controller_home/password';

//admin
$route['admin'] = 'Controller_admin/index';
$route['admin/tambahuser'] = 'Controller_admin/tambahuser';
$route['admin/suntinguser/(:num)'] = 'Controller_admin/suntinguser/$1';
$route['admin/alatukur'] = 'Controller_admin/alatukur';
$route['admin/dilaporkan'] = 'Controller_admin/reported';

//guru
$route['guru'] = 'Controller_guru/index';
$route['guru/creative'] = 'Controller_guru/alatukur';
$route['guru/aktivitassiswa/(:num)'] = 'Controller_guru/aktivitassiswa/$1';
$route['guru/materi'] = 'Controller_guru/materi';
$route['guru/edit/(:num)'] = 'Controller_guru/edit/$1';
$route['guru/editsub/(:num)'] = 'Controller_guru/editsub/$1';
$route['guru/tugassiswa'] = 'Controller_guru/tugas';
$route['guru/videotugas/(:num)'] = 'Controller_guru/videotugas/$1';
$route['guru/evalsiswa'] = 'Controller_guru/evaluasi';
$route['guru/videoevaluasi/(:num)'] = 'Controller_guru/videoevaluasi/$1';

//siswa
$route['siswa'] = 'Controller_siswa/index';
$route['creative'] = 'Controller_siswa/creativelearning';
$route['dashboard'] = 'Controller_siswa/dashboard';
$route['pengertian'] = 'Controller_siswa/pengertian';
$route['materi/(:num)/(:num)'] = 'Controller_siswa/materi/$1/$2';
$route['tugas'] = 'Controller_siswa/tugas';
$route['rekamtugas/(:num)/(:num)'] = 'Controller_siswa/rekamtugas/$1/$2';
$route['evaluasi'] = 'Controller_siswa/evaluasi';
$route['rekamevaluasi'] = 'Controller_siswa/rekamevaluasi';
