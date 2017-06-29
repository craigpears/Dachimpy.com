<?php
class controller_cms extends controller_base_class
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
            $this->display_page('cms/cms_index');
	}
        
        public function flash_app() {
            $form_submitted = false;
            if(isset($_FILES["app_source"]["name"])) {
                # If the form has been submitted, then save the new app
                $form_submitted = true;
                
                # Move the uploaded file to the applications directory
                if (file_exists(APP_DIR . $_FILES["app_source"]["name"])) {
                    # Make sure that the file doesn't already exist
                    my_error_handler(APP_DIR . $_FILES["app_source"]["name"] . " already exists. ");
                } else {
                    move_uploaded_file($_FILES["app_source"]["tmp_name"],
                                    APP_DIR . $_FILES["app_source"]["name"]);
                    
                    $app_src_location = APP_DIR . $_FILES["app_source"]["name"];
                    $this->smarty->assign('app_src_location', $app_src_location);
                    
                    $cms = load_model('cms');
                    $app_name = $_POST['app_name'];
                    $app_description = $_POST['app_description'];
                    $app_width = $_POST['app_width'];
                    $app_height = $_POST['app_height'];
                    $cms->save_app($app_src_location, $app_name, $app_description, $app_width, $app_height);
                }
                                
            } 
            
            
            
            $this->smarty->assign('form_submitted', $form_submitted);
            $this->display_page('cms/flash_app');
            
        }
        
        
}
?>
