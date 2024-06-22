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
 require("db.php");
 if (isset($_POST["login"])) {
 $login = $_POST["login"];
 $haslo = $_POST["haslo"];
 $email = $_POST["email"];
 $sql = "INSERT INTO uzytkownicy (login, haslo, email) VALUES ('$login', '" . md5($haslo) . 
"', '$email')";
 $result = $conn->query($sql);
 if ($result) {
 echo "<div class='form'>
 <h3>Zostałeś pomyślnie zarejestrowany.</h3><br/>
 <p class='link'><a href='login.php'>Kliknij tutaj, aby się zalogować</a></p>
 </div>";
 } else {
 echo "<div class='form'>
 <h3>Nie wypełniłeś wymaganych pól.</h3><br>
 <p class='link'><a href='registration.php'>Kliknij tutaj, aby ponowić próbę rejestracji.</a></p></div>";
 }
 } else {
?>

<div class='log'>
    <div class='lew'>
 <form class="form" action="" method="post">
   
 <h1 class="login-title">Rejestracja</h1>
 <p>Dołącz do naszej społeczności!</p>
 <input type="text" class="login-input" name="login" placeholder="Login" required/>
 <input type="password" class="login-input" name="haslo" placeholder="Hasło" 
required/>
 <input type="text" class="login-input" name="email" placeholder="Adres 
email"required/>
 <input type="submit" name="submit" value="Zarejestruj się" class="login-button">
 <p class="link">Masz już konto?<a href="login.php">Zaloguj się</a></p>
 </form>
 </div>
 </div>
<?php
 }
?>
</body>
</html>