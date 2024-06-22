<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Łowiska Online</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
            padding-bottom: 200px;
        }

        .footer-dark {
            background-color: #343a40;
            color: #ffffff;
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .row {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .item {
            margin: 0 15px;
        }

        .social {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="content">
    </div>

    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Kontakt</h3>
                        <ul>
                            <li>E-mail: mm87597@stud.uws.edu.pl</li>
                            <li>Telefon: 111 111 111</li>
                            <li>Autor: Michał Mirończuk</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>O nas</h3>
                        <p>Witaj w Łowiska Online - Twoim przewodniku po najwspanialszych łowiskach w Polsce. Zapraszamy do odkrywania fascynującego świata wędkarstwa oraz do eksplorowania malowniczych miejsc, gdzie natura splata się z pasją łowienia ryb.</p>
                    </div>
                    <div class="col item social">
                        <a href="https://www.pzw.org.pl/siedlce/" target="_blank">
                            <img src="obrazki/pzw_logo.png" alt="PZW" style="width: 30px; height: 30px;">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
