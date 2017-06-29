<?php
class model_category extends model_base_class {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_category_data($category_name) {
        $category_data = array();
        
        # Get the category id based on the name
        $category_id = $this->get_category_id($category_name);
        if($category_id == false) {
            return false;
        }
        
        # Get the list of videos and organise them by their playlists
        $sql = "SELECT a.site_video_id, a.site_video_title, a.site_video_date_added, a.site_video_minutes, a.site_video_seconds, a.site_video_description, a.site_video_file_location,".
               " a.site_video_type_id, a.site_playlist_id, a.site_video_views, a.site_video_index, b.site_playlist_title".
               " FROM site_videos a LEFT JOIN site_playlists b ON (a.site_playlist_id = b.site_playlist_id) ".
               " WHERE a.site_category_id = ".$category_id.
               " ORDER BY a.site_playlist_id DESC, a.site_video_index, a.site_video_title";
        $results = $this->exec_sql($sql);
        $playlists = array();
        
        while(($result = $results->fetch_assoc()) !== NULL) {
            $video = $result;
            $playlist_title = $result['site_playlist_title'];
            # Organise the videos by playlist
            if(!isset($playlist_title)) {
                $playlist_title = 'Other';
            }
            
            $video['formatted_time'] = $this->get_formatted_time($video['site_video_minutes'], $video['site_video_seconds']);
            $video['video_link'] = '/category/video/category_name/'.$category_name.'/video_id/'. $video['site_video_id'];
            
            $playlists[$playlist_title]['videos'][] = $video;
            
            if(!isset($playlists[$playlist_title]['info'])) {
                # If there isn't already a summary for this playlist, create one
                $playlist_info = array();
                $playlist_info['playlist_title'] = $playlist_title;
                $playlist_info['playlist_video_count'] = 0;
                $playlists[$playlist_title]['info'] = $playlist_info;
            }
            
            $playlists[$playlist_title]['info']['playlist_video_count']++;
        }
        
        $category_data['playlists'] = $playlists;
        
        # Get all the tips data
        $tips = array();
        $sql = "SELECT site_category_tip_title, site_category_tip_content FROM site_category_tips WHERE site_category_id = ".$category_id;
        $results = $this->exec_sql($sql);
        while(($result = $results->fetch_assoc()) !== NULL) {
            $tip = $result;
            $tips[] = $tip;
        }
        $category_data['tips'] = $tips;
        return $category_data;
    }
    
    public function get_video_data($video_id, $category_name) {
        $video_data = array();
        $category_id = $this->get_category_id($category_name);
        if($category_id == false) {
            return false;
        }
        
        # Get the basic video information
        $sql = " SELECT site_video_title, site_video_index, site_video_file_location, site_video_type_id, site_playlist_id, ".
               " site_video_views, site_video_description, site_video_date_added, site_video_minutes, site_video_seconds FROM site_videos ".
               " WHERE site_video_id = ".$this->escape_string($video_id)." AND site_category_id = ".$category_id;
        $results = $this->exec_sql($sql);
        
        $video_information = $results->fetch_assoc();
        $playlist_id = $video_information['site_playlist_id'];
        $video_index = $video_information['site_video_index'];
        
        $video_information['formatted_time'] = $this->get_formatted_time($video_information['site_video_minutes'], $video_information['site_video_seconds']);
        
        $video_data['video_information'] = $video_information;
        
        # Get the related videos information
        # Only get the information if it is in a playlist
        if($playlist_id != 0) {
            $sql = "SELECT a.site_video_id, a.site_video_views, a.site_video_description, a.site_video_minutes, a.site_video_seconds,".
                   " a.site_video_title, b.site_category_title ".
                   " FROM site_videos a, site_categories b ".
                   " WHERE a.site_playlist_id = ".$playlist_id." AND a.site_category_id = b.site_category_id".
                   " ORDER BY a.site_video_index";
            $results = $this->exec_sql($sql);
            $related_videos = array();
            while(($result = $results->fetch_assoc()) !== NULL) {
                $related_videos[] = $this->build_related_video($result);
            }
            
            $video_data['related_videos'] = $related_videos;
            
            # See if there is a next video to display
            $sql = "SELECT a.site_video_id, a.site_video_views, a.site_video_description, a.site_video_minutes, a.site_video_seconds, ".
                   " a.site_video_title, b.site_category_title".
                   " FROM site_videos a, site_categories b ".
                   " WHERE a.site_playlist_id = ".$playlist_id." AND a.site_category_id = b.site_category_id AND a.site_video_index = ".($video_index + 1);
            $results = $this->exec_sql($sql);
            if(($result = $results->fetch_assoc()) !== NULL) {
                $video_data['next_video'] = $this->build_related_video($result);
            }
        }
        return $video_data;
    }
    
    public function add_video_view($video_id) {
        $sql = " UPDATE site_videos SET site_video_views = site_video_views + 1 where site_video_id = " . $this->escape_string($video_id);
        $this->exec_sql($sql);        
    }
    
    private function build_related_video($related_video) {
        
        $related_video['link'] = '/category/video/category_name/'.$related_video['site_category_title'].'/video_id/'.$related_video['site_video_id'];
        $related_video['formatted_time'] = $this->get_formatted_time($related_video['site_video_minutes'], $related_video['site_video_seconds']);
        return $related_video;
    }
    
    private function get_formatted_time($minutes, $seconds) {
        return $minutes . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
    }
    
    private function get_category_id($category_name) {
         
        $sql = "SELECT a.site_category_id FROM site_categories a WHERE a.site_category_title = ".$this->escape_string($category_name);
        $results = $this->exec_sql($sql);
        
        if($results == false) {
            $this->error_message = 'Couldn\'t find the video category';
            return false;
        }
        
        $result = $results->fetch_assoc();        
        return $result['site_category_id'];
    }
    
    public function puzzle_guides_menu_info($parent_category_id = -1) {
        # Get the raw information from the database
        $sql = " SELECT * FROM site_categories WHERE site_category_visible = 1 AND site_category_parent_category_id = " . $parent_category_id . 
               " ORDER BY site_category_index";
        $results = $this->exec_sql($sql);
        
        $menu_info = array();
        while(($result = $results->fetch_assoc()) != false) {
            $menu_item = array();
            $menu_item['info'] = $result;
            $menu_item['sub_menu'] = $this->puzzle_guides_menu_info($result['site_category_id']);
            $menu_info[] = $menu_item;
        }
        
        
        
        if(empty($menu_info)) {
            return false;
        } else {
            return $menu_info;
        }
    }
}
 
?>
