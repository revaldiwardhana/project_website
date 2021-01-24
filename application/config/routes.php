<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//customize
$route['logout'] = 'login/logout';
$route['register'] = 'login/register';
$route['register_act'] = 'login/register_act';
