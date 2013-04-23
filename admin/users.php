<?PHP

/* * * Import init * **/
if(!defined('__SITE_PATH'))
	require('admin_init.php');

if( !secure()->hasUserAccess(__ROLE_ADMIN) ){
	display_error('no access!');
	load_view();
	die();
}

function user_role_name($roleID){
	switch ($roleID) {
		case 0: return 'Guest';
		case 1: return 'User';
		case 2: return 'Developer';
		case 3: return 'Admin';
		default: return 'None';
	}
}

$db = new OPC_Database();
$data['users'] = $db->get('OPC_Users');
load_view('users', $data);