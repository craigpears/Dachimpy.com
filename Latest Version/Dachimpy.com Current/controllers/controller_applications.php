<?php
class controller_applications extends controller_base_class
{
    
	public function __construct()
	{
            parent::__construct();            
            $this->breadcrumb->add_page('Applications','/applications/index');
	}
	
	public function index()
	{           
            $application = load_model('application');
            $applications_data = $application->get_applications_data();
            //debug($applications_data);
            $this->smarty->assign('applications_data',$applications_data);
            $this->display_page('applications');
	}
        
        public function view() {
            if(isset($GLOBALS['parameters']['application_id'])) {
                $application_id = $GLOBALS['parameters']['application_id'];
            } else {
                my_error_handler('No application id was found');
            }
            
            $application = load_model('application');
            $application_data = $application->load_application_data($application_id);
            $application->add_app_view($application_id);
            
            $application_title = $application_data['site_application_title'];
            $this->breadcrumb->add_page($application_title,'/applications/view/application_id/'.$application_id);
            $this->smarty->assign('application_title', $application_title);
            $this->smarty->assign('application_data',$application_data);
            //debug($application_data);
            $this->display_page('application_view');
        }
        
        
}
?>
