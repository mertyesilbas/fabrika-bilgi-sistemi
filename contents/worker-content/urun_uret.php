<?php

session_unset();
session_start();

if (isset($_SESSION['logged_in1']) && $_SESSION['logged_in1'] == true) {

} else {
    header('Location: http://localhost/Bilisim/login/worker-login/login1.php');
}
include_once 'uretilecek_urun.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="/ico/Cloth.ico">
    <link rel="icon" type="image/png" href="/ico/Cloth.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Bilişim Sistemleri
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="stylesheet" href="../../css/urun_uret.css">
<!--    <link rel="stylesheet" href="../../font/Butler_Stencil_Webfont/stylesheet.css">-->
<!--    <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="../../css/material-dashboard.css?v=2.1.2" rel="stylesheet"/>
    <link href="../../demo/demo.css" rel="stylesheet"/>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    <i class="fab fa-facebook-f"></i>
    <i class="fab fa-instagram"></i>
    <i class="fab fa-twitter"></i>
    <i class="fab fa-google"></i>
</div>
<div id="container">
    <header>
        <div style="font-family: 'Roboto', sans-serif" id="centered"> Çalışan Arabirimi</div>
    </header>
    <nav>
        <br>
        <div class="kullanici" style="text-align: center">
            <a href="content.php" style="text-decoration: none">
                <img src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/profile-group-icon.png"
                     style="height: 75px;width: 75px;"><br><br>
                <h1 style="font-weight:lighter;color: black;font-size: 30px;margin-top: 5px">Merhaba
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
    <div class="content">
        <div class="card" style="background: #322f2f;font-size: 20px;width: 95%;margin-left: 10px;align-items: center;height: 100px;float: top">
            <div class="notice notice-success">
                <br>
                <strong>Üretilecek Toplam Ürün Sayısı: </strong> <?php include_once 'uretilecek_urun.php';
                echo $top_urt_enc;?>
                <br>
                <strong style="opacity: 0 ">  NULL </strong>
            </div>
        </div>
        <div class="products">
            <?php
            $query1 = uretilecek_list();
            while ($row = $query1->fetch_array()){
                $a = $row[0];
                $b = $row[1];
                $c = $row[2];
                $d = $row[3];
                echo cards($a,$b,$c,$d);
            }
            ?>
        </div>
</div>


<script type="text/javascript">
    var array1 = ["keten_pant","keten_gom","ipek_pant","ipek_gom","yunlu_pant","yunlu_gom","polyester_pant","polyester_gom","pamuklu_pant","pamuklu_gom"];
    var array2 = ["keten_pantolon","keten_gomlek","ipek_pantolon","ipek_gomlek","yunlu_pantolon","yunlu_gomlek","polyester_pantolon","polyester_gomlek","pamuklu_pantolon","pamuklu_gomlek"];
    var array3 = ["Keten Pantolon","Keten Gömlek","İpek Pantolon","İpek Gömlek","Yün Pantolon","Yün Gömlek","Polyester Pantolon","Polyester Gömlek","Pamuklu Pantolon","Pamuklu Gömlek"];

    function new_func(i){
        var ai = i;
        b = ai.toString();
        alert(array3[i]+" Üretildi Bilgisi Girildi.");

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
        }

</script>

</body>
</html>