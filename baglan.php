<?php
try{
    $databaseBaglantisi = new PDO("mysql:host=localhost;dbname=project4;charset=UTF8", "root", "");
}
catch(PDOException $hata){
    echo $hata -> getMessage();
    die();
}

function filtre($deger){
    $bir = trim($deger);
    $iki = strip_tags($bir);
    $uc = htmlspecialchars($iki, ENT_QUOTES);
    $sonuc = $uc;
    return $sonuc;
}

?>