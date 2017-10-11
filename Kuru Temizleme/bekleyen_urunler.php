<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}

?>
<?php
include "baglan.php";
$id=@$_GET[id];
if(@$_GET["kayit"]=="sil")
{
mysql_select_db($dbdata,$con);
mysql_query("delete from hizli_kayit where musteri_id=$id;");
mysql_close($con);
echo "<script>alert('Kayıt iptal edilmiştir.')</script>";
}
?>
<?php
include "baglan.php";
if(@$_GET["durum"]=="yikandi")
{
mysql_select_db($dbdata,$con);
mysql_query("update hizli_kayit set is_durumu=1 where musteri_id=$id");
mysql_close($con);
echo "<script>alert('Ürün Başarı ile Yıkanmıştır.')</script>";
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bekleyen Ürünler</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi"><u>Bekleyen Ürünler Bölümü</u></span><br>
    <table width="691" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td width="91" height="40" align="center" valign="middle" class="yonetim_bolumu"><b><u>Müşteri ID</u></b></td>
        <td height="40" class="yonetim_bolumu"><b><u>Müşteri Adı Soyadı</u></b></td>
        <td height="40" class="yonetim_bolumu"><b><u>Müşteri İletişim Numarası</u></b></td>
        <td height="40" colspan="2" align="center" valign="middle" class="yonetim_bolumu"><b><u>Durum</u></b></td>
        </tr>
            <?php
include "baglan.php";
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from hizli_kayit where is_durumu=0");
while($row=mysql_fetch_array($result))
{
$ID=$row['musteri_id'];
$ad=$row['ad'];
$soyad=$row['soyad'];
$iletisimno=$row['iletisim_telefonu'];


?>
      <tr>

        <td height="24" align="left" valign="middle"><img src="grafik/devam.gif" width="9" height="9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ID; ?></td>
        <td width="180" height="24"><?php echo $ad." ".$soyad;?></td>
        <td width="292"><?php echo $iletisimno;?></td>
        <td width="24" height="24"><a href="bekleyen_urunler.php?kayit=sil&id=<?php echo $ID;?>"><img src="grafik/sil.png" alt="Siparişi İptal Et" width="24" height="24" border="0"></a></td>
        <td width="24" height="24"><a href="bekleyen_urunler.php?durum=yikandi&id=<?php echo $ID; ?>"><img src="grafik/ok1.png" alt="Yıkama Tamamlandı" width="24" height="24" border="0"></a></td>
        </tr><?php } ?>
    </table></td>
  </tr>
</table>
</body>
</html>
