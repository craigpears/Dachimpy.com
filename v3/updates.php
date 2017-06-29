<? 
	include_once("dbConnect.php");
	$sql = "SELECT * FROM updates ORDER BY date DESC LIMIT 0,6";
	$result = mysql_query($sql) or die(mysql_error());
	?><div id="TITLEFRAME">Updates and news</div>
	<div id="TEXTBOX"><?
	while($row = mysql_fetch_array($result))
	{
		echo $row['date'].": ".$row['text'];
		?>
		<br><HR size="1">
		<?
	}
	?>
	</div>