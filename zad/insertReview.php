<?php
include("session.php");
require("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nick = $_SESSION["login"];
    $ocena = $_POST["ocena"];
    $recenzja = $_POST["recenzja"];
    
    $sql = "INSERT INTO recenzje (idLowiska, nick, ocena, tresc) VALUES ('$id', '$nick', '$ocena', '$recenzja')";
    $conn->query($sql);
    $conn->close();
    header("location:details.php?id=$id");
} else {
    echo "Błąd: Dane nie zostały przesłane poprzez formularz.";
}
?>

