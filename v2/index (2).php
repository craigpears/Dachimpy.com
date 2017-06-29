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
						
						//Display tips
						?>
						<div id="SLIDEDECK"><?include("http://www.dachimpy.com/Slidedeck/tips.php?category=$cat");?></div>
						
						<div id="TITLEFRAME"><a style="color: #FFFFFF" href="http://www.dachimpy.com/index.php">Guides</a> > <? echo $title; ?></div>
						<div id="TEXTBOX">
						<table class="sitetable" border="1" cellpadding="2" cellspacing="0">
						
						<?
							//List the playlists
							$cat = $_GET['category'];
							$sql="SELECT * FROM videoPlaylist WHERE videoCategory = $cat ORDER BY title";
							$result=mysql_query($sql);		
							
							if(mysql_num_rows($result) > 0)
							{
						?>
							
								<tr class="sitetblrow"><td class="tableHeader" colspan="5">Playlists</td></tr>
								<tr class="sitetblrow">
									<td class="tableHeader">Title</td>
									<td class="tableHeader">Videos</td>
									<td class="tableHeader">Views</td>
									<td class="tableHeader">Description</td>
								</tr>
								
						<?	
							while($row = mysql_fetch_array($result))
							{
								?>
								<tr><td class="sitetblrow"><a href="http://www.dachimpy.com/playlists.php?id=<? echo $row['id'];?>"><? echo$row['title'];?></a></td>
								<td class="sitetblrow"><? echo $row['noVideos']; ?></td>
								<td class="sitetblrow"><? echo $row['views']; ?></td>
								<td class="sitetblrow"><? echo $row['description']; ?></td>
								</tr>
								
								<?
							}
						}
						?>
								<tr class="sitetblrow"><td class="tableHeader" colspan="5">Videos</td></tr>
								<tr class="sitetblrow">
									<td class="tableHeader">Title</td>
									<td class="tableHeader">Length</td>
									<td class="tableHeader">Views</td>
									<td class="tableHeader">Description</td>
								</tr>
						<?
								
						//List the videos
						$cat = $_GET['category'];
						$sql="SELECT * FROM video WHERE categoryId = $cat ORDER BY videoGroup, videoNumber, title";
						$result=mysql_query($sql);
						
						
						if(mysql_num_rows($result) > 0)
						{
							while($row = mysql_fetch_array($result))
							{
								if($row['seconds']<10)
									$leadingZero = "0";
								else
									$leadingZero = "";

								?>
								<tr><td class="sitetblrow"><a href="http://www.dachimpy.com/videos.php?id=<? echo $row['id'];?>"><? echo$row['title'];?></a></td>
								<td class="sitetblrow"><? echo $row['minutes']; ?>:<? echo $leadingZero.$row['seconds']; ?></td>
								<td class="sitetblrow"><? echo $row['views']; ?></td>
								<td class="sitetblrow"><? echo $row['description']; ?></td>
								</tr>
								
								<?
							}
						}
						else
						{
							?>
							<tr colspan="5"><td class="sitetblrow">There are currently no videos in this category</td></tr>
							<?
						}
						
						echo '</table></div><br>';
					} else {
						?>
						<table>
						
							<tr>
							<td><?include("collage.html");?></td>
							<td valign="top" cellpadding="0">
								<?include("dachimpytwitter.html");?>			
							</td></tr>
							
						</table>
						<?
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
