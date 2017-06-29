<html>
<head>
<title>Dachimpy's Hints</title>
<link rel="stylesheet" type="text/css" href="http://www.dachimpy.com/main.css" />
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
				
					
					include_once("dbConnect.php");	
					if(isset($_GET['category']))
					{
						//Headers
						$cat=$_GET['category'];
						$sql="SELECT title FROM videoCategory WHERE id = $cat";
						$result=mysql_query($sql);
						$row=mysql_fetch_array($result);
						$title=$row['title'];
						
						?>
												
						<div id="TITLEFRAME"><a class="largeLink" href="http://www.dachimpy.com/index.php">Home,</a> <? echo $title; ?></div>
						<div id="TEXTBOX">
						<div id="SLIDEDECK"><?include("http://www.dachimpy.com/Slidedeck/tips.php?category=$cat");?></div>
												
						<?
															
						//List the videos
						$cat = $_GET['category'];
						$sql="SELECT * FROM video WHERE categoryId = $cat ORDER BY videoGroup DESC, videoNumber, title";
						$result=mysql_query($sql);
						
						
						if(mysql_num_rows($result) > 0)
						{
							$lastVideoGroup = -1;
							while($row = mysql_fetch_array($result))
							{
								if($row['videoGroup'] != $lastVideoGroup)
								{
									?><div id="TITLEFRAME"><?
									if($row['videoGroup'] == 0)
									{
										echo "Other videos";
									}
									else
									{
										$videoGroup = $row['videoGroup'];
										$sql = "SELECT title FROM videoPlaylist WHERE playlistID = $videoGroup";
										$resultt = mysql_fetch_array(mysql_query($sql));
										echo $resultt['title'];
									}
									?></div><?
								}
								$lastVideoGroup = $row[videoGroup];
								if($row['seconds']<10)
									$leadingZero = "0";
								else
									$leadingZero = "";

								?>
								<div id="video"><a class="videoTitle" href="http://www.dachimpy.com/videos.php?id=<? echo $row['id'];?>"><? echo$row['title'];?>
								(<? echo $row['minutes']; ?>:<? echo $leadingZero.$row['seconds']; ?>)</a><br>
								<? echo $row['views']; ?> views<br>
								<? echo $row['description']; ?></div><br>
								
								<?
							}
						}
						else
						{
							?>
							There are currently no videos in this category.
							<?
						}
						
						?></table></div><br><?
					} else {
					?><div id="updates"><? include("updates.php"); ?> </div>
					  <div id="poll">   <? include("poll.php");   ?> </div>
					  <div><? include("collage.html");?> </div>
					<?						
						
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
