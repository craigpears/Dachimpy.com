<?php
class controller_cms_videos extends controller_base_class
{
    
	public function __construct()
	{
            parent::__construct();            
            $this->breadcrumb->add_page('CMS','/cms/index');
            $this->breadcrumb->add_page('Videos','/cms_videos/index');
	}
	
	public function index()
	{   
            $this->display_page('cms/cms_videos/cms_videos_index');
	}
        
        public function new_video()
        {
            $this->breadcrumb->add_page('New Video', '/cms_videos/new_video');
            $this->jquery_js_files[] = '/javascript/cms_videos.js';
            // Get a list of categories
            $category_model = load_model('category');
            $categories_list = $category_model->list_categories();
            //debug($categories_list);
            $this->smarty->assign('categories_list', $categories_list);
            
            $this->display_page('cms/cms_videos/cms_videos_new_video');
        }
        
        public function playlists_display()
        {
            // Make sure that a category id has been provided
            if(isset($GLOBALS['parameters']['category_id']) && $GLOBALS['parameters']['category_id'] != '')
            {
                $category_id = $GLOBALS['parameters']['category_id'];
            }
            else
            {
                my_error_handler('Category id was not provided');
            }
            
            $playlists_model = load_model('playlists');
            $playlist_list = $playlists_model->get_playlists_by_category($category_id);
            $this->smarty->assign('playlist_list', $playlist_list);
            
            $this->display_partial_page('cms/cms_videos/cms_videos_playlists_display');
        }
        
        public function position_display()
        {
            // Make sure that a playlist id has been provided
            if(isset($GLOBALS['parameters']['playlist_id']) && $GLOBALS['parameters']['playlist_id'] != '')
            {
                $playlist_id = $GLOBALS['parameters']['playlist_id'];
            }
            else
            {
                my_error_handler('Playlist id was not provided');
            }
            
            if($playlist_id == 0)
            {
                $this->smarty->assign('playlist_is_other', true);
            }
            else
            {
                $this->smarty->assign('playlist_is_other', false);
                $category_model = load_model('category');
                $playlist_videos = $category_model->get_videos_by_playlist($playlist_id);

                $this->smarty->assign('playlist_videos', $playlist_videos);
            }
            
            $this->display_partial_page('cms/cms_videos/cms_videos_position_display');
        }
        
        public function update_display()
        {
            $this->display_partial_page('cms/cms_videos/cms_videos_update_display');
        }
        
        public function save_video()
        {
            $title = $this->get_param('video_title');
            $type = $this->get_param('video_type');
            $description = $this->get_param('video_description');
            $location = $this->get_param('video_location');
            $minutes = $this->get_param('video_minutes');
            $seconds = $this->get_param('video_seconds');
            $category_id = $this->get_param('video_category');
            $playlist_id = $this->get_param('video_playlist');
            $insert_at = $this->get_param('position_insert_at');
            
            $category_model = load_model('category');
            $category_model->add_new_video($title, $type, $description, $location, $minutes, $seconds, $category_id, $playlist_id, $insert_at);
            
            // TODO: Add a confirmation/error message
            
            
            return $this->new_video();
            
        }
        
        
        
}
?>
