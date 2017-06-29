<?php

class model_playlists extends model_base_class
{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_playlists_by_category($category_id)
    {
        $sql = "SELECT site_playlist_id, site_playlist_title FROM site_playlists WHERE site_category_id = " . $this->escape_string($category_id);
        $results = $this->exec_sql($sql);
        
        $playlists = array();
        while(($result = $results->fetch_assoc()) != false)
        {
            $playlist = array();
            $playlist['site_playlist_id'] = $result['site_playlist_id'];
            $playlist['site_playlist_title'] = $result['site_playlist_title'];
            $playlists[] = $playlist;
        }
        
        $playlist = array();
        $playlist['site_playlist_id'] = '0';
        $playlist['site_playlist_title'] = 'Other';
        $playlists[] = $playlist;
        
        return $playlists;
    }
}
?>
