{?include file="$breadcrumb_template"?}
<h1>New Video</h1>
<form id="new_video_form" method="post" action="/cms_videos/save_video" onsubmit="return ValidateNewVideo(); return false;">
    <dl>
        <dt>Title</dt>
            <dd><input type="text" name="video_title" class="required_input"/></dd>
        <dt>Type</dt>
        <dd>
            <input type="radio" name="video_type" value="1">Hosted FLV</option><br/>
            <input type="radio" name="video_type" value="2" checked="true">YouTube</option><br/>
            <input type="radio" name="video_type" value="3">Google Videos</option>
        </dd>
        <dt>Description</dt>
        <dd>
            <textarea name="video_description" class="required_input"></textarea>
        </dd>
        <dt>Video Location/URL</dt>
        <dd>
            <input type="text" name="video_location" class="required_input" />
        </dd>
        <dt>Length (Minutes)</dt>
        <dd>
            <input type="text" name="video_minutes" class="required_input" />
        </dd>
        <dt>Length (Seconds)</dt>
        <dd>
            <input type="text" name="video_seconds" class="required_input" />
        </dd>
        <dt>Category</dt>
        <dd>
            <a href="#">New Category</a><br/>
            <select onchange="javascript:OnCategoryChange()" name="video_category" id="video_category">
                {?foreach from=$categories_list item=category ?}
                    <option value="{?$category['site_category_id']?}">{?$category['site_category_title']?}</option>
                {?/foreach ?}
            </select>
        </dd>
        <dt>Playlist</dt>
            <dd id="playlist_dt">Please select a category</dd>
        <dt>Position</dt>
            <dd id="position_dt">Please select a category</dd>
        <dt>Update Description</dt>
            <dd id="update_dd"><a href="javascript:IncludeUpdate()">Click here to include an update</a></dd>
    </dl>
    <div id="buttons">
        <button type="submit">Save</button>
        <button type="button">Cancel</button>
    </div>
</form>