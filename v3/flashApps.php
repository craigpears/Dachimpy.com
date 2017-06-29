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
					$sql="SELECT * FROM flashApp WHERE id=$id";
					$result=mysql_query($sql);
					$row=mysql_fetch_array($result);
					$filePath=$row['filePath'];
					$width=$row['width'];
					$height=$row['height'];		
					$views=$row['views'] + 1;
					
					$sql="UPDATE flashApp SET views=$views WHERE id=$id";
					mysql_query($sql);
					?>
											
					<div id="TITLEFRAME">
						<a class="largeLink" href="http://www.dachimpy.com/index.php">Home,</a> <? echo $row['title']; ?></div>
					<div id="TEXTBOX">					
					<object <? echo 'width="'.$width.'" height="'.$height.'"';?>>
						<param name="movie" value=<? echo '"'.$filePath.'"'?> />
						<param name=quality value=high />
						<param name="wmode" value="transparent">
						<embed src=<? echo '"'.$filePath.'"'; ?> 
						  type="application/x-shockwave-flash" wmode="transparent" <? echo 'width="'.$width.'" height="'.$height.'"';?>>
						</embed>
					</object><br>
					
						Added on <? echo $row['dateAdded']; ?><br>
						<? echo $views; ?> views<br>
						<? echo $row['description']; ?>
						</div><br>
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
