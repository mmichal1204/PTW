<?php
 $conn = new mysqli("localhost", "root", "", "projektlowiska");
 if ($conn->connect_error) {
 exit("Connection failed: " . $conn->connect_error);
 }
?>

