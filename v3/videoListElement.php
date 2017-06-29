 <head><link rel="stylesheet" type="text/css" href="http://www.dachimpy.com/main.css" /></head>
 <body>
 <?
 
 class videoListElement
 {
	function __construct($link, $title, $views, $description)
	{
		?>
		<div id="video"><a class="videoTitle" href=<? echo $link; ?>><? echo $title ?></a><br>
		<? echo $views ?> views<br>
		<? echo $description ?></div><br>								
		<?
	}
 } 
 ?>
 </body>