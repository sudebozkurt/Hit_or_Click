<?php
    require_once("baglan.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table width="1000" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr height="30">
            <td align="left"><b>Görüntüleme ve Hit Uygulaması</b></td>
            <td align="right"><a href="index.php" style="text-decoration:none; color:black;">Ana Sayfa</a></td>
        </tr>
        <tr height="30">
            <td colspan="2"></td>
        </tr>
        <tr height="30" bgcolor="#33C3BD">
            <td align="left" style="color:white;" >&nbsp;Makale Başlığı</td>
            <td align="right" style="color:white;">Gösterim Sayısı&nbsp;</td>
        </tr>

        <?php
        $sorgu = $databaseBaglantisi->prepare("SELECT * FROM makaleler");
        $sorgu->execute();
        $kayitlar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
        $kayitSayisi = $sorgu->rowCount();
        

        if ($kayitSayisi > 0) {
            foreach($kayitlar as $satirlar){
            ?>
            <tr height="30">
            <td align="left"><a href="oku.php?id=<?php echo $satirlar["id"]; ?>" style="color:black; text-decoration:none;">&nbsp;<?php echo $satirlar["makaleBasligi"]; ?></a></td>
            <td align="right"><?php echo $satirlar["gosterimSayisi"]; ?>&nbsp;</td>
        </tr>
            <?php  
            }
        }
        ?>
    </table>
</body>
</html>

<?php
$databaseBaglantisi = null;
?>