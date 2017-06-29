<div class="breadcrumb">
    {?assign var=first_item value=true?}
    {?foreach from=$breadcrumb_trail_data item=trail_item?}
        {?if $first_item == false?}<span class="breadcrumb_arrows"> >> </span>{?/if?}
        <a href="{?$trail_item.page_link?}">{?$trail_item.page_name?}</a>
        {?assign var=first_item value=false?}
    {?/foreach?}
</div>