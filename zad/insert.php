<?php
$conn = new mysqli("localhost", "root", "", "projektlowiska");

$obrazekNazwa = basename($_FILES["obrazek"]["name"]);
move_uploaded_file($_FILES["obrazek"]["tmp_name"], "obrazki/" . $obrazekNazwa);

$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$wojewodztwo = $_POST["wojewodztwo"];
$typ_lowiska = $_POST["typ_lowiska"];

if (isset($_POST['ryby']) && is_array($_POST['ryby'])) {
    $ryby = implode(" ", $_POST['ryby']);
} else {
    $ryby = "";
}


$sql = "SELECT id FROM kategorie WHERE nazwa = '$typ_lowiska'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$idKategorii = $row['id'];

$sqlLowisko = "INSERT INTO lowiska (idKategorii, nazwa, obrazek, opis, ryby, wojewodztwo) 
        VALUES ('$idKategorii', '$nazwa', '$obrazekNazwa', '$opis', '$ryby', '$wojewodztwo')";

if ($conn->query($sqlLowisko) === TRUE) {
    $lastLowiskoId = $conn->insert_id;

    $obrazki = $_FILES["obrazki"]["name"];
    $targetDirectory = "obrazki/";

    for ($i = 0; $i < count($obrazki); $i++) {
        $targetFile = $targetDirectory . basename($obrazki[$i]);

        if (move_uploaded_file($_FILES["obrazki"]["tmp_name"][$i], $targetFile)) {
            $sqlZdjecie = "INSERT INTO zdjecie (idLowiska, zdjecie) 
                           VALUES ('$lastLowiskoId', '$targetFile')";
            $conn->query($sqlZdjecie);
        } else {
            echo "Błąd podczas przesyłania pliku.";
        }
    }

    header("Location: index.php");
    exit;
} else {
    echo "Błąd: " . $sqlLowisko . "<br>" . $conn->error;
}

$conn->close();
?>
