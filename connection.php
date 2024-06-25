<?php
$servername ="localhost";
$username = "root";
$password ="";
$database ="registerapp";

$connection = mysqli_connect($servername,$username,$password,$database);
if(!$connection)
{
    echo "connection failed ". mysqli_connect_error();
}
else{
    echo "";
}
?>

<!-- HELLO SHAHEED -->