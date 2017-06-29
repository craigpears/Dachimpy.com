<?php
class class_base_item
{
    public $error_message;
    
    public function __construct()
    {
            
    }
    
    function escape_string($string) {
        return "'".$GLOBALS['database_connection']->real_escape_string($string)."'";        
    }   
}
?>
