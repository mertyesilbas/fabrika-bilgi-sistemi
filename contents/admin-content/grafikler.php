<?php

session_unset();
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

} else {
    header('Location: http://localhost/Bilisim/login/admin-login/login.php');
}

include 'grafik_hesaplama.php';
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
            <div class="card" style="margin-left: 50px;width: max-content">
                <div class="title" style="text-align: center;color: black;font-size: 18px;margin-top: 5px;">Toplam Kumaş Miktarları</div>
                <div id="chart1">

                </div>
            </div>
            <div class="card" style="margin-left: 50px;width: 750px;align-items: center">
                <div class="title" style="text-align: center;color: black;font-size: 18px;margin-top: 5px">Her Bir Kumaşın Üretim Maliyeti (g/m2)</div>
                <div id="chart4">

                </div>
            </div>
            <div class="card" style="margin-left: 50px;width: max-content">
                <div class="title" style="text-align: center;color: black;font-size: 18px;margin-top: 5px">Her Bir Kumaştan Üretilebilecek Miktar</div>
                <div id="chart2" style="margin-left: 5px">

                </div>
            </div>
            <div class="card" style="margin-left: 50px;width: max-content">
                <div id="chart3" style="margin-left: 5px;">

                </div>
            </div>

        </div>
    </section>
</div>

    <script type="text/javascript">

        var options = {
            series: [{
                name: 'Miktar(g/m2)',
                data: <?php echo $amounts;?>,
            }],
            chart: {
                width: 750,
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2
            },

            grid: {
                row: {
                    colors: ['#fff', '#f2f2f2']
                }
            },
            xaxis: {
                labels: {
                    rotate: -45
                },
                categories: <?php
                echo $labels;?> ,
                tickPlacement: 'on'
            },
            yaxis: {
                title: {
                    text: 'Miktar(g/m2)',
                },
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: "horizontal",
                    shadeIntensity: 0.25,
                    gradientToColors: undefined,
                    inverseColors: true,
                    opacityFrom: 0.85,
                    opacityTo: 0.85,
                    stops: [50, 0, 100]
                },
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();


    </script>
    <script type="text/javascript">
        var options = {
            series: [
                {
                    data: [
                        {
                            x: <?php echo json_encode($arr4[0]);?>,
                            y: Math.round((<?php echo json_encode($arr2[0]);?> / <?php echo json_encode($arr3[0]);?>))
                        },
                        {
                            x: <?php echo json_encode($arr4[2]);?>,
                            y: Math.round((<?php echo json_encode($arr2[1]);?> / <?php echo json_encode($arr3[2]);?>))
                        },
                        {
                            x: <?php echo json_encode($arr4[4]);?>,
                            y: Math.round((<?php echo json_encode($arr2[2]);?> / <?php echo json_encode($arr3[4]);?>))
                        },
                        {
                            x: <?php echo json_encode($arr4[6]);?>,
                            y: Math.round((<?php echo json_encode($arr2[3]);?> / <?php echo json_encode($arr3[6]);?>))
                        },
                        {
                            x: <?php echo json_encode($arr4[8]);?>,
                            y: Math.round((<?php echo json_encode($arr2[4]);?> / <?php echo json_encode($arr3[8]);?>))
                        }
                    ]
                }
            ],
            legend: {
                show: false
            },
            chart: {
                width: 750,
                height: 350,
                type: 'treemap'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    </script>
    <script type="text/javascript">
    var options = {
        series: [
            {
                data: [
                    {
                        x: <?php echo json_encode($arr4[1]);?>,
                        y: Math.round((<?php echo json_encode($arr2[0]);?> / <?php echo json_encode($arr3[1]);?>))
                    },
                    {
                        x: <?php echo json_encode($arr4[3]);?>,
                        y: Math.round((<?php echo json_encode($arr2[1]);?> / <?php echo json_encode($arr3[3]);?>))
                    },
                    {
                        x: <?php echo json_encode($arr4[5]);?>,
                        y: Math.round((<?php echo json_encode($arr2[2]);?> / <?php echo json_encode($arr3[5]);?>))
                    },
                    {
                        x: <?php echo json_encode($arr4[7]);?>,
                        y: Math.round((<?php echo json_encode($arr2[3]);?> / <?php echo json_encode($arr3[7]);?>))
                    },
                    {
                        x: <?php echo json_encode($arr4[9]);?>,
                        y: Math.round((<?php echo json_encode($arr2[4]);?> / <?php echo json_encode($arr3[9]);?>))
                    }
                ]
            }
        ],
        legend: {
            show: false
        },
        chart: {
            width: 750,
            height: 350,
            type: 'treemap'
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart3"), options);
    chart.render();
</script>
    <script type="text/javascript">
        var options = {
            series: <?php echo json_encode($arr3)?>,
            chart: {
                height: 400,
                width: 500,
                type: 'donut',
            },
            colors: ["#797251","#93939B","#9ea97d","#4e4b4e","#303332","#d03223","#dd6b4e","#dd967a","#a0877a","#526257"],
            labels: <?php echo json_encode($arr4)?>,
            dataLabels: {
                enabled: false
            }
            ,
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart4"), options);
        chart.render();
    </script>
</body>
</html>