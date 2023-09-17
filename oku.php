<?php
require_once("baglan.php");
$gelenID = filtre($_GET["id"]);

$hitGuncelle = $databaseBaglantisi->prepare("UPDATE makaleler SET gosterimSayisi = gosterimSayisi + 1 WHERE id = ?");
$hitGuncelle->execute([$gelenID]);


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
    </table>

    <?php
        $sorgu = $databaseBaglantisi->prepare("SELECT * FROM makaleler WHERE id = ?");
        $sorgu->execute([$gelenID]);
        $kayitlar = $sorgu->fetch(PDO::FETCH_ASSOC);
        $kayitSayisi = $sorgu->rowCount();
        

        if ($kayitSayisi > 0) {
            ?>
            <tr height="30">
            <td colspan="2" align="left"><h3><?php echo $kayitlar["makaleBasligi"]; ?></h3></td>
            </tr>
            <tr height="30">
            <td colspan="2" align="left"><?php echo $kayitlar["makaleIcerigi"]."<br/>"; ?></td>
            </tr>
            <tr height="30">
            <td colspan="2" align="center">Bu makale <?php echo $kayitlar["gosterimSayisi"]; ?> kez görüntülendi.</td>
        </tr>

            <?php
        }
        else{
            header("Location:index.php");
        }

            ?>
</body>
</html>

<?php
$databaseBaglantisi = null;
?>