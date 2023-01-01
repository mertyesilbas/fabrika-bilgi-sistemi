<?php


if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if (isset($_SESSION['logged_in1']) && $_SESSION['logged_in1'] == true) {

} else {
header('Location: http://localhost/Bilisim/login/worker-login/login1.php');
}

function toplam_uretilecek() {
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "SELECT SUM(uretilecek_group.miktar) FROM uretilecek_group";
    $query = $conn->query($q);
    $result = $query->fetch_array()[0];
    mysqli_close($conn);
    return $result;
}
$toplam_uretilecek = toplam_uretilecek();
$top_urt_enc = json_encode((int)$toplam_uretilecek);
//---------------------------------
function cards($a,$b,$c,$d){
    $turkish = array("İ", "Ğ", "Ü", "Ş", "Ö", "Ç");
    $english = array("I", "G", "U", "S", "O", "C");
    $turkish1 = array("i","ğ","ü","ş","ö","ç");
    $english1 = array("ı","g","u","s","o","c");
    $l = $c;
    $e = str_replace($turkish,$english,$d);
    $e = str_replace($turkish1,$english,$e);
    $e = mb_strtolower($e,'UTF-8');
    $f = $e.'_pantolon';
    $g = $e.'_gomlek';
    $h = $f.'_uretildi';
    $j = $g.'_uretildi';
    $ad = $f.'_uret';
    $ae = $g.'_uret';
    $i = 1;
    $png1= '../../img/'."$f".'.png';
    $png2 = '../../img/'."$g".'.png';
    $array = ["Keten Pantolon","Keten Gömlek","İpek Pantolon","İpek Gömlek","Yün Pantolon","Yün Gömlek","Polyester Pantolon","Polyester Gömlek","Pamuklu Pantolon","Pamuklu Gömlek"];
    while ($i<=$c) {
        $search = array_search($a,$array);
        $form = "form"."$search";
        $ac = 1;
        $arr = array();
        $result1 = '';
        while ($ac <= $l){
            $ab = "<option value=$ac>$ac</option>";
            $arr[] = $ab;
            $result1 = "{$result1}{$ab}";
            $ac++;
        }
        if ($b == 'pantolon') {
            if (str_contains($a,'Polyester')){
                $result0 = "<div class=$f id='cards'>
        <div class='card' style='align-items: center;padding: 10px 15px 15px 15px'>
            <h2 style='margin-top: 10px;font-size: 18px;font-weight: bold'>$a</h2>
            <img src=$png1 style='width: 200px;height:200px'>
            <p style='font-size: 16px;margin-top: 15px;font-style: oblique'>Adet: $c</p>
            <h1 style='font-size: 16px;font-weight: 600'>Üretilen Miktar</h1>
            <form method='GET' action='uretildi.php' style='align-items: center'>
                <select class='custom-select' style='width: 150px;font-size: 20px;height: 35px' name=$h>";


                $result2 ="</select>
                <button class='btn btn-success' style='display: block;margin-top: 10px;width: 150px' onclick='new_func($search)' type='submit' name=$ad>Üretildi</button>
            </form>
        </div>
        </div>";
                $result3 = "{$result0}{$result1}{$result2}";
            }
            else{
                $result0 = "<div class=$f id='cards'>
        <div class='card' style='align-items: center;padding: 10px 15px 15px 15px'>
            <h2 style='margin-top: 10px;font-size: 18px;font-weight: bold'>$a</h2>
            <img src=$png1 style='width: 200px;height: 200px'>
            <p style='font-size: 16px;margin-top: 15px;font-style: oblique'>Adet: $c</p>
            <h1 style='font-size: 16px;font-weight: 600'>Üretilen Miktar</h1>
            <form method='GET' action='uretildi.php' style='align-items: center'>
                <select class='custom-select' style='width: 150px;font-size: 20px;height: 35px' name=$h>";


                $result2 ="</select>
                <button class='btn btn-success' style='display: block;margin-top: 10px;width: 150px' onclick='new_func($search)' type='submit' name=$ad>Üretildi</button>
            </form>
        </div>
        </div>";
                $result3 = "{$result0}{$result1}{$result2}";
            }

        } elseif ($b == 'gomlek') {
            $result0 = "<div class=$g id='cards'>
        <div class='card' style='align-items: center;padding: 10px 15px 15px 15px'>
            <h2 style='margin-top: 10px;font-size: 18px;font-weight: bold'>$a</h2>
            <img src=$png2 style='width: 200px;height: 200px'>
            <p style='font-size: 16px;margin-top: 15px;font-style: oblique'>Adet: $c</p>
            <h1 style='font-size: 16px;font-weight: 600'>Üretilen Miktar</h1>
            <form method='GET'  action='uretildi.php' style='align-items: center'>
                <select class='custom-select' style='width: 150px;font-size: 20px;height: 35px' name=$j>";




            $result2 = "</select>    
            <button class='btn btn-success' style='display: block;margin-top: 10px;width: 150px' onclick='new_func($search)' type='submit' name=$ae>Üretildi</button> 
            </form>
        </div>
        </div>";
            $result3 = "{$result0}{$result1}{$result2}";
        }
        $i++;
        return $result3;
        $ac = $l;
        $result3 = '';
    }

}

function uretilecek_list(){
    $conn = mysqli_connect("localhost", "root", "", "php_course");
    $conn->set_charset('utf8mb4');
//    $q = "SELECT urunler.urun_ad as urun, urunler.tur as tur, SUM(uretilecek.miktar) as miktar, kumas_cesitleri.kumas_adi as kumas FROM uretilecek,urunler,kumas_cesitleri WHERE urunler.urun_id = uretilecek.urun_id AND uretilecek.kumas_id = kumas_cesitleri.kumas_id GROUP BY urunler.urun_id";
    $q = "SELECT * FROM uretilecek_group";
    $query = $conn->query($q);
    mysqli_close($conn);
    return $query;
}


?>