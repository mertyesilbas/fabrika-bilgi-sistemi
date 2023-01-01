<?php

session_unset();
session_start();

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
<div id="container">
    <header>
        <div style="font-family: 'Roboto', sans-serif" id="centered"> Yönetici Arabirimi</div>
    </header>
    <section>
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
                <li><a href="../../iletisim/index.php" class="list-item"><i class="fas fa-envelope"></i> İletişim </a></li>
                <li><a href="../../login/admin-login/logout.php" class="list-item"><i class="fas fa-envelop"></i> Logout</a></li>
            </ul>
        </nav>
        <div class="content">
            <div class="labels">

                <div  style="display:flex;float: left;width: 90%;margin-left: 40px">
                    <div class="card card-stats" style="z-index: 1">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">all_out</i>
                            </div>
                            <p class="card-category" style="font-size: 25px;color: #FC960E"><b>Toplam Kumaş Miktarı</b></p><br>
                            <h3 class="card-title"><b><?php include_once 'calcs.php';
                                echo round($top_kumasenc); ?></b>
                                <small>g/m2</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div><br>


                <div style="display:inline-block;float: left;width: 40%;height: 375px;margin-left: 40px">
                    <div class="card card-stats" style="height: 300px">
                        <div class="card-header card-header-success card-header-icon" style="text-align: center">
                            <div class="card-icon">
                                <i class="material-icons">not_started</i>
                            </div>
                            <p class="card-category" style="font-size: 25px;margin-top: 100px">
                                Kullanılan Kumaş Miktarı</p><br>
                            <h3 class="card-title"><b>
                                <?php include_once 'calcs.php';
                                echo round($kullanilan_kumasenc,2); ?></b>
                                <small>g/m2</small>
                            </h3>

                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>


                <div style="background: inherit;display: inline-block;width: 45%;height: 375px;float: left;margin-left: 40px;background-color: inherit">

                    <div class="card" style="width: 95%;margin-left: 5%">
                        <div id="myChart" >

                        </div>
                    </div>

                </div><br>
                <br>

            </div>


        </div>
    </section>
</div>
    <script type="text/javascript">

        var graph = function(color, label, data, value) {
            return {
                type: 'ring',
                backgroundColor: '#fff',
                height: "250",
                plot: {
                    slice: '85%', // Ring width,
                    detach: false, // Prevent ring piece from detaching on click
                    valueBox: [{
                        // Percentage text
                        type: 'first',
                        text: value || `${parseInt(data[0]/(data[0]+data[1])*100)}%`,
                        connected: false,
                        fontColor: color,
                        fontSize: '35px',
                        placement: 'center',
                        visible: true,
                        offsetY: '0px',
                    },
                        {
                            // Label text
                            type: 'first',
                            text: label,
                            connected: false,
                            fontColor: '#718096',
                            fontSize: '20px',
                            placement: 'center',
                            visible: true,
                            offsetY: '100',
                        }
                    ],
                    animation: {
                        // Animation effect
                        effect: 2,
                        method: 0,
                        speed: 1,
                        sequence: 1
                    }
                },
                labels: [{
                    // Fraction text
                    text: `${(data[0])} / ${data[1]} g/m2`.bold(),
                    fontColor: '#3C4858',
                    fontSize: '17px',
                    fontWeight: 100,
                    x: '25%',
                    y: '5%',
                }],
                scaleR: {
                    // Set to half ring
                    refAngle: 270,
                    aperture: 360
                },
                tooltip: {
                    // Hide tooltip
                    visible: true
                },
                series: [{
                    // First part of the ring (colored)
                    values: [data[0]],
                    backgroundColor: color,
                },
                    {
                        // Remainder of ring
                        values: [data[1]],
                        backgroundColor: '#EDF2F7',
                    }
                ]
            };
        };

        var g1 = graph('#E8403D', '<br><br>Kumaş Toplam<br>Kullanım Oranı', [<?php include_once 'calcs.php';
            echo $kullanilan_kumasenc; ?>,<?php include_once 'calcs.php';
            echo $top_kumasenc; ?>]);

        var myConfig = {
            layout: 'horizontal', // Layout ring charts horizontally
            graphset: [g1],
        };

        zingchart.render({
            id: "myChart",
            height: '300',
            width: '350',
            data: myConfig,
        });

    </script>

</body>
</html>