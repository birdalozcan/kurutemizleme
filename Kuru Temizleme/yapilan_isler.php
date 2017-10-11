<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yapılan İşler Bölümü</title>
<style type="text/css">
<!--
.style2 {font-size: 14px}
-->
</style>
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>


<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi">Yapılan İşler Bölümü</span><br>
    <table width="690" border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td height="40" align="center" valign="middle" class="yonetim_bolumu"><b><u>Müşteri Adı Soyadı</u></b></td>
        <td height="40" align="center" valign="middle" class="yonetim_bolumu"><b><u>İşin Alındığı Tarih</u></b></td>
        <td height="40" align="center" valign="middle" class="yonetim_bolumu"><b><u>İş Teslim Tarihi</u></b></td>
        <td width="66" height="40" align="center" valign="middle" class="yonetim_bolumu"><b><u>Durum</u></b></td>
        </tr>
            <?php
include "baglan.php";
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from hizli_kayit");
while($row=mysql_fetch_array($result))
{
$ID=$row['musteri_id'];
$ad=$row['ad'];
$soyad=$row['soyad'];
$fiyat=$row['net'];
$yapilanisler=$row['secilen_esyalar'];
$iletisimno=$row['iletisim_telefonu'];
$teslimatdurumu=$row['teslimat_durumu'];
$isinalindigitarih=$row['is_kayit_tarihi'];
$isteslimtarihi=$row['is_teslim_tarihi'];
?>
      <tr>

        <td height="24" align="left" valign="middle" class="yonetici_yazilar"><img src="grafik/devam.gif" width="9" height="9">&nbsp;&nbsp;&nbsp;<a href="#" onClick="MM_openBrWindow('yapilan_isler_detay.php?is=detayi&amp;id=<?php echo $ID; ?>','','width=510,height=470')"><?php echo $ad." ".$soyad; ?></a></td>
        <td width="138" align="center" valign="middle" class="yonetici_yazilar"><?php echo $isinalindigitarih;?></td>
        <td width="172" align="center" valign="middle" class="yonetici_yazilar">
          <?php  echo $isteslimtarihi;?>
        </td>
        <td height="24" align="center"><?php if($teslimatdurumu==1)echo "<img src=grafik/ok3.png width=24 height=24 border=0>";else {echo "<img src=grafik/sil.png width=24 height=24 border=0>";}?></td>
        </tr><?php } ?>
    </table></td>
  </tr>
</table>
</body>
</html>
