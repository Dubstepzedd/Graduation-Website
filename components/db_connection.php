<?php
// This is the mySQL connection. Alter the values below. $servername = localhost, $username="root" $password="root"
$link = mysqli_connect("localhost", "root", "root","examination");

if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>