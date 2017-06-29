<ul class="dropdown_navigation">
	<li class="menu">
            <div class="menu_title"><a href="http://www.dachimpy.com/">Home</a></div>
        </li>
	<li class="menu">
            <div class="menu_title"><a href="/" class="dir">Puzzle Videos</a></div>
            <div class="links_container">
		<ul class="links">
                    {?foreach from=$puzzle_guides_menu item=item ?}
                        <li class="empty">{?$item.info.site_category_title?}</li>
                        {?foreach from=$item.sub_menu item=sub_menu_item?}
                            <li><a href="/category/view/category_name/{?$sub_menu_item.info.site_category_title?}">{?$sub_menu_item.info.site_category_title?}</a></li>
                        {?/foreach?}
                    {?/foreach?}
		</ul>
           </div>
	</li>
	<li class="menu">
            <div class="menu_title"><a href="/applications/index" class="dir">Applications</a></div>
            <div class="links_container">
		<ul class="links">
			<li><a href="http://www.whirled.com/#games-d_3323" target="_blank">Blockade Simulator</a></li>
			<li><a href="http://www.dachimpy.com/applications/view/application_id/10">Blockade Sim (Single Player)</a></li>
                        <li><a href="http://www.dachimpy.com/applications/view/application_id/6">Battle Navigation - Wind map</a></li>
			<li><a href="http://www.dachimpy.com/applications/view/application_id/5">Battle Navigation - Whirlpool map</a></li>
			<li><a href="http://www.dachimpy.com/applications/view/application_id/7">Battle Navigation - Shoot Dalnoth</a></li>
			<li><a href="http://www.dachimpy.com/applications/view/application_id/9">Battle Navigation - Collision Mechanics</a></li>
			<li><a href="http://www.dachimpy.com/applications/view/application_id/1">Distilling Simulator</a></li>
			<li><a href="http://www.dachimpy.com/applications/view/application_id/3">Swordfight challenges</a></li>	
		
		</ul>
            </div>
	</li>
        <li class="menu">
            <div class="menu_title"><a href="/articles/index" class="dir">Articles</a></div>
	</li>
	<li class="menu">
            <div class="menu_title"><a href="" class="dir">External Links</a></div>
            <div class="links_container">
		<ul class="links">
                    {?foreach from=$external_links_menu item=item?}
                        <li><a href="{?$item.site_external_link_href?}">{?$item.site_external_link_title?}</a></li>
                    {?/foreach?}
		</ul>
            </div>
	</li>
	
	
</ul>
<div class="clear"></div>
<script type="text/javascript">
   window.addEvent('domready', function(){
	$('navigation_container').getElements('li.menu').each( function( elem ){
		var list = elem.getElement('ul.links');
                if(list !== null) {
                    var myFx = new Fx.Slide(list).hide();
                    elem.addEvents({
                            'mouseenter' : function(){
                                    myFx.cancel();
                                    myFx.slideIn();
                            },
                            'mouseleave' : function(){
                                    myFx.cancel();
                                    myFx.slideOut();
                            }
                    });
                }
	})
});
</script>