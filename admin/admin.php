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