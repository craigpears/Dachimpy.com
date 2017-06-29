<div id="applications_page">
    
    {?include file="$breadcrumb_template"?}
    <h3>Applications</h3>
    <div id="applications_list_holder">
        {?foreach from=$applications_data item=application?}
            <div class="playlist_video">
                    <a href="{?$application.link?}">{?$application.site_application_title?}</a><br/>
                    {?if $application.site_application_internal == 'Y'?}
                        {?$application.site_application_views?} views
                    {?else?}
                        External App
                    {?/if?}<br/>
                    {?$application.site_application_description?}<br/>
            </div>
        {?/foreach?}
    </div>
</div>
