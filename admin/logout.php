<?PHP

/* * * Import init * **/
if(!defined('__SITE_PATH'))
	require('admin_init.php');

secure()->logout();
redirect('admin/login.php');
