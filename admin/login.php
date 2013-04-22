<?PHP
define('__LOGIN_PAGE'	, 1);

/* * * Import init * **/
if(!defined('__SITE_PATH'))
	require('admin_init.php');

$secure = new OPC_Secure();

$data['username'] 	= '';
$data['loginError'] = '';

if( isset($_POST['login_submit']) ){
	$data['username'] = $_POST['login_username'];
	if( $_POST['login_token'] != $_SESSION['login_token'] ) {
		$data['loginError'] .= "Login session has expired.<br/>";
	} else {

		if( !$secure->login($_POST['login_username'], $_POST['login_password']))
			$data['loginError'] .= "Incorrect username or password.<br/>"; 
		}
}

if( $secure->isLoggedin()) {
	redirect('admin');
} else {
	$_SESSION['login_token'] = random_string(32);
	load_view('login', $data);
}