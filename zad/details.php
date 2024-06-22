<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
    </section>
    <section>
        <article id='det'>
            <div id='lewa'>
                <?php
                $id = $_GET['id'];
                $sql = "SELECT AVG(ocena) AS srednia FROM recenzje WHERE idLowiska = $id";
                $result = $conn->query($sql);
                $srednia = round($result->fetch_object()->srednia, 2);

                $sql = "SELECT id, idKategorii, nazwa, obrazek, opis, ryby, wojewodztwo FROM lowiska WHERE id = $id";
                $result = $conn->query($sql);
                $lowi = $result->fetch_object();

                $sql = "SELECT id, nazwa FROM kategorie WHERE id = $lowi->idKategorii";
                $result = $conn->query($sql);
                $kategoria = $result->fetch_object();

                $showHeartIcons = false;

                if (isset($_SESSION["id"])) {
                    $idUzytkownika = $_SESSION["id"];
                    $sql = "SELECT id FROM ulubione WHERE idLowiska = $id AND idUzytkownika = $idUzytkownika";
                    $added = $conn->query($sql)->num_rows > 0;
                    $text = $added ? "Usuń z ulubionych" : "Dodaj do ulubionych";
                    $src = $added ? "pelne.png" : "puste.png";

                    $showHeartIcons = true;
                } else {
                    $text = "Dodaj do ulubionych";
                    $src = "puste.png";
                }

                echo "<div class='lewo'><a href='index.php'>Wszystkie łowiska/</a><a href='index.php?idKat={$kategoria->id}'>$kategoria->nazwa</a>";
                echo "</div><h1>$lowi->nazwa";

                if ($showHeartIcons) {
                    echo " <img class='fav-icon' data-lowisko='$id' src='$src' width='20' height='20'>";
                }
                echo "</h1><p>Ocena: $srednia/5</p>";
                echo "<img width='500px' height='500px' src='obrazki/{$lowi->obrazek}'>";
                echo "<h2 style='text-align: center;'>Galeria</h2>";
                echo "<div class='gallery'>";
                $sql = "SELECT zdjecie FROM zdjecie WHERE idLowiska = $id";
                $result = $conn->query($sql);

                $firstImage = true;

                while ($row = $result->fetch_assoc()) {
                    $zdjecie = $row['zdjecie'];

                    if ($firstImage) {
                        echo "<img class='main-image' src='$zdjecie' alt='Zdjęcie' data-src='$zdjecie'></br>";
                        $mainImageURL = $zdjecie;
                        $firstImage = false;
                    } else {
                        echo "<img class='thumbnail' src='$zdjecie' alt='Zdjęcie' data-src='$zdjecie'>";
                    }
                }
                echo "</div>";
                ?>
                <h2>Opis</h2>
                <div class='opis-miejsca'>
                    <p><?php echo $lowi->opis; ?></p>
                    <h2>Szczegóły</h2>
                </div>
                <p>Występujące gatunki ryb: </p>
                <ul>
                    <?php
                    $ryby = explode(" ", $lowi->ryby);
                    foreach ($ryby as $ryba) {
                        echo "<li>$ryba</li>";
                    }
                    ?>
                </ul>
                <p>Województwo: <?php echo $lowi->wojewodztwo; ?></p>
                <?php
                if(isset($_SESSION["rola"]) && $_SESSION["rola"]==="admin")
                {
                    echo "<p><a class='button' style='padding-top:5px;' href='editForm.php?id=$id'>Edytuj łowisko</a>&nbsp;&nbsp;<a class='button' style='padding-top:5px;' href='delete.php?id=$id' onclick='return confirmDelete();'>Usuń łowisko</a></p>";
                }
                ?>
            </div>
            <div id="prawa"><br><br>
                <?php
                if (isset($_SESSION["login"])) {
                    echo "<h2>Dodaj recenzje</h2>";
                    echo "<div id='dod'>";
                    echo "<form action='insertReview.php' method='post'>";
                    echo "<input type='hidden' name='id' value='{$lowi->id}'>";
                    echo "<label for='recenzja'>Treść</label>";
                    echo "<textarea name='recenzja' id='recenzja' cols='24' rows='8'></textarea>";
                    echo "<p>Ocena";
                    echo "<select name='ocena' id='ocena'>";
                    echo "<option value='5'>5</option>";
                    echo "<option value='4'>4</option>";
                    echo "<option value='3'>3</option>";
                    echo "<option value='2'>2</option>";
                    echo "<option value='1'>1</option>";
                    echo "</select>/5</p>";
                    echo "<input type='submit' class='button' value='Dodaj'>";
                    echo "</form>";
                    echo "</div>";
                } else {
                    echo "<p>Aby dodać recenzję, zaloguj się lub zarejestruj.</p>";
                }
                ?>
                <h2>Recenzje</h2>
                <?php
                $id = $_GET['id'];
                $sql = "SELECT nick, ocena, tresc, data FROM recenzje WHERE idLowiska = $id";
                $result = $conn->query($sql);
                echo "<div class='opinia'><hr>";
                while ($row = $result->fetch_object()) {
                    echo "<div class='linia'>Nick: $row->nick<p>Data: $row->data</p><p>Ocena: $row->ocena/5</p></div><p>Treść recenzji: $row->tresc</p><hr>";
                }
                echo "</div>";
                $conn->close();
                ?>
            </div>
        </article>
    </section>
    <?php require("footer.php"); ?>
    <script src="script.js"></script>
    <script src="gallery.js"></script>
    <script>
        function confirmDelete() {
            return confirm("Czy na pewno chcesz usunąć to łowisko?");
        }
    </script>
</body>
</html>