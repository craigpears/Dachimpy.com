<a href="#">New Playlist</a><br/>
<select onchange="javascript:OnPlaylistChange()" name="video_playlist" id="video_playlist">
    {?foreach from=$playlist_list item=playlist?}
        <option value="{?$playlist.site_playlist_id?}">{?$playlist.site_playlist_title?}</option>
    {?/foreach?}
</select>