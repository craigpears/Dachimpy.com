<?php

class class_breadcrumb extends class_base_item {
    
    public $trail;
    
    public function __construct() {
        $this->trail = array();
        $this->add_page('Home','/index');
        parent::__construct();
    }
    
    function set_trail($trail) {
        if(is_array($trail) === false) {
            # The trail parameter must be an array
            $this->error_message = "Trail parameter must be an array";
            return false;
        }
        
        $this->trail = $trail;
    }
    
    function add_page($page_name, $page_link) {
        $this->trail[] = array('page_name' => $page_name, 'page_link' => $page_link);
    }
}
?>
