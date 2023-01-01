<?php

session_unset();
session_start();

if (isset($_SESSION['logged_in1']) && $_SESSION['logged_in1'] == true) {

} else {
    header('Location: http://localhost/Bilisim/login/worker-login/login1.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/ico/Cloth.ico">
    <link rel="icon" type="image/png" href="/ico/Cloth.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Bilişim Sistemleri
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="../../css/material-dashboard.css?v=2.1.2" rel="stylesheet"/>
    <link href="../../demo/demo.css" rel="stylesheet"/>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script type="text/javascript">
        function refreshPage () {
            var page_y = document.getElementsByTagName("body")[0].scrollTop;
            window.location.href = window.location.href.split('?')[0] + '?page_y=' + page_y;
        }
        window.onload = function () {
            setTimeout(refreshPage, 35000);
            if ( window.location.href.indexOf('page_y') != -1 ) {
                var match = window.location.href.split('?')[1].split("&")[0].split("=");
                document.getElementsByTagName("body")[0].scrollTop = match[1];
            }
        }
    </script>  <!--Sayfayı aynı konuma reloadlama-->

</head>
<body>
<div id="social">
    <font> KPC TEKSTİL | <span> Tekstilde teknoloji devri... </span> </font>
</div>
<div id="container">
    <header>
        <div style="font-family: 'Roboto', sans-serif" id="centered"> Çalışan Arabirimi</div>
    </header>
    <section>
        <nav>
            <br>
            <div class="kullanici" style="text-align: center">
                <a href="content1.php" style="text-decoration: none">
                    <img src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/profile-group-icon.png"
                         style="height: 75px;width: 75px;"><br><br>
                    <h1 style="color: black;font-size: 30px;margin-top: 5px">Merhaba
                        - <?php echo $_SESSION["username"] ?></h1><br>
                </a>

            </div>
            <ul style="margin-top: 10px;">
                <li><a href="content1.php" class="list-item"><i class="fas fa-home"></i> Anasayfa </a></li>
                <li><a href="urun_uret.php" class="list-item"><i class="fas fa-plus-circle"></i> Üretilecek Ürünler </a></li>
                <li><a href="../../iletisim1/index.php" class="list-item"><i class="fas fa-envelope"></i> İletişim </a></li>
                <li><a href="../../login/worker-login/logout1.php" class="list-item"><i class="fas fa-envelop"></i> Logout</a></li>
            </ul>
        </nav>
        <div class="content" style="background-position: cover;background-repeat: no-repeat;width: 80%;height: 700px;background-image: url(https://i.ytimg.com/vi/-Get-LNNH5Q/maxresdefault.jpg)">

        </div>
    </section>
</div>

</body>
</html>