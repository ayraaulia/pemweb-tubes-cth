<?php
$conn = mysqli_connect("localhost", "root", "", "communityhub");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
