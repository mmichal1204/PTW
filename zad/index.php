<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Łowiska</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <?php require("menu.php");?>
    <section>
        <nav>
            <h1>Kategorie</h1>
            <ul id='menu'>
                <?php
                require("db.php");

                $sql = "SELECT id, nazwa FROM kategorie";
                $result = $conn->query($sql);
                echo "<li><a href='index.php'>Wszystkie</a></li>";
                while($row = $result->fetch_object()){
                    echo "<li><a href='index.php?idKat={$row->id}'>{$row->nazwa}</a></li>";
                }
                ?>
            </ul>
            <form method="GET" action="index.php">
                <p> <input type="text" name="fraza"> <input type="submit" class="button" value="Szukaj"> </p>
            </form>
        </nav>
    </section>
    <section>
        <article>
        <form method="GET" action="index.php">
                <label for="sortowanie">Sortowanie: </label>
                <select name="sortowanie" id="sortowanie">
                    <option value="asc">Od najniższej oceny</option>
                    <option value="desc">Od najwyższej oceny</option>
                </select>
                <input type="submit" class="button" value="Sortuj">
            </form>
            <table>
                <tr>
                    <th>Obrazek</th>
                    <th>Opis</th>
                </tr>
                <?php
                $sql = "SELECT l.id AS id, l.nazwa AS nazwa, l.obrazek AS obrazek, l.ryby AS ryby, l.opis AS opis, l.wojewodztwo AS wojewodztwo, k.nazwa AS rodzaj FROM lowiska l";
                $sql .= " LEFT JOIN kategorie k ON l.idKategorii = k.id";

                if(isset($_GET['idKat']) && !empty($_GET['idKat'])) {
                    $idKat = $_GET['idKat'];
                    if (strpos($sql, 'WHERE') === false) {
                        $sql .= " WHERE l.idKategorii = $idKat";
                    } else {
                        $sql .= " AND l.idKategorii = $idKat";
                    }
                }

                if(isset($_GET['fraza']) && !empty($_GET['fraza'])) {
                    $fraza = $_GET['fraza'];
                    if (strpos($sql, 'WHERE') === false) {
                        $sql .= " WHERE l.nazwa LIKE '%$fraza%'";
                    } else {
                        $sql .= " AND l.nazwa LIKE '%$fraza%'";
                    }
                }

                if (isset($_GET['sortowanie']) && ($_GET['sortowanie'] == 'asc' || $_GET['sortowanie'] == 'desc')) {
                    $sortowanie = $_GET['sortowanie'];
                    $sql .= " LEFT JOIN recenzje r ON l.id = r.idLowiska";
                    $sql .= " GROUP BY l.id";
                    $sql .= " ORDER BY AVG(r.ocena) $sortowanie";
                }

                $result = $conn->query($sql);

                while($row = $result->fetch_object()) {
                    echo "<tr>";
                    echo "<td><img src='obrazki/{$row->obrazek}'></td>";
                    echo "<td><h3><a href='details.php?id={$row->id}'>{$row->nazwa}</a></h3>";
                    echo "<p>Rodzaj: {$row->rodzaj}</p>";
                    echo "<p>Wojewodztwo: {$row->wojewodztwo}</p>";
                    $sr = "SELECT AVG(ocena) AS srednia FROM recenzje WHERE idLowiska = {$row->id}";
                    $srednia = round($conn->query($sr)->fetch_object()->srednia, 2);
                    echo "<p>Ocena: {$srednia}/5</p>";
                    echo "<td>";
                    if (isset($_SESSION["login"])) {
                        $idUzytkownika = $_SESSION["id"];
                        $sl = "SELECT id FROM ulubione WHERE idLowiska = $row->id AND idUzytkownika = $idUzytkownika";
                        $added = $conn->query($sl)->num_rows > 0;

                        if ($added) {
                            echo "<img class='fav-icon' data-lowisko='{$row->id}' src='pelne.png' alt='Usuń z ulubionych'>";
                        } else {
                            echo "<img class='fav-icon' data-lowisko='{$row->id}' src='puste.png' alt='Dodaj do ulubionych'>";
                        }
                    }
                    echo "</td>";

                    echo "</tr>";
                }

                $conn->close();
                ?>
            </table>
        </article>
    </section>
    <?php require("footer.php"); ?>
</body>
</html>
