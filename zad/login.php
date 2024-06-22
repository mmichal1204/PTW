<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('db.php');
session_start();


if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $sql = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='" . md5($haslo) . "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_object();
        $_SESSION["login"] = $login;
        $_SESSION["id"] = $row->id;
        $_SESSION["rola"] = $row->rola;
        header("Location: index.php");
    } else {
        echo "<div class='blad'><div><h2>Nieprawidłowy login lub hasło.</h2><p class='link'><a href='login.php'>Ponów próbę logowania</a>.</p></div></div>";
    }
} else {
?>
    <div class='log'>
        <div class='lew'>
            <form class="form" method="post" name="login">
                <h1 class="login-title">Logowanie</h1>
                <p>Uzyskaj dostęp do serwisu</p>
                <input type="text" class="login-input" name="login" placeholder="Login" 
                    autofocus="true"/>
                <input type="password" class="login-input" name="haslo" placeholder="Hasło"/>
                <input type="submit" value="Zaloguj" name="submit" class="login-button"/>
                <p class="link">Nie masz konta? <a href="registration.php">Zarejestruj się</a></p>
            </form>
            <p class="link">Przejdź na <a href="index.php">stronę główną</a></p>
        </div>
    </div>
<?php
}
?>
</body>
</html>
