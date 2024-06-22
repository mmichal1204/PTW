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
        <table style="margin-left:calc(15%);">
        <h2>Moje ulubione</h2><hr>
            <tr>
                <th>Zdjęcie</th>
                <th>Nazwa</th>
                <th>Polubienie</th>
            </tr>
        <?php
        $idUzytkownika = $_SESSION["id"];
        $sql = "SELECT l.id AS id, l.nazwa AS nazwa, l.obrazek AS obrazek FROM lowiska l, ulubione u WHERE u.idLowiska = l.id AND u.idUzytkownika = $idUzytkownika";
        $result = $conn->query($sql);
        while ($row = $result->fetch_object()) {
            $sl = "SELECT id FROM ulubione WHERE idLowiska = $row->id AND idUzytkownika = $idUzytkownika";
            $added = $conn->query($sl)->num_rows > 0;
            $src = $added ? "pelne.png" : "puste.png";
            echo "<tr><td><img src='obrazki/{$row->obrazek}'></td><td><h1><a href='details.php?id={$row->id}'>{$row->nazwa}</a></h1></td><td><img class='fav' data-dzban='$row->id' src='$src'></td></tr>";
        }
        $conn->close();?>
        </table>
        </article>
        </section>
        <script src="script.js"></script>
        <?php require("footer.php"); ?>
</body>
</html>
