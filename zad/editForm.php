<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja łowiska</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    require("db.php");
    $id = $_GET["id"];
    $sql = "SELECT id, idKategorii, nazwa, obrazek, opis, ryby, wojewodztwo FROM lowiska WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
    $selectedFish = explode(" ", $row->ryby);
    $conn->close();
    ?>
    
    
    <div class='dzb'>
        <form action="edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
            <h1>Edytuj łowisko</h1>
            <p>Nazwa <input type="text" name="nazwa" id="nazwa" value="<?php echo $row->nazwa; ?>"></p>
            <p>Obrazek <input type="file" name="obrazek" id="obrazek"></p>
            <p>Obecny obrazek: <img src="obrazki/<?php echo $row->obrazek; ?>" alt="Obrazek"></p>
            <p>Opis <textarea name="opis" id="opis" cols="20" rows="8"><?php echo $row->opis; ?></textarea></p>
            <p>Województwo 
                <select name="wojewodztwo" id="wojewodztwo">
                    <option value="dolnośląskie" <?php if ($row->wojewodztwo === 'dolnośląskie') echo 'selected'; ?>>Dolnośląskie</option>
                    <option value="kujawsko-pomorskie" <?php if ($row->wojewodztwo === 'kujawsko-pomorskie') echo 'selected'; ?>>Kujawsko-Pomorskie</option>
                    <option value="lubelskie" <?php if ($row->wojewodztwo === 'lubelskie') echo 'selected'; ?>>Lubelskie</option>
                    <option value="lubuskie" <?php if ($row->wojewodztwo === 'lubuskie') echo 'selected'; ?>>Lubuskie</option>
                    <option value="łódzkie" <?php if ($row->wojewodztwo === 'łódzkie') echo 'selected'; ?>>Łódzkie</option>
                    <option value="małopolskie" <?php if ($row->wojewodztwo === 'małopolskie') echo 'selected'; ?>>Małopolskie</option>
                    <option value="mazowieckie" <?php if ($row->wojewodztwo === 'mazowieckie') echo 'selected'; ?>>Mazowieckie</option>
                    <option value="opolskie" <?php if ($row->wojewodztwo === 'opolskie') echo 'selected'; ?>>Opolskie</option>
                    <option value="podkarpackie" <?php if ($row->wojewodztwo === 'podkarpackie') echo 'selected'; ?>>Podkarpackie</option>
                    <option value="podlaskie" <?php if ($row->wojewodztwo === 'podlaskie') echo 'selected'; ?>>Podlaskie</option>
                    <option value="pomorskie" <?php if ($row->wojewodztwo === 'pomorskie') echo 'selected'; ?>>Pomorskie</option>
                    <option value="śląskie" <?php if ($row->wojewodztwo === 'śląskie') echo 'selected'; ?>>Śląskie</option>
                    <option value="świętokrzyskie" <?php if ($row->wojewodztwo === 'świętokrzyskie') echo 'selected'; ?>>Świętokrzyskie</option>
                    <option value="warmińsko-mazurskie" <?php if ($row->wojewodztwo === 'warmińsko-mazurskie') echo 'selected'; ?>>Warmińsko-Mazurskie</option>
                    <option value="wielkopolskie" <?php if ($row->wojewodztwo === 'wielkopolskie') echo 'selected'; ?>>Wielkopolskie</option>
                    <option value="zachodniopomorskie" <?php if ($row->wojewodztwo === 'zachodniopomorskie') echo 'selected'; ?>>Zachodniopomorskie</option>
                </select>
            </p>
            <p>Ryby: <br>
                <input type="checkbox" name="ryby[]" value="szczupak" <?php if (in_array('szczupak', $selectedFish)) echo 'checked'; ?>> Szczupak<br>
                <input type="checkbox" name="ryby[]" value="sum" <?php if (in_array('sum', $selectedFish)) echo 'checked'; ?>> Sum<br>
                <input type="checkbox" name="ryby[]" value="leszcz" <?php if (in_array('leszcz', $selectedFish)) echo 'checked'; ?>> Leszcz<br>
                <input type="checkbox" name="ryby[]" value="karp" <?php if (in_array('karp', $selectedFish)) echo 'checked'; ?>> Karp<br>
                <input type="checkbox" name="ryby[]" value="klen" <?php if (in_array('klen', $selectedFish)) echo 'checked'; ?>> Kleń<br>
                <input type="checkbox" name="ryby[]" value="sandacz" <?php if (in_array('sandacz', $selectedFish)) echo 'checked'; ?>> Sandacz<br>
                <input type="checkbox" name="ryby[]" value="okon" <?php if (in_array('oko', $selectedFish)) echo 'checked'; ?>> Okoń<br>
                <input type="checkbox" name="ryby[]" value="węgorz" <?php if (in_array('węgorz', $selectedFish)) echo 'checked'; ?>> Węgorz<br>
            </p>
            <input type="submit" class='button' style='height:40px' value="Zapisz zmiany">
            <p class='link'><a href="index.php">Anuluj</a></p><br>
        </form>
    </div>
    <?php require("footer.php"); ?>
</body>
</html>
