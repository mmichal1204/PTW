<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #me {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #me p {
            margin: 0;
            display: flex;
            gap: 10px;
        }

        #me a {
            text-decoration: none;
        }

        #me button {
            background-color: #444;
            color: #fff;
            border: none;
            padding: 20px 20px;
            margin: 0;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
            line-height: 0.3;
        }

        #me button:hover {
            background-color: #555;
        }

        #me button:active {
            background-color: #666;
        }

        .button {
            background-color: #ff6600;
        }

        .button:hover {
            background-color: #ff8533;
        }

        .button:active {
            background-color: #e65c00;
        }
    </style>
</head>
<body>
    <header>
        <div id="me">
            <p>
                <a href="index.php"><button>Strona główna</button></a>
                <?php
                session_start();

                if (isset($_SESSION["login"])) {
                    echo "<a href='favourites.php'><button>Ulubione</button></a>";
                    echo "<a href='myReviews.php'><button>Moje recenzje</button></a>";
                    if ($_SESSION["rola"] === "admin") {
                        echo "<a href='insertForm.php'><button class='button'>Dodaj łowisko</button></a>";
                    }
                    echo "<a href='logout.php'><button>Wyloguj</button></a>";
                } else {
                    echo "<a href='login.php'><button>Zaloguj</button></a>";
                    echo "<a href='registration.php'><button>Zarejestruj się</button></a>";
                }
                ?>
            </p>
        </div>
    </header>
</body>
</html>
