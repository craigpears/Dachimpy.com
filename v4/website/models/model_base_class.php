<?php
class model_base_class extends class_base_item {
    
    public function __construct() {
        parent::__construct();
    }
        
    public function exec_sql($sql) {
        if($sql == '') {
            my_error_handler('No SQL provided');
        }
        $results = $GLOBALS['database_connection']->query($sql);
        
        if (!$results) {
           my_error_handler('Invalid query: ' . $GLOBALS['database_connection']->error);
        }
        
        return $results;
    }
    
    
}
 
?>
