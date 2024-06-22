<?php $conn = new mysqli("localhost", "root", "", "projektlowiska");
$id=$_GET["id"];
$sql="SELECT obrazek FROM lowiska WHERE id=$id";
$result=$conn->query($sql);
$row=$result->fetch_object();
unlink("obrazki/".$row->obrazek);
$sql="DELETE FROM lowiska WHERE id=$id";
$conn->query($sql);
$conn->close();
header("location: index.php");
?>
