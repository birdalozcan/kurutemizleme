<?php 
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbdata="kurutm_db";
$con=mysql_connect($dbhost,$dbuser,$dbpass);
if (!$con)
{
die('Veritabanına baglanalamadı: ' . mysql_error());
}
mysql_query("SET NAMES UTF8");
if(!@mysql_select_db($dbdata))
{
die("veritabaný seçilmedi".mysql_error());
}
?>