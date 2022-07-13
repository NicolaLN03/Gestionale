<?php

$dbHost="localhost";

$dbUsr="root";

$dbPass="";

$dbName="dbgestionale";

$conn=new mysqli($dbHost,$dbUsr,$dbPass,$dbName); 

if($conn->connect_error)
{
 die("connessione fallita ".mysqli_connect_error()); 
}
?>