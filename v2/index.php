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
					include("indexx.php");
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
