<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<?php
setlocale(LC_ALL, 'tr_TR.UTF-8');
include "baglan.php";
$id=@$_GET[id];

if(@$_GET["odeme"]=="yap")
{
mysql_select_db($dbdata,$con);
mysql_query("update hizli_kayit set teslimat_durumu=1,ucret_durumu=1 where musteri_id=$id");
}

$tarih=date("y-m-d");
if(@$_GET["kasa"]=="ok")
{
$fiyat=0;
$sql="select net from hizli_kayit where musteri_id=$id";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$fiyat=$row['net'];
}

mysql_query("insert into kasa (id,tarih,nakit) values ($id,'$tarih',$fiyat)");
echo "<script>alert('Ürün Teslim Edilmiştir. $fiyat TL Kasaya Eklenmiştir.')</script>";
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ürün Teslimatı</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi">Ürün Teslimatı Bölümü</span><br>
    <table width="690" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td width="85" height="40" align="center" valign="middle" class="yonetim_bolumu"><b><u>Müşteri ID</u></b></td>
        <td height="40" class="yonetim_bolumu"><b><u>Müşteri Adı Soyadı</u></b></td>
        <td height="40" class="yonetim_bolumu"><b><u>Müşteri İletişim Numarası</u></b></td>
        <td height="40" class="yonetim_bolumu"><b><u>İş Tutarı</u></b></td>
        <td width="61" height="40" align="center" valign="middle" class="yonetim_bolumu"><b><u>Durum</u></b></td>
        </tr>
            <?php
include "baglan.php";
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from hizli_kayit where is_durumu=1 AND teslimat_durumu=0");
while($row=mysql_fetch_array($result))
{
$ID=$row['musteri_id'];
$ad=$row['ad'];
$soyad=$row['soyad'];
$fiyat=$row['net'];
$iletisimno=$row['iletisim_telefonu'];


?>
      <tr>

        <td height="24" align="left" valign="middle"><img src="grafik/devam.gif" width="9" height="9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ID; ?></td>
        <td width="175" height="24"><?php echo $ad." ".$soyad;?></td>
        <td width="202"><?php echo $iletisimno;?></td>
        <td width="87" align="center" valign="middle"><?php  echo $fiyat;?> TL</td>
        <td height="24" align="center"><a href="urun_teslimati.php?odeme=yap&kasa=ok&id=<?php echo $ID; ?>"><img src="grafik/ok3.png" width="24" height="24" border="0"></a></td>
        </tr><?php } ?>
    </table></td>
  </tr>
</table>
</body>
</html>
