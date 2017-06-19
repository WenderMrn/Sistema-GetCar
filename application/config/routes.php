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

//HOME
$route['default_controller'] = 'home_controller';

//AUTENTICACAO
$route['login'] = 'autenticacao_controller/login';
$route['logoff'] = 'autenticacao_controller/logoff';
$route['admin'] = 'autenticacao_controller/admin_login';
$route['admin/logoff'] = 'autenticacao_controller/admin_logoff';

//CADASTRAR USUARIO
$route['cadastrar'] = 'home_controller/cadastrar';

//CRUD ADMINISTRADOR
$route['painel/administradores'] = 'painel_controller/admin_list';
$route['painel/administradores/:num'] = 'painel_controller/admin_show';
$route['painel/administradores/editar/:num'] = 'painel_controller/admin_edit';
$route['painel/admin_edit_post'] = 'painel_controller/admin_edit_post';
$route['painel/administradores/adicionar'] = 'painel_controller/admin_add';
$route['painel/admin_add_post'] = 'painel_controller/admin_add_post';
$route['painel/administradores/deletar/:num'] = 'painel_controller/admin_delete';
$route['painel/admin_delete_post'] = 'painel_controller/admin_delete_post';
$route['painel/usuarios/pesquisar'] = 'painel_controller/search_users_json';


//CRUD USUÁRIO
$route['painel/usuarios'] = 'painel_controller/user_list';
$route['painel/usuarios/:num'] = 'painel_controller/user_show';
$route['painel/usuarios/editar/:num'] = 'painel_controller/user_edit';
$route['painel/usuarios/aprovar/:num'] = 'painel_controller/user_accept';
$route['painel/usuarios/negar/:num'] = 'painel_controller/user_deny';
$route['painel/user_edit_post'] = 'painel_controller/user_edit_post';
$route['painel/usuarios/adicionar'] = 'painel_controller/user_add';
$route['painel/user_add_post'] = 'painel_controller/user_add_post';
$route['painel/usuarios/deletar/:num'] = 'painel_controller/user_delete';
$route['painel/user_delete_post'] = 'painel_controller/user_delete_post';

//MIGRATION
$route['install'] = 'migrate/index';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
