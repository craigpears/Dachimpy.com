<?php
    # Define some constants
    define('SMARTY_DIR',WEBSITE_DIR . 'libraries/Smarty-3.1.7/libs/');
    
    // Local Settings
    /*
    define('DB_LOCAL','127.0.0.1');
    define('DB_USER','root');
    define('DB_PASSWORD','net10craig');*/
    
    // Online Settings
    define('DB_LOCAL','localhost');
    define('DB_USER','dachimpy_site');
    define('DB_PASSWORD','2217526');
    
    $GLOBALS['database_connection'] = new mysqli(DB_LOCAL, DB_USER, DB_PASSWORD, 'dachimpy_site');
?>
