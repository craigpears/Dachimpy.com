<div id="commentsFeed">
<!-- begin htmlcommentbox.com -->
 <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="http://www.htmlcommentbox.com/static/skins/simple/skin.css" />
 <script type="text/javascript" language="javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={  };} hcb_user.PAGE="http://www.dachimpy.com";(function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((window.hcb_user && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&opts=182&num=15");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end htmlcommentbox.com -->
<div>
<div id="footer">
<?
	include_once("dbConnect.php");
	$sql = 	"SELECT sum(views) FROM video";
	$result = mysql_fetch_array(mysql_query($sql));
	echo $result['sum(views)']." total video views";
?>
<br>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#appId=126651854101430&xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="http://www.dachimpy.com" data-send="false" data-width="280" data-show-faces="false" data-font="verdana"></div><br>

<a href="http://www.puzzlepirates.com">Y!PP</a> graphics used with permission from <a href="http://www.threerings.com">Three Rings</a>
</div>