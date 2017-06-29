<?php
class controller_base_class extends class_base_item
{

    public $smarty;
    public $breadcrumb;
    public $css_files;
    public $jquery_js_files;
    public $js_files;

    public function __construct()
    {
        parent::__construct();
        $this->smarty = new Smarty();

        $this->smarty->debugging = false;
        $this->smarty->setTemplateDir(WEBSITE_DIR . 'templates/');
        $this->smarty->setCompileDir(WEBSITE_DIR . 'templates_c/');
        $this->smarty->setConfigDir(WEBSITE_DIR . 'configs/');
        $this->smarty->setCacheDir(WEBSITE_DIR . 'cache/');
        
        $this->smarty->left_delimiter = "{?";
        $this->smarty->right_delimiter = "?}";
        
        $this->breadcrumb = load_class('breadcrumb');
        $css_files = array();
        $css_files[] = '/styles/styles.css';
        $this->css_files = $css_files;
        
        # jquery js files are separate so that jquery no conflict can be called at the correct point
        $jquery_js_files = array();
        $jquery_js_files[] = '/libraries/jMyCarousel/jquery-1.2.1.pack.js';
        $this->jquery_js_files = $jquery_js_files;
        
        $js_files = array();
        $js_files[] = '/libraries/mootools-core-1.4.5-full-compat.js';
        $js_files[] = '/libraries/mootools-more-1.4.0.1.js';
        $js_files[] = '/javascript/core_javascript.js';
        $this->js_files = $js_files;
    }

    /**
     * Displays a template file
     * @param string $page 
     */
    public function display_page($page)
    {		
        $this->smarty->assign('body', $page . '.tpl');
        $this->smarty->assign('right_column','right_column.tpl');
        
        $this->smarty->assign('breadcrumb_template','breadcrumb.tpl');
        $this->smarty->assign('breadcrumb_trail_data',$this->breadcrumb->trail);
        
        # Render the css links
        $css_include = '';
        foreach($this->css_files as $css_file) {
            $css_include .= '<link rel="stylesheet" type="text/css" href="'.$css_file.'"/>';
        }
        $this->smarty->assign('css_include',$css_include);
        
        # Render the javascript links
        $jquery_js_include = '';
        foreach($this->jquery_js_files as $js_file) {
            $jquery_js_include .= '<script type="text/javascript" src="'.$js_file.'"></script>';
        }
        $this->smarty->assign('jquery_js_include',$jquery_js_include);
        
        $js_include = '';
        foreach($this->js_files as $js_file) {
            $js_include .= '<script type="text/javascript" src="'.$js_file.'"></script>';
        }
        $this->smarty->assign('js_include',$js_include);
        
        # Build the Puzzle Guides menu
        $category = load_model('category');
        $menu_info = $category->puzzle_guides_menu_info();
        $this->smarty->assign('puzzle_guides_menu', $menu_info);
        
        # Build the external links menu
        $index = load_model('index');        
        $external_links_menu = $index->external_links_menu_info();
        $this->smarty->assign('external_links_menu',$external_links_menu);
        
        $this->smarty->display('wrapper.tpl');
    }
    
    public function display_partial_page($page)
    {        
        $this->smarty->display($page . '.tpl');
    }
    
    protected function get_param($paramName)
    {
        if(isset($GLOBALS['parameters'][$paramName])) {
            return $GLOBALS['parameters'][$paramName];
        }
        elseif(isset($_POST[$paramName]))
        {
            return $_POST[$paramName];
        }
        else
        {
            my_error_handler("Parameter " . $paramName . " not found.");
        }
    }
}
?>
