<?
//Create Playlist
if(isSet($_GET['videoGroup']))
{
	include_once("dbConnect.php");
	$videoGroup=$_GET['videoGroup'];
	$sql="SELECT videoCategory.title FROM videoCategory, video WHERE video.videoGroup = 13 && video.categoryId = videoCategory.id";
	$row=mysql_fetch_array(mysql_query($sql));
	$category=$row['title'];
	$playlistTitle=$_GET['playlistTitle'];
	$filename=$_GET['playlistTitle'];
	$target = "$category/$filename.xml";
	
	
	@unlink($target);	
	//Create the headers
	$xmlFile="<playlist version=\"1\" xmlns=\"http://xspf.org/ns/0/\">\n";
	$xmlFile.= "<title>$playlistTitle</title>\n<tracklist>\n";
	
	//Start adding the tracks
	$sql="SELECT title, description, videoFile, minutes, seconds";
	
	//Close the tags
	$xmlFile.= "</tracklist>\n</playlist>\n";
	
	$file = fopen($target, 'w');
	fwrite($file, $xmlFile);
	fclose($file);	
}
?>