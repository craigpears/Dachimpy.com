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
			<div id="TITLEFRAME">Insert Video</div>
			<div id="TEXTBOX">
		 <?
			
			
			/* All videos are assumed to go into the directory specified by the category */
			$videoType=$_POST['videoType'];
			$related=$_POST['related'];
			
			if($videoType=="2")
			{
				$checked[1]="CHECKED";
			} else if($videoType=="3")
			{
				$checked[2]="CHECKED";
			} else {
				$checked[0]="CHECKED";
			}
			if($related!="false"){
				$checked[4]="CHECKED";
			}else{
				$checked[3]="CHECKED";
			}
				
			if(isSet($_POST['videoType']))	
			{				
				//Run the sql query
				include_once("dbConnect.php");
				?>Query ran:<?
				$title=$_POST['title'];
				$minutes=$_POST['minutes'];
				$seconds=$_POST['seconds'];
				$categoryId=$_POST['category'];
				$row=mysql_fetch_array(mysql_query("select title from videoCategory where id=$categoryId"));
				$category=$row['title'];
				$file=$_POST['file'];				
				$description=$_POST['description'];
				$videoType=$_POST['videoType'];
				if($videoType=='1')
					$directory="/$category/$file";
				else
					$directory=$file;
				
				if($related=="false")
				{
					$vidGroup='0';
					$vidNo='0';
				}
				else
				{
					$sql="SELECT max(videoNumber) FROM video WHERE categoryId=$categoryId";
					$row=mysql_fetch_array(mysql_query($sql));
					$vidNo=$row['max(videoNumber)'];
					$vidNo++;
					$sql="SELECT max(videoGroup) FROM video";
					$row=mysql_fetch_array(mysql_query($sql));
					$vidGroup=$row['max(videoGroup)'];
					if($related=="new")
					{
						$vidGroup++;
					}
				}
				$sql="INSERT INTO video SET
					id=null,
					categoryId='$categoryId',
					title='$title',
					dateAdded=curdate(),
					minutes='$minutes',
					seconds='$seconds',
					description='$description',
					videoFile='$directory',
					videoType='$videoType',
					videoGroup='$vidGroup',
					videoNumber='$vidNo',
					views='0'";
				echo $sql;
				mysql_query($sql);
			}
				?>
					<form action="<? echo $_SERVER['PHP_SELF']; ?>"method="post">
						<table>
							<tr><td>Title:</td><td><input type="text" name="title" value="<? echo $_POST['title'] ;?>"></td></tr>
							<tr><td>Duration:</td><td><input type="text" name="minutes" size="20">minutes <input type="text" name="seconds"> seconds</td></tr>
							<tr><td>Filename:</td><td><input type="text" name="file"></td></tr>
							<tr><td>Description:</td><td><input type="text" name="description"></td></tr>
							<tr><td>Video Type:</td><td>
								<input type="radio" name="videoType" value="1" <?echo $checked[0];?>/> FLV<br>
								<input type="radio" name="videoType" value="2" <?echo $checked[1];?>/> YouTube<br>
								<input type="radio" name="videoType" value="3" <?echo $checked[2];?>/> GoogleVideo<br>							
							</td></tr>
							<tr><td>Category: </td><td><select name="category" >
								<?
								//Put an option in for every category
								include_once("dbConnect.php");
								$sql="SELECT id, title FROM videoCategory ORDER BY id";
								$result=mysql_query($sql);
								while($row=mysql_fetch_array($result))
								{
									echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
								}
								?>
							</select></td></tr>
							<tr><td>Related</td><td>
								<input type="radio" name="related" value="false" <?echo $checked[3];?>/> No Relation<br>	
								<input type="radio" name="related" value="continue" <?echo $checked[4];?>/> Continue Last Relation<br>	
								<input type="radio" name="related" value="new" /> New Relation<br>	
							</td></tr>
						</table>
						<input type="submit" value="Add Video" />						
					</form>
		</div></div>
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
