<?php
class controller_index extends controller_base_class
{
	public function __construct()
	{
            parent::__construct();
            
            $this->js_files[] = '/libraries/jMyCarousel/jMyCarousel.js';
	}
	
	public function index()
	{           
            $index = load_model('index');
            $this->smarty->assign('site_updates', $index->get_site_updates());
            
            $this->display_page('index');
	}
        
        
}
?>
