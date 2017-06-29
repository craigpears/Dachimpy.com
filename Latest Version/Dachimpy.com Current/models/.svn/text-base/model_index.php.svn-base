<?php
class model_index extends model_base_class {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_site_updates() {
        $sql = "SELECT site_update_date, site_update_content FROM site_updates ORDER BY site_update_date DESC LIMIT 0,6";
        $results = $this->exec_sql($sql);
        $updates = array();
        while(($result = $results->fetch_assoc()) !== NULL) {
            $update = $result;
            $updates[] = $update;
        } 
        
        return $updates;
    }
    
    public function external_links_menu_info() {
        $sql = "SELECT * FROM site_external_links ORDER BY site_external_link_title";
        $results = $this->exec_sql($sql);
        $external_links = array();
        while(($result = $results->fetch_assoc()) != false) {
            $external_link = $result;
            $external_links[] = $external_link;
        } 
        return $external_links;
    }
    
}
 
?>
