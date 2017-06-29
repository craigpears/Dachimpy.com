<html>
<head>
<title>Dachimpy's Hints</title>
<link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>

   <!-- Begin Wrapper -->
   <div id="wrapper">
   
		 <!-- Begin Header -->
		 <div id="header">
		 
			   <? include ("http://www.dachimpy.com/Header.html") ?> 
			   
		 </div>
		 <!-- End Header -->
		 
		 <!-- Begin Navigation -->
		 <div id="navigation">
		 
			   <? include("http://www.dachimpy.com/Menu.html"); ?>	 
			   
		 </div>
		 <!-- End Navigation -->
		 
		 <!-- Begin Right Column -->
		 <div id="maincolumn">
			   <?
			   if(isset($_GET['id']))
			   {
					include_once("dbConnect.php");
					
					$id=$_GET['id'];
					$sql="SELECT * FROM videoPlaylist WHERE id=$id";
					$result=mysql_query($sql);
					$row=mysql_fetch_array($result);
					$playlistFile=$row['playlistFile'];
					$categoryId=$row['videoCategory'];					
					$videoGroup=$row['videoGroup'];
					$views=$row['views'] + 1;
					
					$sql="UPDATE videoPlaylist SET views=$views WHERE id=$id";
					mysql_query($sql);
					
					$sql="SELECT title FROM videoCategory WHERE id=$categoryId";
					$result=mysql_fetch_array(mysql_query($sql));
					$categoryTitle=$result['title'];
					?>
					
					<div id="TITLEFRAME"><a style="color: #FFFFFF" href="http://www.dachimpy.com/index.php">Home</a> > <a style="color: #FFFFFF" href="/index.php?category=<? echo $categoryId; ?>"><? echo $categoryTitle;?></a> ><? echo $row['title']; ?></div>
					<div id="TEXTBOX">
					<table class="sitetable" border="1" cellpadding="2" cellspacing="0">
					<tr class="sitetblrow">
						<td class="tableHeader">Title</td>
						<td class="tableHeader">Category</td>
						<td class="tableHeader">Added</td>
						<td class="tableHeader">Videos</td>
						<td class="tableHeader">Views</td>
						<td class="tableHeader">Description</td>
					</tr><tr class="sitetblrow">
						<td class="sitetblrow"><? echo $row['title']; ?></td>
						<td class="sitetblrow"><? echo $categoryTitle; ?></td>
						<td class="sitetblrow"><? echo $row['dateAdded']; ?></td>
						<td class="sitetblrow"><? echo $row['noVideos']; ?></td>
						<td class="sitetblrow"><? echo $views; ?></td>
						<td class="sitetblrow"><? echo $row['description']; ?></td>
					</tr></table><br>
					<div id="element">
					<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='640' height='540' id='player1' name='player1'>
					   <param name='movie' value='player.swf'>
					   <param name='wmode' value='opaque'>
					   <param name='allowfullscreen' value='true'>
					   <param name='allowscriptaccess' value='always'>
					   <param name='flashvars' value='file=<? echo $row['playlistFile'];?>'>
					   <param name='skin' value='flashskins22aqua.swf'>
					   <embed id='player1'
							  name='player1'
							  src='player.swf'
							  width='640'
							  height='540'
							  allowscriptaccess='always'
							  allowfullscreen='true'
							  wmode='opaque'
							  flashvars="file=<? echo $row['playlistFile'];?>&playlist=over&playlistsize=180&skin=flashskins22aqua.swf"
					   />
					</object>
					</div>
					
					</div>
					<br>
					<?						
						include ("indexx.php");
					
			   }
			   ?>
				
						
				
				
		 
		 </div>
		 <!-- End Right Column -->
		 
		 <!-- Begin Footer -->
		 <div id="footer">		       
				<? include("http://www.dachimpy.com/Footer.html"); ?>				    
		 </div>
		 <!-- End Footer -->
		 
   </div>
   <!-- End Wrapper -->
</body>
</html>
