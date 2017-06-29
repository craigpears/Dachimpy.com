<?php
class model_article extends model_base_class {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_articles() {
        $sql = "SELECT site_article_name, site_article_href FROM site_articles WHERE site_article_visible = 'Y' ORDER BY site_article_name ASC";
        $results = $this->exec_sql($sql);
        
        $articles = array();
        while(($result = $results->fetch_assoc()) != false) {
            $article = array();
            $article['article_name'] = $result['site_article_name'];
            $article['article_href'] = "/articles/view/article_name/" . $result['site_article_href'];
            $articles[] = $article;
        }
        
        return $articles;
    }
    
    public function get_article($article_href) {
        $sql = "SELECT site_article_id, site_article_name, site_article_content FROM site_articles WHERE site_article_href = ". $this->escape_string($article_href);
        $results = $this->exec_sql($sql);
        if(($result = $results->fetch_assoc()) != false) {
            $article_info = array();
            $article_info['article_name'] = $result['site_article_name'];
            $article_info['article_content'] = $result['site_article_content'];
            return $article_info;
        } else {
            return false;
        }
    }
    
}
 
?>
