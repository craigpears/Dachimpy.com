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
					$sql="SELECT * FROM video WHERE id=$id";
					$result=mysql_query($sql);
					$row=mysql_fetch_array($result);
					$videoFile=$row['videoFile'];
					$videoType=$row['videoType'];
					$categoryId=$row['categoryId'];					
					$videoGroup=$row['videoGroup'];
					$views=$row['views'] + 1;
					
					$sql="UPDATE video SET views=$views WHERE id=$id";
					mysql_query($sql);
					
					$sql="SELECT title FROM videoCategory WHERE id=$categoryId";
					$result=mysql_fetch_array(mysql_query($sql));
					$categoryTitle=$result['title'];
					if($row['seconds']<10)
						$leadingZero = "0";
					else
						$leadingZero = "";
						
					echo '<div id="TITLEFRAME"><a style="color: #FFFFFF" href="http://www.dachimpy.com/index.php">Home</a> > <a style="color: #FFFFFF" href="/index.php?category='.$categoryId.'">'.$categoryTitle.'</a> >'.$row['title'].'</div>';
					echo '<div id="TEXTBOX">';
					echo '<table class="sitetable" border="1" cellpadding="2" cellspacing="0">';
					echo '<tr class="sitetblrow">';
					echo '	<td class="tableHeader">Title</td>';
					echo '	<td class="tableHeader">Category</td>';
					echo '	<td class="tableHeader">Date Added</td>';
					echo '	<td class="tableHeader">Views</td>';
					echo '	<td class="tableHeader">Description</td>';
					echo '</tr><tr class="sitetblrow">';
					echo '	<td class="sitetblrow">'.$row['title'].'</td>';
					echo '	<td class="sitetblrow">'.$categoryTitle.'</td>';
					echo '	<td class="sitetblrow">'.$row['dateAdded'].'</td>';
					echo '	<td class="sitetblrow">'.$views.'</td>';
					echo '	<td class="sitetblrow">'.$row['description'].'</td>';
					echo '</tr></table><br>';
					
					if($videoType==1)//FLV File
					{
					?>
					<object width="640" height="540">
						<param name="movie" value=<? echo '"player.swf?file='.$videoFile.'&image=Logo.png&skin=flashskins22blue.swf"'; ?> />
						<param name=quality value=high />
						<param name="wmode" value="opaque">
						<embed src=<? echo '"player.swf?file='.$videoFile.'&image=Logo.png&skin=flashskins22blue.swf"'; ?> 
						  type="application/x-shockwave-flash" wmode="opaque" width="640" height="540"> 
						</embed>
					</object>
					<?
					}
					else if($videoType==2)//Youtube
					{
					?>
						<iframe width="640" height="540" src="http://www.youtube.com/embed/<? echo $videoFile; ?>?wmode=transparent&rel=0" frameborder="0" allowfullscreen></iframe>
					<?
					}
					else if($videoType==3)//Google video
					{
					?>
					<object width="640" height="540">
					  <param name="movie" value="http://video.google.com/googleplayer.swf?docid=<? echo $videoFile;?>" />
					  <param name="wmode" value="opaque" />
					  <embed src="http://video.google.com/googleplayer.swf?docid=<? echo $videoFile;?>"
							 type="application/x-shockwave-flash"
							 wmode="opaque" width="400" height="326" />
					</object>
					<?
					}
									
					if($videoGroup!= 0)
					{
						$sql="SELECT * FROM video WHERE videoGroup=$videoGroup ORDER BY videoNumber, title";
						$result=mysql_query($sql);
						?>
						<table class="sitetable" border="1" cellpadding="2" cellspacing="0">
						<tr class="sitetblrow"><td class="tableHeader" colspan="6">Related Videos</td></tr>
						<tr class="sitetblrow">
							<td class="tableHeader">Title</td>
							<td class="tableHeader">Date Added</td>
							<td class="tableHeader">Length</td>
							<td class="tableHeader">Views</td>
							<td class="tableHeader">Description</td>
						</tr>
						<?
						while($row=mysql_fetch_array($result))
						{
							if($row['seconds']<10)
								$leadingZero = "0";
							else
								$leadingZero = "";
							?>

							<tr class="sitetblrow">
								<td class="sitetblrow"><a href="/videos.php?id=<? echo $row['id']; ?>"><? echo $row['title']?></a></td>
								<td class="sitetblrow"><?echo $row['dateAdded'];?></td>
								<td class="sitetblrow"><?echo $row['minutes'];?>:<? echo $leadingZero.$row['seconds'];?></td>
								<td class="sitetblrow"><?echo $row['views'];?></td>
								<td class="sitetblrow"><?echo $row['description'];?></td>
							</tr>
							<?
						}
						echo '</table>';
					}
						echo'</div><br>';					
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
