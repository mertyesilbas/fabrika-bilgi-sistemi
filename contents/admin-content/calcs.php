<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

} else {
    header('Location: http://localhost/Bilisim/login.php');
}

function top_kumas(){
    $host = 'localhost';
    $username = 'root';
    $pass = '';
    $database = 'php_course';
    $conn = mysqli_connect($host,$username,$pass,$database);
    $q = 'CALL toplam_kumas_miktari()';
    $query = $conn ->query($q);
    mysqli_close($conn);
    return $query;
}
$top_kumas = top_kumas();
$top_kumas1 = $top_kumas->fetch_array()[0];
$top_kumasenc = json_encode((float)$top_kumas1);

function kullanilan_kumas(){
    $host = 'localhost';
    $username = 'root';
    $pass = '';
    $database = 'php_course';
    $conn = mysqli_connect($host,$username,$pass,$database);
    $q = 'CALL kullanilan_kumas()';
    $query = $conn ->query($q);
    mysqli_close($conn);
    return $query;
}
$kullanilan_kumas = kullanilan_kumas();
$kullanilan_kumas1 = $kullanilan_kumas->fetch_array()[0];
$kullanilan_kumasenc = json_encode((float)$kullanilan_kumas1);
?>