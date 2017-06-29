<?php
class controller_category extends controller_base_class
{
    public $category_name;
    public $formatted_category_name;
    
	public function __construct()
	{
            parent::__construct();
            
            # Make sure that we have a category name
            if(isset($GLOBALS['parameters']['category_name']) && $GLOBALS['parameters']['category_name'] != '') {
                $this->category_name = $GLOBALS['parameters']['category_name'];
            } else {
                my_error_handler('No category name was found');
            }
            
            $this->formatted_category_name = ucfirst(strtolower($this->category_name));
            $this->breadcrumb->add_page($this->formatted_category_name,'/category/view/category_name/'.$this->category_name);
            
            $this->smarty->assign('category_name',$this->category_name);
            $this->smarty->assign('formatted_category_name',$this->formatted_category_name);
	}
        
        public function index() {
            # Load the category information
            $category = load_model('category');
            if(($category_data = $category->get_category_data($this->category_name)) === false) {
                my_error_handler($category->error_message);
            }
            
            $this->smarty->assign('category_data',$category_data);
            
            # Add any external files that are needed                       
            $this->css_files[] = '/libraries/Slidedeck/slidedeck.skin.css';
            
            //debug($category_data);
            $this->display_page('category');
        }

        public function view() {
            return $this->index();
        }
        
        public function video() {
            $category = load_model('category');
            if(isset($GLOBALS['parameters']['video_id'])) {
                $video_id = $GLOBALS['parameters']['video_id'];
            } else {
                my_error_handler('No video id was found');
            }
            
            if(($video_data = $category->get_video_data($video_id, $this->category_name)) === false) {
                my_error_handler($category->error_message);
            }
            
            $this->smarty->assign("video_data",$video_data);
            
            $video_name = $video_data['video_information']['site_video_title'];
            $this->breadcrumb->add_page($video_name, $_SERVER['REQUEST_URI']);       
            
            //debug($video_data);
            $category->add_video_view($video_id);
            
            $this->display_page('video');
        }
    
}
?>
