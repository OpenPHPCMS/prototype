<?PHP

/* * * Import init * **/
if(!defined('__SITE_PATH'))
	require('admin_init.php');

if( !secure()->hasUserAccess(__ROLE_USER) ){
	display_error('no access!');
	load_view();
	die();
}

$data['types'] = '';

$path = __APPLICATION_PATH.'pages/';

foreach (scandir($path) as $file) {
	if($file != '.' && $file != '..' && is_dir($path.$file))
		$data['types'] = '<option>'.$file.'</option>\n';
}

$db = new OPC_Database();
$data['pages'] = $db->get('OPC_Pages');

load_view('pages', $data);