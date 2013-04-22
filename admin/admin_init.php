<?PHP

/* * * define the site path * * */
$site_path = realpath(dirname(__FILE__).'/..').'/';
define('__SITE_PATH', $site_path);

/* * * define the application path * * */
define('__APPLICATION_PATH', __SITE_PATH.'application/');

/* * * define the admin path * * */
define('__ADMIN_PATH', __SITE_PATH.'admin/');

/* * * define the config path * * */
define('__CONFIG_PATH', __APPLICATION_PATH.'config/');

/* * * Include error handling * * */
require(__APPLICATION_PATH.'core/Errors.php');

/*
* ------------------------------------------------------
*  Load the global functions and classes
* ------------------------------------------------------
*/
require(__APPLICATION_PATH.'core/Common.php');

/*
* ------------------------------------------------------
*  Load the OpenPhpCms settings
* ------------------------------------------------------
*/
OPC_Settings::init();

/*
* ------------------------------------------------------
*  Set Session handler and start session
* ------------------------------------------------------
*/
$handler = new OPC_Session();
session_set_save_handler(
    array($handler, 'open'),
    array($handler, 'close'),
    array($handler, 'read'),
    array($handler, 'write'),
    array($handler, 'destroy'),
    array($handler, 'gc')
    );

session_start();

/*
* ------------------------------------------------------
*  Function for loading admin views
* ------------------------------------------------------
*/
if (!function_exists('load_view')) {

    function load_view($file, $data = array()) {
    	/* Set variables from array */
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        $file = __ADMIN_PATH . 'views/' . $file . '.php';
        if (!is_readable($file)) {
            throw new Exception("View file not exists '" . $file . "'");
        }
        require(__ADMIN_PATH."essentials/header.php");
		require(__ADMIN_PATH."essentials/sidebar.php");
		require(__ADMIN_PATH."essentials/topbar.php");
		echo "<section class=\"main\">";
        require($file);
        echo "</section>";
        require(__ADMIN_PATH."essentials/footer.php");
    }

}


/*
* ------------------------------------------------------
*  Load the OPC_Secure class and define user roles
* ------------------------------------------------------
*/
require(__ADMIN_PATH.'Secure.php');

define('__ROLE_GUEST'	, 0);
define('__ROLE_USER'	, 1);
define('__ROLE_DEV'		, 2);
define('__ROLE_ADMIN'	, 3);

/*
* ------------------------------------------------------
*  Check if user is loggedin
* ------------------------------------------------------
*/

$secure = new OPC_Secure();
if(!defined('__LOGIN_PAGE') && !$secure->isLoggedin()){
	redirect('admin/login.php');
	die();
}
$secure = null;
