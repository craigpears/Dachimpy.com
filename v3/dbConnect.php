<?
//Connect to the database server
$db = @mysql_connect('supremecenter14.co.uk','dachimpy_site','2217526');
if(!$db)
exit('<p>Unable to connect to the database server at this time</p>');

//Select the database
if(!@mysql_select_db('dachimpy_site',$db))
exit('<p>Unable to locate the database at this time</p>');?>