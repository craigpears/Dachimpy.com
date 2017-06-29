<a href="/cms/index">Back</a>
<h1>Flash Apps</h1>

{?if $form_submitted == true ?} 
    <p>App was saved to {?$app_src_location?}</p>
{?/if?}

<h1>New flash app</h1>
<form action="/cms/flash_app" method="post" name="new_flash_app" enctype="multipart/form-data">
    <dl>
        <dt>Source</dt>
        <dd><input type="file" name="app_source" id="app_source"></dd>
        <dt>Name</dt>
        <dd><input type="text" name="app_name" id="app_name"/></dd>
        <dt>Description</dt>
        <dd><textarea name="app_description" id="app_description"></textarea></dd>
        <dt>App width</dt>
        <dd><input type="text" name="app_width" id="app_width"/></dd>
        <dt>App height</dt>
        <dd><input type="text" name="app_height" id="app_height"/></dd>
        <dt>Update text</dt>
        <dd><textarea name="app_update" id="app_update">Insert update to appear on the home page here</textarea></dd>
        <dt>Add to applications menu</dt>
        <dd>TODO</dd>
    </dl>
    <button type="submit">Save</button>
</form>