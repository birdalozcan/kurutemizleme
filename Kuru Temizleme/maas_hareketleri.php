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
<link rel="stylesheet" type="text/css" href="stil.css" />
<title>Maaş Hareketleri</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi">Maaş Hareketleri Bölümü</span><br>
    <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
      
        <td align="center" valign="middle"><b><u>ÇALIŞAN ID</u></b></td>
        <td align="center" valign="middle"><b><u>VERİLEN MAAŞ</u></b></td>
        <td align="center" valign="middle"><b><u>ÖDENEN TUTAR</u></b></td>
        <td align="center" valign="middle"><b><u>TARİH</u></b></td>
      </tr>
      <?php
include "baglan.php";
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from aylik_odemeler where odenen_tutar!=' '");
while($row=mysql_fetch_array($result))
{
$calisan_id=$row['calisan_id'];
$maas=$row['verilen_maas'];
$odenen_tutar=$row['odenen_tutar'];
$tarih=$row['odenen_tarih'];

?>
      <tr>
        <td align="center" valign="middle"><?php  echo $calisan_id;?></td>
        <td align="center" valign="middle"><?php  echo $maas;?> TL</td>
        <td align="center" valign="middle"><?php  echo $odenen_tutar;?> TL</td>
        <td align="center" valign="middle"><?php  echo $tarih;?></td>
      </tr>
      <?php  } ?>
    </table></td>
  </tr>
</table>
</body>
</html>
