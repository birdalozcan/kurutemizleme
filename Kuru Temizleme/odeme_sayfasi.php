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
<title>Ödeme Sayfası</title>
</head>

<body>
<table width="500" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><table width="500" border="0" cellpadding="5" cellspacing="5" class="sablon">
    <?php
$maas_yedek=0;
include "baglan.php";
$id=@$_GET['id'];
mysql_select_db($dbdata,$con);
$result=mysql_query("select calisan_id,ad,soyad,maas from firma_calisanlari where calisan_id='$id'");
while($row=mysql_fetch_array($result))
{
$calisan_id=$row['calisan_id'];
$ad=$row['ad'];
$soyad=$row['soyad'];
$maas=$row['maas'];
$maas_yedek=$maas;

?>
      <tr>
        <td>Tarih</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo date("d / m / Y"); ?></td>
      </tr>
      <tr>
        <td width="165">Çalışan ID</td>
        <td width="8" align="center" valign="middle">:</td>
        <td width="277"><?php echo $calisan_id; ?></td>
      </tr>
      <tr>
        <td>Çalışan Adı</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $ad; ?></td>
      </tr>
      <tr>
        <td>Çalışan Soyadı</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $soyad; ?></td>
      </tr>
      <tr>
        <td>Çalışan Maaş</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $maas; ?> TL</td>
      </tr>
      <?php } ?>
          <?php
include "baglan.php";
$id=@$_GET['id'];
mysql_select_db($dbdata,$con);

$result=mysql_query("select sum(verilen_avans) as verilen_avans from aylik_odemeler where calisan_id='$id'");
while($row=mysql_fetch_array($result))
{
$verilen_avans=$row['verilen_avans'];

?>
      <tr>
        <td>Çalışanın Aldığı Avans</td>
        <td align="center" valign="middle">:</td>
        <td><?php if($verilen_avans==0) echo 0; else {echo $verilen_avans; }?> TL</td>
      </tr>
      <tr>
        <td>Çalışana Ödenecek Tutar</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $maas_yedek-$verilen_avans; ?> TL</td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="2" align="center"><form id="form1" name="form1" method="post" action="odeme_sayfasi.php?para=ode&id=<?php echo $id; ?>">
          <input type="submit" name="button" id="button" value="Ödeme Yap" />
                        </form>        </td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
if(@$_GET["para"]=="ode" && @$_GET["id"]==$id)
{
$id=@$_GET['id'];
$tarih=date("y-m-d");
$netpara=$maas_yedek-$verilen_avans;
mysql_select_db($dbdata,$con);
if($verilen_avans!=0)
{
mysql_query("insert into aylik_odemeler values ($id,$maas_yedek,$verilen_avans,$netpara,'$tarih')");
}
else
{
mysql_query("insert into aylik_odemeler values ($id,$maas_yedek,0,$maas_yedek,'$tarih')");
}
mysql_query("update aylik_odemeler set verilen_avans=0 where calisan_id='$id'");
echo "<script>alert('Çalışana Ödeme Yapılmıştır.')</script>";
}
?>
</body>
</html>
