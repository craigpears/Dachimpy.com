<?php
class controller_articles extends controller_base_class
{
	public function __construct()
	{
            parent::__construct();
            $this->breadcrumb->add_page("Articles","/articles/index");
	}
        
        public function index() {
            // Get the list of articles
            $article = load_model('article');
            $articles = $article->get_articles();
            if($articles != false) {
                $this->smarty->assign('articles',$articles);
                $this->display_page('articles/article_index');
            } else {
                my_error_handler("Oops, something went wrong getting the articles!");
            }
        }

        public function view() {
            // Check that a valid article name has been provided
            if (isset($GLOBALS['parameters']['article_name'])) {
                $article_href = $GLOBALS['parameters']['article_name'];                
            } else {
                my_error_handler("Sorry, something went wrong with the address!");
            }
            
            $article = load_model('article');
            $article_data = $article->get_article($article_href);
            if($article_data != false) {
                $this->smarty->assign('article_data', $article_data);
                $this->breadcrumb->add_page($article_data['article_name'],"/articles/view/article_name/" . $article_href);
                $this->display_page('articles/article_page');
            } else {
                my_error_handler("Sorry, the article couldn't be found");
            }
        }
        
        public function blockade_for_the_challenge() {
            $GLOBALS['parameters']['article_name'] = 'blockade_for_the_challenge';	
            $this->view();
        }
        
        public function pp_myths() {
            $GLOBALS['parameters']['article_name'] = 'pp_myths';
            $this->view();
        }
        
        public function carpentry_guide() {
            $GLOBALS['parameters']['article_name'] = 'carpentry_guide';
            $this->view();
        }
    
}
?>