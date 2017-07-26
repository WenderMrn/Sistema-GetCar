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

//DASHBOARD
$route['dashboard'] = 'painel_controller/index';

//AUTENTICACAO
$route['login'] = 'autenticacao_controller/login';
$route['logoff'] = 'autenticacao_controller/logoff';
$route['admin'] = 'autenticacao_controller/admin_login';
$route['admin/logoff'] = 'autenticacao_controller/admin_logoff';
$route['user/logoff'] = 'autenticacao_controller/logoff';

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
$route['painel/avaliacoes'] = 'painel_controller/avaliacao_list';
$route['painel/credito'] = 'painel_controller/credito';
$route['painel/get_user_to_credit'] = 'painel_controller/get_user_to_credit';

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

//CRUD AVALIAÇÃO
$route['shop/avaliacao'] = 'avaliacao_controller';
$route['painel/avaliacao/:num'] = 'painel_controller/avaliacao_show';
$route['painel/avaliacao_delete_post'] = 'painel_controller/avaliacao_delete_post';

//CRUD PONTO DE LOCAÇÃO
$route['painel/pontos'] = 'ponto_controller/ponto_list';
$route['painel/pontos/adicionar'] = 'ponto_controller/ponto_add';
$route['painel/pontos/editar/:num'] = 'ponto_controller/ponto_edit';
$route['painel/pontos/:num'] = 'ponto_controller/ponto_show';
$route['painel/pontos/deletar/:num'] = 'ponto_controller/ponto_delete';

//CRUD PONTO DE VEÍCULOS
$route['painel/veiculos'] = 'veiculo_controller/veiculo_list';
$route['painel/veiculo/adicionar'] = 'veiculo_controller/veiculo_add';
$route['painel/veiculo/create'] = 'veiculo_controller/veiculo_add_post';

//MIGRATION
$route['migrate'] = 'migrate/index';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
