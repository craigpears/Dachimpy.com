<?php
    # Define some constants
    
    // Local Settings
    define('DB_HOSTNAME','localhost'); // database host name
    define('DB_USERNAME', 'root');     // database user name
    define('DB_PASSWORD', 'net10craig'); // database password
    define('DB_NAME', 'dachimpy_site'); // database name     
    define('DB_TYPE', 'mysql');  // database type
    define('DB_CHARSET','utf8'); // ex: utf8(for mysql),AL32UTF8 (for oracle), leave blank to use the default charset
    
    // Online Settings
/*
    define('DB_HOSTNAME','localhost'); // database host name
    define('DB_USERNAME', 'dachimpy_site');     // database user name
    define('DB_PASSWORD', '2217526'); // database password
    define('DB_NAME', 'dachimpy_site'); // database name     
    define('DB_TYPE', 'mysql');  // database type
    define('DB_CHARSET','utf8'); // ex: utf8(for mysql),AL32UTF8 (for oracle), leave blank to use the default charset*/
    
    $GLOBALS['database_connection'] = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>
