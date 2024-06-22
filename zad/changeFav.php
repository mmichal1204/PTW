<?php
session_start();
require("db.php");

$idLowiska = $_POST['idLowiska'];
$idUzytkownika = $_SESSION["id"];

$sql = "SELECT id FROM ulubione WHERE idLowiska = $idLowiska AND idUzytkownika = $idUzytkownika";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "DELETE FROM ulubione WHERE idLowiska = $idLowiska AND idUzytkownika = $idUzytkownika";
    if ($conn->query($sql) === TRUE) {
        echo "Usunięto z ulubionych";
    } else {
        echo "Błąd przy usuwaniu";
    }
} else {
    $sql = "INSERT INTO ulubione (idLowiska, idUzytkownika) VALUES ($idLowiska, $idUzytkownika)";
    if ($conn->query($sql) === TRUE) {
        echo "Dodano do ulubionych";
    } else {
        echo "Błąd przy dodawaniu";
    }
}

$conn->close();
?>
