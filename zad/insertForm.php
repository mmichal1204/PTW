<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie nowego łowiska</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class='dzb'>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <h1>Dodaj nowe łowisko</h1>
        <p>Nazwa <input type="text" name="nazwa" id="nazwa"></p>
        <p>Obrazek <input type="file" name="obrazek" id="obrazek"></p>
        <p>Galeria <input type="file" name="obrazki[]" id="obrazki" multiple></p>
        <p>Opis <textarea name="opis" id="opis" cols="20" rows="8"></textarea></p>
        <p>Województwo 
            <select name="wojewodztwo" id="wojewodztwo">
                <option value="dolnośląskie">Dolnośląskie</option>
                <option value="kujawsko-pomorskie">Kujawsko-Pomorskie</option>
                <option value="lubelskie">Lubelskie</option>
                <option value="lubuskie">Lubuskie</option>
                <option value="łódzkie">Łódzkie</option>
                <option value="małopolskie">Małopolskie</option>
                <option value="mazowieckie">Mazowieckie</option>
                <option value="opolskie">Opolskie</option>
                <option value="podkarpackie">Podkarpackie</option>
                <option value="podlaskie">Podlaskie</option>
                <option value="pomorskie">Pomorskie</option>
                <option value="śląskie">Śląskie</option>
                <option value="świętokrzyskie">Świętokrzyskie</option>
                <option value="warmińsko-mazurskie">Warmińsko-Mazurskie</option>
                <option value="wielkopolskie">Wielkopolskie</option>
                <option value="zachodniopomorskie">Zachodniopomorskie</option>
            </select>
            <p>Typ łowiska:
            <select name="typ_lowiska" id="typ_lowiska">
                <option value="jezioro">Jezioro</option>
                <option value="rzeka">Rzeka</option>
            </select>
            <p>Ryby: <br>
    <input type="checkbox" name="ryby[]" value="szczupak"> Szczupak<br>
    <input type="checkbox" name="ryby[]" value="sum"> Sum<br>
    <input type="checkbox" name="ryby[]" value="leszcz"> Leszcz<br>
    <input type="checkbox" name="ryby[]" value="karp"> Karp<br>
    <input type="checkbox" name="ryby[]" value="klen"> Kleń<br>
    <input type="checkbox" name="ryby[]" value="sandacz"> Sandacz<br>
    <input type="checkbox" name="ryby[]" value="okon"> Okoń<br>
    <input type="checkbox" name="ryby[]" value="węgorz"> Węgorz<br>
</p>
        </p>
        <p><input type="submit" class='button' style='height:40px' value="Dodaj"></p>
        <p class='link'><a href="index.php">Powrót</a> do strony głównej</p><br>
    </form>
    </div>
    <?php require("footer.php"); ?>
</body>
</html>
