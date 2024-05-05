<?php
$username = 'root';
$host='localhost';
$pass = '';
$db = 'store';

$conn = mysqli_connect($host, $username, $pass, $db,3307);
if(!$conn)
    echo mysqli_error($conn);

?>