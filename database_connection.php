<?php
$mysql_hostname = "localhost";
$mysql_user =     "root";
$mysql_password = "";
$mysql_database = "recipedatabase";
$connection = mysqli_connect($mysql_hostname, $mysql_user,   
$mysql_password,$mysql_database) ;

if (mysqli_connect_errno())
{
    echo "Connection Failed" . mysqli_connect_error();
}
?>