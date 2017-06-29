{?if $playlist_is_other == true?}
    <p>This playlist is ordered alphabetically.</p>
    <input type="hidden" name="position_insert_at" value="0" />
{?else?}
<table>
    <tr>
        <td><label>Insert at end</label></td>
        <td><input type="radio" name="position_insert_at" id="position_insert_at_end" checked="true" value="1"/></td>
    </tr>
    <tr>
        <td><label>Insert at beginning</label></td>
        <td><input type="radio" name="position_insert_at" id="position_insert_at_beginning" value="2"/></td>
    </tr>
    <tr>
        <td><label>Insert after</label></td>
        <td><input type="radio" name="position_insert_at" id="position_insert_at_after" value="3"/>
            <select name="position_insert_after_option" id="position_insert_after_options" onchange="OnSelectInsertAfter()">
                {?foreach from=$playlist_videos item=video?}
                    <option value="{?$video.site_video_id?}">{?$video.site_video_title?}</option>
                {?/foreach?}
            </select>
        </td>
    </tr>
</table>
{?/if?}