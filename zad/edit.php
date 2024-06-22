<?php
$conn = new mysqli("localhost", "root", "", "projektlowiska");
$id = $_POST["id"];

$sql = "SELECT obrazek FROM lowiska WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_object();
$obrazek = $row->obrazek;

if ($_FILES["obrazek"]["name"] !== "") {
    unlink("obrazki/" . $obrazek);

    $obrazek = basename($_FILES["obrazek"]["name"]);
    move_uploaded_file($_FILES["obrazek"]["tmp_name"], "obrazki/" . $obrazek);
}

$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$wojewodztwo = $_POST["wojewodztwo"];

if (isset($_POST['ryby']) && is_array($_POST['ryby'])) {
    $ryby = implode(" ", $_POST['ryby']);
} else {
    $ryby = "";
}

$sql = "UPDATE lowiska SET nazwa = ?, obrazek = ?, opis = ?, wojewodztwo = ?, ryby = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $nazwa, $obrazek, $opis, $wojewodztwo, $ryby, $id);
$stmt->execute();
$stmt->close();
$conn->close();

header("location: details.php?id=$id");
?>

