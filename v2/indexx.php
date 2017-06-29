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
	$sql="SELECT * FROM video WHERE categoryId = $cat ORDER BY videoNumber, title";
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
	<table valign="top">
	
		<tr>
		<td><?include("collage.html");?></td>
		<td valign="top" cellpadding="0">
			<?include("./Slidedeck/tips.php");?>
			<?include("dachimpytwitter.html");?>			
		</td></tr>
		
	</table>
	<?
}
?>	
