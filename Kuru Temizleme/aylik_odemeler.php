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
<title>Aylık Ödemeler</title>
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
    <td width="690" height="670" valign="top"><span class="bilgi">Aylık Ödemeler Bölümü</span><br>
    <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
        <td align="center" valign="middle"><b><u>ÇALIŞAN ID</u></b></td>
        <td align="center" valign="middle"><b><u>ÇALIŞAN ADI SOYADI</u></b></td>
        <td align="center" valign="middle"><b><u>ÖDEME İŞLEMİ</u></b></td>
      </tr>
      <?php
include "baglan.php";
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from firma_calisanlari");
while($row=mysql_fetch_array($result))
{
$calisan_id=$row['calisan_id'];
$ad=$row['ad'];
$soyad=$row['soyad'];

?>
      <tr>
        <td align="center" valign="middle" class="sablon"><?php echo $calisan_id; ?></td>
        <td align="center" valign="middle" class="sablon"><?php echo $ad." ".$soyad; ?></td>
        <td align="center" valign="middle" class="sablon" onClick="MM_openBrWindow('odeme_sayfasi.php?odeme=yap&amp;id=<?php echo $calisan_id; ?>','','width=510,height=325')"><a href="#">Ödeme Sayfası</a></td>
      </tr>
      <?php  } ?>
    </table></td>
  </tr>
</table>
</body>
</html>
