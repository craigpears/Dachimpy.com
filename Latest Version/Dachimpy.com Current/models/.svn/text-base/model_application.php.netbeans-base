<?php
class model_application extends model_base_class {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_applications_data() {
        $applications_data = array();
        
        $sql = " SELECT site_application_id, site_application_title, site_application_date_added, site_application_description, ".
               " site_application_file_path, site_application_views, site_application_internal FROM site_applications";
        $results = $this->exec_sql($sql);
        
        while(($result = $results->fetch_assoc()) !== NULL) {
            $application = $result;
            if($application['site_application_internal'] == 'N') {
                $application['link'] = $application['site_application_file_path'];
            } else {
                $application['link'] = '/applications/view/application_id/'.$application['site_application_id'];
            }
            
            $applications_data[] = $application;
        }
        
        return $applications_data;
    }
    
    public function load_application_data($application_id) {
        $application_data = array();
        
        $sql = " SELECT site_application_id, site_application_title, site_application_date_added, site_application_description, ".
               " site_application_file_path, site_application_width, site_application_height, site_application_views FROM site_applications".
               " WHERE site_application_id = ".$this->escape_string($application_id);
        $results = $this->exec_sql($sql);
        $application_data = $results->fetch_assoc();
        
        return $application_data;
    }
    
    public function add_app_view($application__id) {
        $sql = " UPDATE site_applications SET site_application_views = site_application_views + 1 where site_application_id = " . $this->escape_string($application__id);
        $this->exec_sql($sql);        
    }
    
}
 
?>
