<html>
<head>
<title>Dachimpy's Hints</title>
<link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>

<? include "videoListElement.php" ?>
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
					$nextVideoNumber=$row['videoNumber'] + 1;
					
					$sql="UPDATE video SET views=$views WHERE id=$id";
					mysql_query($sql);
					
					$sql="SELECT title FROM videoCategory WHERE id=$categoryId";
					$result=mysql_fetch_array(mysql_query($sql));
					$categoryTitle=$result['title'];
					if($row['seconds']<10)
						$leadingZero = "0";
					else
						$leadingZero = "";
						
					?>
					
					<div id="TITLEFRAME">
					<a class="largeLink" href="http://www.dachimpy.com/index.php">Home,</a>
					<a class="largeLink" href="/index.php?category=<? echo $categoryId ?>"><? echo $categoryTitle; ?>,</a>
					<? echo $row['title'] ?> </div>
					<div id="TEXTBOX">
					<?
					

					if($videoType==1)//FLV File
					{
					?>
					<object width="640" height="480">
						<param name="movie" value=<? echo '"player.swf?file='.$videoFile.'&image=Logo.png&skin=flashskins22blue.swf"'; ?> />
						<param name=quality value=high />
						<param name="wmode" value="opaque">
						<embed src=<? echo '"player.swf?file='.$videoFile.'&image=Logo.png&skin=flashskins22blue.swf"'; ?> 
						  type="application/x-shockwave-flash" wmode="opaque" width="640" height="480"> 
						</embed>
					</object>
					<?
					}
					else if($videoType==2)//Youtube
					{
					?>
						<iframe width="640" height="480" src="http://www.youtube.com/embed/<? echo $videoFile; ?>?wmode=transparent&rel=0" frameborder="0" allowfullscreen></iframe>
					<?
					}
					else if($videoType==3)//Google video
					{
					?>
					<object width="640" height="480">
					  <param name="movie" value="http://video.google.com/googleplayer.swf?docid=<? echo $videoFile;?>" />
					  <param name="wmode" value="opaque" />
					  <embed src="http://video.google.com/googleplayer.swf?docid=<? echo $videoFile;?>"
							 type="application/x-shockwave-flash"
							 wmode="opaque" width="640" height="480" />
					</object>
					<?
					}
					?>
					<br>
					Added on <? echo $row['dateAdded'];?><br>
					<? echo $views;?> views<br>
					
					<? echo $row['description'] ?></div><br>
					<? include "like.html" ?><br>
					<?
									
					if($videoGroup!= 0)
					{
						$sql="SELECT * FROM video WHERE videoGroup=$videoGroup ORDER BY videoNumber, title";
						$result = mysql_query($sql);
						
						$sql = "SELECT * FROM video WHERE videoGroup=$videoGroup AND videoNumber=$nextVideoNumber";
						$resultt = mysql_query($sql);
						if(mysql_num_rows($resultt))
						{
							$row = mysql_fetch_array($resultt);
							?>
							<div id="TITLEFRAME">Next</div>
							<div id="TEXTBOX">
							<?
							if($row['seconds']<10)
								$leadingZero = "0";
							else
								$leadingZero = "";
							
							$link = "/videos.php?id=".$row['id'];
							$title = $row['title']." (".$row['minutes'].":".$leadingZero.$row['seconds'].")";
							new videoListElement($link, $title, $row['views'],$row['description']);
							?>
							</div>
							<?
						}
						?>
						
						<div id="TITLEFRAME">Related Videos</div>
						<div id="TEXTBOX">
						
						<?
						while($row=mysql_fetch_array($result))
						{
							if($row['seconds']<10)
								$leadingZero = "0";
							else
								$leadingZero = "";
							
							$link = "/videos.php?id=".$row['id'];
							$title = $row['title']." (".$row['minutes'].":".$leadingZero.$row['seconds'].")";
							new videoListElement($link, $title, $row['views'],$row['description']);
						}
						?></div><?
					}					
			   }
			   ?>
				
						
				
				
		 
		 </div>
		 <!-- End Right Column -->
		 
		 <!-- Begin Footer -->
		 <div id="footer">		       
				<? include("http://www.dachimpy.com/Footer.php"); ?>				    
		 </div>
		 <!-- End Footer -->
		 
   </div>
   <!-- End Wrapper -->
</body>
</html>
