<div id="edit_article_page">
    {?include file="$breadcrumb_template"?}
    <form id="article_editor_form" method="POST" action="/cms/articles/save_article/{?$article_href?}">
    {?$editor?}
    <div class="buttons">
        <button>Cancel</button>
        <button type="submit">Save</button>
    </div>
    </form>
</div>