<?PHP

/* * * Import init * **/
if(!defined('__SITE_PATH'))
	require('admin_init.php');

if( !secure()->hasUserAccess(__ROLE_ADMIN) ){
	display_error('no access!');
	load_view();
	die();
}

$data['username'] 	= '';
$data['password'] 	= '';
$data['level'] 		= 1;
$data['name'] 		= '';
$data['surname'] 	= '';
$data['email'] 		= '';

$data['error_username'] = '';
$data['error_password'] = '';
$data['error_level'] 	= '';
$data['error_name'] 	= '';
$data['error_surname'] 	= '';
$data['error_email'] 	= '';

if(isset($_POST['user_submit'])){
	$data['username'] 	= $_POST['user_username'];
	$data['password'] 	= $_POST['user_password'];
	$data['level'] 		= $_POST['user_level'];
	$data['name'] 		= $_POST['user_name'];
	$data['surname'] 	= $_POST['user_surname'];
	$data['email'] 		= $_POST['user_email'];

	$validate = true;

	/**
	* @todo validate
 	*/

	if($validate){
		$db = new OPC_Database();
		$binds['username'] 	= $data['username'];
		$binds['password'] 	= secure()->hashPassword($data['password']);
		$binds['level'] 	= $data['level'];
		$binds['name'] 		= $data['name'];
		$binds['surname'] 	= $data['surname'];
		$binds['email'] 	= $data['email'];
		$db->insert('OPC_Users', $binds);

		display_succes('User <username> is added');
		redirect('admin/users.php');
	}
}

$user_roles = array(
"0" => "Guest",
"1" => "User",
"2" => "developer",
"3" => "Admin"
);

$data['user_roles'] = '';
foreach ( $user_roles as $key=>$value ) {
	$selected = ( ($data['level']==$key) ? 'selected="selected"' : '');
	$data['user_roles'].= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>\n';
}

load_view('user_add', $data);