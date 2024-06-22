<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require("menu.php");

require("db.php");
?>
<section>
<nav id='de'>
            <h1>Kategorie</h1>
            <ul id='menu'>
                <?php
                $sql = "SELECT id,nazwa FROM kategorie";
                $result = $conn->query($sql);
                echo "<li><a href='index.php'>Wszystkie</a></li>";
                while ($row = $result->fetch_object()) {
                    echo "<li><a href='index.php?idKat={$row->id}'>{$row->nazwa}</a></li>";
                }
                ?>
            </ul>
            <form>
                <p> <input type="text" name="fraza"> <input type="submit" class="button" value="Szukaj"> </p>
            </form>
        </nav>
<article style='margin-left:calc(25%);border-radius:15px'>
        <h2>Moje recenzje</h2>
 <?php
 $nick=$_SESSION["login"];
 $sql="SELECT idlowiska, ocena, tresc, data, l.id AS did, l.nazwa AS nazwa FROM recenzje, lowiska l WHERE l.id=idlowiska AND nick='$nick'";
 $result=$conn->query($sql);
        while($row=$result->fetch_object()){
            echo "<hr><h1><a href='details.php?id=$row->did'>$row->nazwa</a></h1><p>Ocena: $row->ocena/5&nbsp;&nbsp;<br>Data: $row->data</p><p>$row->tresc</p>";
        }
        echo "<hr>";
        $conn->close();?>
        </article>
    </section>
    <?php require("footer.php"); ?>
</body>
</html>