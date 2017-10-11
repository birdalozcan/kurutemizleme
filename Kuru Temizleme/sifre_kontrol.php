<?php ob_start(); ?>
<?php
session_start();
$kullanici_adi="admin";
$sifre="admin";
$gelen_kullaniciadi=$_POST['kullaniciadi'];
$gelen_sifre=$_POST['sifre'];
if ($gelen_kullaniciadi==$kullanici_adi && $gelen_sifre==$sifre)
{
$_SESSION["oturum"]="true";
$_SESSION["kullaniciadi"]=$gelen_kullaniciadi;
$_SESSION["sifre"]=$sifre;
header("refresh:0; url=panel.php");
}
else
{
header("refresh:0; url=yonetim.php");
}
?>