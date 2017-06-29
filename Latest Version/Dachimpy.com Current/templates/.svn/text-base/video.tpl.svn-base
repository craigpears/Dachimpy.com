<div id="video_page">
    <div id="video_container">
    {?include file="$breadcrumb_template"?}
    {?if $video_data.video_information.site_video_type_id == 1?}
        {?include file='video_flv.tpl'?}
    {?elseif $video_data.video_information.site_video_type_id == 2?}
        {?include file='video_youtube.tpl'?}
    {?elseif $video_data.video_information.site_video_type_id == 3?}
        {?include file='video_google.tpl'?}
    {?/if?}
    </div>
    <div id="video_information_container" class="ui_description_text">
        Added on {?$video_data.video_information.site_video_date_added?}<br/>
        {?$video_data.video_information.site_video_views?} views<br/>
        {?$video_data.video_information.site_video_description?}<br/>
        {?include file='facebook_like.tpl'?}
    </div>
    <div id="video_related_videos_container">
        {?if isset($video_data.next_video)?}
            <h3>Next</h3>
            {?include file='video_related_video.tpl' related_video=$video_data.next_video?}
        {?/if?}
        {?if isset($video_data.related_videos)?}
            <h3>Related Videos</h3>
            {?foreach from=$video_data.related_videos item=related_video?}
                {?include file='video_related_video.tpl' related_video=$related_video?}
            {?/foreach?}
        {?/if?}
    </div>
</div>