$(document).ready(function(){
    OnCategoryChange();
});

function OnCategoryChange() 
{
    // Get the selected category
    var selected_category = jQuery("#video_category").val();
    
    // Update the playlist content
    jQuery.get('/cms_videos/playlists_display/category_id/' + selected_category, function(data){
       jQuery("#playlist_dt").html(data); 
       
       // Update the position display
       OnPlaylistChange();
    });
    
}

function OnPlaylistChange()
{
    // Get the selected playlist
    var selected_playlist = jQuery("#video_playlist").val();
    
    jQuery.get('/cms_videos/position_display/playlist_id/' + selected_playlist, function(data){
       jQuery("#position_dt").html(data); 
    });
}

function IncludeUpdate()
{
    jQuery.get('/cms_videos/update_display', function(data){
        jQuery("#update_dd").html(data);
    });
}

function ValidateNewVideo()
{
    // Check that all the fields have been filled out
    var passed = true;
    jQuery("#new_video_form .required_input").each(function(index, element){
        if(passed == true && (jQuery(element).val() == null || jQuery(element).val() == ""))
        {
            alert("Please enter a value in each field");
            passed = false;
        }
    });
    
    return passed;
}

function OnSelectInsertAfter()
{
    jQuery("#position_insert_at_after").attr('checked', true);
}