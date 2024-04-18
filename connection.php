<?php

$servername="localhost";
$username="root";
$dbpassword="";
$dbname="softwareresult";

$con=mysqli_connect($servername,$username,$dbpassword,$dbname);
if(!$con){
    die('connection failed'.mysqli_connect_error()) ;
}

?>