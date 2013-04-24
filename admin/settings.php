<?PHP

/* * * Import init * **/
if(!defined('__SITE_PATH'))
	require('admin_init.php');

if( !secure()->hasUserAccess(__ROLE_ADMIN) ){
	display_error('no access!');
	load_view();
	die();
}

load_class('DateAndTime', 'lib');
$date_and_time = new DateAndTime();
$timezone_arr = $date_and_time->getTimezoneArray();

$data['title'] 			= OPC_Settings::get('title');
$data['slogan'] 		= OPC_Settings::get('slogan');
$data['description'] 	= OPC_Settings::get('description');
$data['titleformat'] 	= OPC_Settings::get('title_format');
$data['email'] 			= OPC_Settings::get('admin_email');
$data['baseurl'] 		= OPC_Settings::get('base_url');

$data['timezone'] = '';
foreach ( $timezone_arr as $key=>$value ) {
	//$selected = ( ($_POST['gmt']==$key) ? $selected ='selected="selected"' : $selected = '' );
	$data['timezone'].= '<option value="'.$key.'">'.$value.'</option>\n';
}

$data['longDateFormat'] 	= $date_and_time->getLongDateFormat();
$data['mediumDateFormat'] 	= $date_and_time->getMediumDateFormat();
$data['shortDateFormat'] 	= $date_and_time->getShortDateFormat();

load_view('settings', $data);
