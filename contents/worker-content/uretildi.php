<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if (isset($_SESSION['logged_in1']) && $_SESSION['logged_in1'] == true) {

} else {
    header('Location: http://localhost/Bilisim/login/worker-login/login1.php');
}

$arr = [[1,1],[2,1],[3,2],[4,2],[5,3],[6,3],[7,4],[8,4],[9,5],[10,5]];
if (array_key_exists('keten_pantolon_uret', $_GET)){
    $value = $_GET['keten_pantolon_uretildi'];
    keten_pant_uret($value,$arr);
}
elseif (array_key_exists('keten_gomlek_uret',$_GET)){
    $value = $_GET['keten_gomlek_uretildi'];
    keten_gom_uret($value,$arr);
}
elseif (array_key_exists('ipek_pantolon_uret',$_GET)){
    $value = $_GET['ipek_pantolon_uretildi'];
    ipek_pant_uret($value,$arr);
}
elseif (array_key_exists('ipek_gomlek_uret',$_GET)){
    $value = $_GET['ipek_gomlek_uretildi'];
    ipek_gom_uret($value,$arr);
}
elseif (array_key_exists('yunlu_pantolon_uret',$_GET)){
    $value = $_GET['yunlu_pantolon_uretildi'];
    yun_pant_uret($value,$arr);
}
elseif (array_key_exists('yunlu_gomlek_uret',$_GET)){
    $value = $_GET['yunlu_gomlek_uretildi'];
    yun_gom_uret($value,$arr);
}
elseif (array_key_exists('polyester_pantolon_uret',$_GET)){
    $value = $_GET['polyester_pantolon_uretildi'];
    polyester_pant_uret($value,$arr);
}
elseif (array_key_exists('polyester_gomlek_uret',$_GET)){
    $value = $_GET['polyester_gomlek_uretildi'];
    polyester_gom_uret($value,$arr);
}
elseif (array_key_exists('pamuklu_pantolon_uret',$_GET)){
    $value = $_GET['pamuklu_pantolon_uretildi'];
    pamuklu_pant_uret($value,$arr);
}
elseif (array_key_exists('pamuklu_gomlek_uret',$_GET)){
    $value = $_GET['pamuklu_gomlek_uretildi'];
    pamuklu_gom_uret($value,$arr);
}

function keten_pant_uret($value,$arr){
    $arr1 = $arr[0];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}
function keten_gom_uret($value,$arr){
    $arr1 = $arr[1];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}
function ipek_pant_uret($value,$arr){
    $arr1 = $arr[2];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}
function ipek_gom_uret($value,$arr){
    $arr1 = $arr[3];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}
function yun_pant_uret($value,$arr){
    $arr1 = $arr[4];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}
function yun_gom_uret($value,$arr){
    $arr1 = $arr[5];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}
function polyester_pant_uret($value,$arr){
    $arr1 = $arr[6];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}
function polyester_gom_uret($value,$arr){
    $arr1 = $arr[7];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}
function pamuklu_pant_uret($value,$arr){
    $arr1 = $arr[8];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}
function pamuklu_gom_uret($value,$arr){
    $arr1 = $arr[9];
    $conn = mysqli_connect("localhost","root","","php_course");
    $q = "INSERT INTO uretildi(urun_id,kumas_id,miktar,ay,gun) VALUES ($arr1[0],$arr1[1],$value,1,11);";
    $conn->query($q);
    mysqli_close($conn);
}

header("Location: http://localhost/Bilisim/contents/worker-content/urun_uret.php");
exit();




?>
