<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<?php
include "baglan.php";
if(@$_GET["is"]=="detayi")
{
$ids=$_GET['id'];
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from hizli_kayit where musteri_id=$ids");
while($row=mysql_fetch_array($result))
{
$ID=$row['musteri_id'];
$ad=$row['ad'];
$soyad=$row['soyad'];
$istutari=$row['is_tutari'];
$iskonto=$row['musteri_iskonto'];
$fiyat=$row['net'];
$yapilanisler=$row['secilen_esyalar'];
$iletisimno=$row['iletisim_telefonu'];

$isdurumu=$row['is_durumu'];
$ucretdurumu=$row['ucret_durumu'];
$teslimatdurumu=$row['teslimat_durumu'];

$isinalindigitarih=$row['is_kayit_tarihi'];
$isteslimtarihi=$row['is_teslim_tarihi'];
}}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>İş Detayı</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><table width="500" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
        <td width="125">Müşteri ID</td>
        <td width="8" align="center" valign="middle">:</td>
        <td width="304"><?php echo $ID; ?></td>
      </tr>
      <tr>
        <td>Müşteri Adı</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $ad; ?></td>
      </tr>
      <tr>
        <td>Müşteri Soyadı</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $soyad; ?></td>
      </tr>
      <tr>
        <td>Müşteri Eşyaları</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $yapilanisler; ?></td>
      </tr>
      <tr>
        <td>İletişim Telefonu</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $iletisimno; ?></td>
      </tr>
      <tr>
        <td>İş Tutarı</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $istutari; ?> TL</td>
      </tr>
      <tr>
        <td>İskonto</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $iskonto; ?> %</td>
      </tr>
      <tr>
        <td>Net</td>
        <td align="center" valign="middle">:</td>
        <td><b><?php echo $fiyat; ?> TL</b></td>
      </tr>
      <tr>
        <td>İş Durumu</td>
        <td align="center" valign="middle">:</td>
        <td><?php if($isdurumu==0) { echo "Eşyalar Temizlenmedi.";} else { echo "Eşyalar Temizlendi.";} ?></td>
      </tr>
      <tr>
        <td>Ücret Durumu</td>
        <td align="center" valign="middle">:</td>
        <td><?php if($ucretdurumu==0) { echo "Ücret Ödenmemiş.";} else { echo "Ücret Ödenmiş.";} ?></td>
      </tr>
      <tr>
        <td>Teslimat Durumu</td>
        <td align="center" valign="middle">:</td>
        <td><?php if($teslimatdurumu==0) { echo "Teslim Edilmedi.";} else { echo "Teslim Edildi.";} ?></td>
      </tr>
      <tr>
        <td>İş Kayıt Tarihi</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $isinalindigitarih; ?></td>
      </tr>
      <tr>
        <td>İş Teslim Tarihi</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $isteslimtarihi; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
