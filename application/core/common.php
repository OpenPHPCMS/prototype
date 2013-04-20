<?PHP if (!defined('__SITE_PATH')) exit('No direct script access allowed');
/**
 * OpenPhpCms
 *
 * An open CMS for PHP/MYSQL
 *
 * @author		Maikel Martens
 * @copyright   Copyright (c) 20013 - 2013, openphpcms.org.
 * @license		http://openphpcms.org/license.html
 * @link		http://openphpcms.org
 * @since		Version 1.0
 */
// ------------------------------------------------------------------------

/**
 * Common Functions
 *
 * Loads the commen functions and classes.
 *
 * @package		MartensMCV
 * @subpackage          Core
 * @category            Core
 * @author		Maikel Martens
 */
// ------------------------------------------------------------------------

/*
 * Keep track of wich class is already loaded
 */

$loaded_class = array();

// ------------------------------------------------------------------------

/**
 * Class Loader
 *
 * Loads file with name with $param.php
 *
 * @access	public
 * @param	string	the class name being requested
 * @param	string	the directory where the class should be found, default lib
 * @return	boolean
 */
if (!function_exists('load_class')) {

    function load_class($class, $path = "lib") {
        global $loaded_class;
        $file = __APPLICATION_PATH . $path . "/" . $class . ".php";
        if (is_readable($file) && !in_array($class, $loaded_class)) {
            $loaded_class[] = $class;
            include($file);
            return true;
        } else {
            return false;
        }
    }

}

/**
 * random String
 *
 * Create an random string of the given length
 *
 * @access	public
 * @param	int		the length of the random string
 * @return	String
 */
if(!function_exists('random_string')){
    function random_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        $size = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        return $str;
    }
}

/* load super class page */
load_class("page", "core");

/* load class template */
load_class("template", "core");

/* load class database */
load_class("database", "core");

/* End of file common.php */
/* Location: ./application/core/common.php */