<?php
class controller_cms extends controller_base_class
{
    
	public function __construct()
	{
            parent::__construct();            
            $this->breadcrumb->add_page('CMS','/cms/index');
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
            $this->display_page('cms/cms_flash_app');
            
        }
        
        public function articles() {
                        
            $this->breadcrumb->add_page('Articles','/cms/articles');
            // Check if there is an article to edit
            if(isset($GLOBALS['parameters']['edit_article'])) {
                return $this->edit_article($GLOBALS['parameters']['edit_article']);
            }
            
            // Check if an article is being saved
            if(isset($GLOBALS['parameters']['save_article'])) {
                return $this->save_article($GLOBALS['parameters']['save_article']);
            }
            
            // Otherwise, show a list of articles to edit            
            $this->display_page('cms/cms_articles_index');
            
        }
        
        protected function edit_article($article_href) {
            $article = load_model('article');
            $article_info = $article->get_article($article_href);
            
            $editor = new CuteEditor();
            $editor->Text = $article_info['article_content'];
            $editor->ID = "Editor";
            $editor->Height = 800;
            $editor->Width = 898;
            $editor->FilesPath="/libraries/CuteEditor/cuteeditor_files";
            
            $this->smarty->assign('editor',$editor->GetString());
            $this->smarty->assign('article_href',$article_href);
            
            $this->breadcrumb->add_page($article_info['article_name'],'/cms/articles/edit_article/' . $article_href);
            
            $this->display_page('cms/cms_edit_article');
        }
        
        protected function save_article($article_href) {
            
        }
}
?>
