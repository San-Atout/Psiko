<?php
$servername="localhost";  
$username="root";  
$password="";   
$dbname="resultatstestspsico"; 

$conn=new mysqli("$servername","$username","$password","$dbname");

if($conn){

}else{
    echo "Connection Failed";
}
?> 