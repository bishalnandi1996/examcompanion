<?php
$servername="localhost";
$username="root";
$password="bishal";
$database="examcompanion";

$link=mysqli_connect($servername,$username,$password,$database);
if(!$link)
	die("Couldnot connect Database:");

?>
