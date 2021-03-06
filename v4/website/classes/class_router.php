<?php

/**
 * This class takes the URL and works out what controller and function to pass the request to 
 */
class class_router extends class_base_item {
    public function __construct() {
        parent::__construct();
    }
    
    public function execute() {
        // Remove any params
        if(strpos($_SERVER['REQUEST_URI'], '?') == false)
            $url = $_SERVER['REQUEST_URI'];
        else
        {
            $url = split('?', $_SERVER['REQUEST_URI']);
            $url = $url[0];            
        }
            
        
        $url_parts = explode('/', $url);
        
        # Check if this is online in a temporary folder
        if($url_parts[1] == 'website') {
            array_shift($url_parts);
        }
        
        if(isset($url_parts[1]) && $url_parts[1] !== '') {
            $controller_name = $url_parts[1];
        } else {
            $controller_name = 'index';
        } 
       $controller_filename = 'controller_'.$controller_name.'.php';
        $controller_class_name = 'controller_'.$controller_name;
        
        if(isset($url_parts[2])) {
            $function_name = $url_parts[2];
        } else {
            $function_name = 'index';
        }        
        # Process the rest of the url as parameters
        $parameters = array_slice($url_parts,3);
        $GLOBALS['parameters'] = array();
        
        for($i = 0; $i < sizeof($parameters); $i += 2){
            # Check that there is both a parameter name and value
            if(isset($parameters[$i]) && isset($parameters[$i+1])) {
                $GLOBALS['parameters'][$parameters[$i]] = $parameters[$i+1];
            }
        }
        
        # Require the controller
        $controller_path = WEBSITE_DIR . 'controllers/'.$controller_filename;
        if(file_exists($controller_path)) {
            load_controller($controller_name);
        } else {
            my_error_handler("Invalid controller name given");
        }
        
        # Execute the function
        $controller = new $controller_class_name();
        $controller->$function_name();
        
        
    }
}
?>
