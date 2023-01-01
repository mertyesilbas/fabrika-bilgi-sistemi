<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

} else {
    header('Location: http://localhost/Bilisim/login/admin-login/login.php');
}
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

function y(){
//                    $conn = mysqli_connect("localhost","root","","php_course");
//                    $conn->set_charset('utf8mb4');
//                    $q = "SELECT kumas_cesitleri.kumas_adi as ad,kumas_cesitler.kumas_miktari as miktar FROM kumas_cesitleri";
//                    $query = $conn->query($q);
    $conn = mysqli_connect("localhost", "root", "", "php_course");
    $conn->set_charset('utf8mb4');
    $q = "SELECT kumas_cesitleri.kumas_adi as ad,kumas_cesitleri.kumas_miktari as miktar FROM kumas_cesitleri";
    $query = $conn->query($q);
    mysqli_close($conn);
    return $query;
}
$a = y();
$arr1 = array();
while ($row = $a->fetch_array()){
    $arr1[] = (string)$row[0];
}
$labels = json_encode($arr1);

function x(){
    $conn = mysqli_connect("localhost", "root", "", "php_course");
    $conn->set_charset('utf8mb4');
    $q = "SELECT kumas_cesitleri.kumas_adi as ad,kumas_cesitleri.kumas_miktari as miktar FROM kumas_cesitleri";
    $query = $conn->query($q);
    mysqli_close($conn);
    return $query;
}
$b = x();
$arr2 = array();
while ($row = $b->fetch_array()){
    $arr2[] = (float)$row[1];
}
$amounts = json_encode($arr2);
//print $labels.$amounts;
function uretilebilecek_miktar(){
    $conn = mysqli_connect("localhost", "root", "", "php_course");
    $conn->set_charset('utf8mb4');
    $q = "SELECT urun_ad,gereken_kumas FROM `urunler` ";
    $query = $conn->query($q);
    mysqli_close($conn);
    return $query;
}
$c = uretilebilecek_miktar();
$arr3 = array();
$arr4 = array();
while ($row = $c->fetch_array()){
    $arr4[] = $row[0];
    $arr3[] = (float)$row[1];
}
?>