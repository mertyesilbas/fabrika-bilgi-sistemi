<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

} else {
    header('Location: http://localhost/Bilisim/login/admin-login/login.php');
}


$current_day = (int)(date("d"));
$current_mounth = (int)(date("m"));
$array1 = ["keten_pant","keten_gom","ipek_pant","ipek_gom","yunlu_pant","yunlu_gom","polyester_pant","polyester_gom","pamuklu_pant","pamuklu_gom"];
$array2 = ["keten_pantolon","keten_gomlek","ipek_pantolon","ipek_gomlek","yunlu_pantolon","yunlu_gomlek","polyester_pantolon","polyester_gomlek","pamuklu_pantolon","pamuklu_gomlek"];
$array3 = [[1,1],[2,1],[3,2],[4,2],[5,3],[6,3],[7,4],[8,4],[9,5],[10,5]];

$i = 0;
foreach ($array1 as $value){
    $a = $value.'_uret';
    $b = $array3[$i];
    if (isset($_GET[$a])){
        if((!empty($_GET[$array2[$i]])) && ((int)($_GET[$array2[$i]]) > 0)){
            $var1 = $_GET[$array2[$i]];
            $conn = mysqli_connect("localhost","root","","php_course");
            $q = "INSERT INTO uretilecek(urun_id,kumas_id,miktar,ay,gun) VALUES ($b[0],$b[1],$var1,1,11);";
            $conn->query($q);
            mysqli_close($conn);
        }
        else{
        }
    }
    $i = $i+1;
}




header("Location: http://localhost/Bilisim/contents/admin-content/veri_ekle.php");
exit();

?>