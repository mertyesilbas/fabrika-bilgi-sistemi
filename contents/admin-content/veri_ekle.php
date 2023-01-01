<?php

//session_unset(); // Farklı sayfa oluşturunca bunu kullanıyoruz.
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

} else {
    header('Location: http://localhost/Bilisim/login/admin-login/login.php');
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
<div id="container" style="height: 100%">
    <header>
        <div style="font-family: 'Roboto', sans-serif" id="centered"> Yönetici Arabirimi</div>
    </header>
    <section style="height: 100%">
        <nav>
            <br>
            <div class="kullanici" style="text-align: center">
                <a href="content.php" style="text-decoration: none">
                    <img src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/profile-group-icon.png"
                         style="height: 75px;width: 75px;"><br><br>
                    <h1 style="color: black;font-size: 30px;margin-top: 5px">Merhaba
                        - <?php echo $_SESSION["username"] ?></h1><br>
                </a>
            </div>

            <ul style="margin-top: 10px;">
                <li><a href="content.php" class="list-item"><i class="fas fa-home"></i> Anasayfa </a></li>
                <li><a href="veri_ekle.php" class="list-item"><i class="fas fa-plus-circle"></i> Ürünler </a></li>
                <li><a href="grafikler.php" class="list-item"><i class="fas fa-chart-pie"></i> Grafikler </a></li>
                <li><a href="content.php" class="list-item"><i class="fas fa-envelope"></i> İletişim </a></li>
                <li><a href="../../login/admin-login/logout.php" class="list-item"><i class="fas fa-envelop"></i> Logout</a></li>
            </ul>
        </nav>

        <div class="content" style="height: 100%">
            <div class="card">
                <fieldset class="keten">
                    <legend style="font-weight: bold">Keten</legend>
                    <div class="keten-div">
                        <div class="keten_pantolon">
                            <div class="card" style="align-items: center">
                                <h1 style="margin-top: 10px;font-size: 25px">Keten Pantolon</h1>
                                <img src="../../img/keten_pantolon.png" style="width: 100px;height: 200px">
                                <form name="form1" method="get" action="urun_uret_calcs.php" style="text-align: center">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="keten_pantolon" value="keten_pantolon"><br>
                                    <button onclick="new_func(0)" type="submit" name="keten_pant_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>
                        <div class="keten_gomlek">
                            <div class="card" style="align-items: center;">
                                <h1 style="margin-top: 10px;font-size: 25px;">Keten Gömlek</h1>
                                <img src="../../img/keten_gomlek.png" style="width: 150px;height: 150px">
                                <form name="form2" method="get" action="urun_uret_calcs.php" style="text-align: center;margin-top: 51px">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="keten_gomlek"><br>
                                    <button onclick="new_func(1)" type="submit" name="keten_gom_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>

                    </div>

                </fieldset>
                <fieldset class="ipek">
                    <legend style="font-weight: bold">İpek</legend>
                    <div class="ipek-div">
                        <div class="ipek_pantolon">
                            <div class="card" style="align-items: center">
                                <h1 style="margin-top: 10px;font-size: 25px">İpek Pantolon</h1>
                                <img src="../../img/ipek_pantolon.png" style="width: 100px;height: 200px">
                                <form name="form3" method="get" action="urun_uret_calcs.php" style="text-align: center">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="ipek_pantolon"><br>
                                    <button onclick="new_func(2)" type="submit" name="ipek_pant_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>
                        <div class="ipek_gomlek">
                            <div class="card" style="align-items: center;">
                                <h1 style="margin-top: 10px;font-size: 25px;">İpek Gömlek</h1>
                                <img src="../../img/ipek_gomlek.png" style="width: 150px;height: 150px">
                                <form name="form4" method="get" action="urun_uret_calcs.php" style="text-align: center;margin-top: 51px">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="ipek_gomlek"><br>
                                    <button onclick="new_func(3)" type="submit" name="ipek_gom_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </fieldset>

                <fieldset class="yunlu" style="border:1px solid black">
                    <legend style="font-weight: bold">Yün</legend>
                    <div class="yunlu-div">
                        <div class="yunlu_pantolon">
                            <div class="card" style="align-items: center">
                                <h1 style="margin-top: 10px;font-size: 25px">Yün Pantolon</h1>
                                <img src="../../img/yunlu_pantolon.png" style="width: 100px;height: 200px">
                                <form name="form5" method="get" action="urun_uret_calcs.php" style="text-align: center">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="yunlu_pantolon"><br>
                                    <button onclick="new_func(4)" type="submit" name="yunlu_pant_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>
                        <div class="yunlu_gomlek">
                            <div class="card" style="align-items: center;">
                                <h1 style="margin-top: 10px;font-size: 25px;">Yün Gömlek</h1>
                                <img src="../../img/yunlu_gomlek.png" style="width: 150px;height: 150px">
                                <form name="form6" method="get" action="urun_uret_calcs.php" style="text-align: center;margin-top: 51px">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="yunlu_gomlek"><br>
                                    <button onclick="new_func(5)" type="submit" name="yunlu_gom_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>

                    </div>

                </fieldset>
                <fieldset class="polyester" style="border:1px solid black">
                    <legend style="font-weight: bold">Polyester</legend>
                    <div class="polyester-div">
                        <div class="polyester_pantolon">
                            <div class="card" style="align-items: center">
                                <h1 style="margin-top: 10px;font-size: 23px">Polyester Pantolon</h1>
                                <img src="../../img/polyester_pantolon.png" style="width: 200px;height: 200px">
                                <form name="form7" method="get" action="urun_uret_calcs.php" style="text-align: center">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="polyester_pantolon"><br>
                                    <button onclick="new_func(6)" type="submit" name="polyester_pant_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>
                        <div class="polyester_gomlek">
                            <div class="card" style="align-items: center;">
                                <h1 style="margin-top: 10px;font-size: 25px;">Polyester Gömlek</h1>
                                <img src="../../img/polyester_gomlek.png" style="width: 150px;height: 150px">
                                <form name="form8" method="get" action="urun_uret_calcs.php" style="text-align: center;margin-top: 51px">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="polyester_gomlek"><br>
                                    <button onclick="new_func(7)" type="submit" name="polyester_gom_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>

                    </div>

                </fieldset>

                <fieldset class="pamuklu" style="border:1px solid black">
                    <legend style="font-weight: bold">Pamuklu</legend>
                    <div class="pamuklu-div">
                        <div class="pamuklu_pantolon">
                            <div class="card" style="align-items: center">
                                <h1 style="margin-top: 10px;font-size: 23px">Pamuklu Pantolon</h1>
                                <img src="../../img/pamuklu_pantolon.png" style="width: 100px;height: 200px">
                                <form name="form9" method="get" action="urun_uret_calcs.php" style="text-align: center">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="pamuklu_pantolon"><br>
                                    <button onclick="new_func(8)" type="submit" name="pamuklu_pant_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>
                        <div class="pamuklu_gomlek">
                            <div class="card" style="align-items: center;">
                                <h1 style="margin-top: 10px;font-size: 25px;">Pamuklu Gömlek</h1>
                                <img src="../../img/pamuklu_gomlek.png" style="width: 150px;height: 150px">
                                <form name="form10" method="get" action="urun_uret_calcs.php" style="text-align: center;margin-top: 51px">
                                    <label for="fname">Üretilecek Miktar</label><br>
                                    <input type="number" name="pamuklu_gomlek"><br>
                                    <button onclick="new_func(9)" type="submit" name="pamuklu_gom_uret" style="width: 170px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px 5px 5px 5px;background-color: lightgreen">Üret</button>
                                </form>

                            </div>
                        </div>

                    </div>

                </fieldset>
            </div>

        </div>

    </section>
</div>
    <script type="text/javascript">
        var array1 = ["keten_pant","keten_gom","ipek_pant","ipek_gom","yunlu_pant","yunlu_gom","polyester_pant","polyester_gom","pamuklu_pant","pamuklu_gom"];
        var array2 = ["keten_pantolon","keten_gomlek","ipek_pantolon","ipek_gomlek","yunlu_pantolon","yunlu_gomlek","polyester_pantolon","polyester_gomlek","pamuklu_pantolon","pamuklu_gomlek"];
        var array3 = ["Keten Pantolon","Keten Gömlek","İpek Pantolon","İpek Gömlek","Yün Pantolon","Yün Gömlek","Polyester Pantolon","Polyester Gömlek","Pamuklu Pantolon","Pamuklu Gömlek"];

        function new_func(i){
            var ai = i;
            a = ai+1;
            b = a.toString();
            var empty = document.forms['form'+b][array2[i]].value;

            if (empty == '') {
                alert("Lütfen Sayı Giriniz!");

            }
            else if ((Math.sign(parseInt(empty))) == -1) {
                alert("Lütfen Geçerli Bir Sayı Giriniz!");

            }
            else
            {
                alert(array3[i]+" Üretim Bilgisi Girildi.");

            }
        }


    </script>
</body>
</html>