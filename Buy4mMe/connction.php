<?php 
$server = 'localhost';
$user ='root';
$pwd = '';
$db = 'store';
$conn = mysqli_connect($server,$user,$pwd,$db,3307);
if($conn){

    echo mysqli_connect_error();

} ?>