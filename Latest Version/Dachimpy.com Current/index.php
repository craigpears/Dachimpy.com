<?php
# Load any constants

// Local constants
#define('WEBSITE_DIR','/project/www.dachimpy.com/website');

// Online Constants
define('WEBSITE_DIR','/home/www/dachimpy.com/');


define('SMARTY_DIR',WEBSITE_DIR . 'libraries/Smarty-3.1.7/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');

require_file('configs/config.php');
require_file('common_functions.php');
#require all the core libraries and classes
load_class('base_item');
load_controller('base_class');
load_model('base_class');


# Send the request through to the appropriate page
$router = load_class('router');
$router->execute();

function require_file($file) {
    require_once(WEBSITE_DIR .  $file);
}

?>
