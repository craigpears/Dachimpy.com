<div id="category_page">
    
    {?include file="$breadcrumb_template"?}
    <h3>{?$formatted_category_name?}</h3>
    {?if $category_data.tips|@count > 0?}
    <script type="text/javascript" src="/libraries/Slidedeck/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="/libraries/Slidedeck/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="/libraries/Slidedeck/slidedeck.jquery.lite.js"></script>
    <script type="text/javascript" src="/libraries/Slidedeck/slidedeck.jquery.lite.pack.js"></script>
    <div id="slidedeck_frame" class="skin-slidedeck">
        <dl class="slidedeck">
                {?foreach from=$category_data.tips item=tip?}
                    <dt>{?$tip.site_category_tip_title?}</dt>
                    <dd>{?$tip.site_category_tip_content?}</dd>
                {?/foreach?}
        </dl>
    </div>
    <script type="text/javascript">
            $('.slidedeck').slidedeck();
            jQuery.noConflict();
    </script>
    {?/if?}
    <div id="category_playlists_holder">
        {?foreach from=$category_data.playlists item=playlist?}
            <h3>{?$playlist.info.playlist_title?} ({?$playlist.info.playlist_video_count?} videos)</h3>
            {?foreach from=$playlist.videos item=video?}
                <div class="playlist_video">
                        <a href="{?$video.video_link?}">{?$video.site_video_title?} ({?$video.formatted_time?})</a><br/>
                        {?$video.site_video_views?} views<br/>
                        {?$video.site_video_description?}<br/>
                </div>
            {?/foreach?}
        {?/foreach?}
    </div>
</div>
