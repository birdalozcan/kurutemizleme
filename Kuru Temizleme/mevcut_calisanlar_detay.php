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
$sql="select * from firma_calisanlari where calisan_id=$id";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$ID=$row['calisan_id'];
$tckimlik_no=$row['tckimlik_no'];
$ad=$row['ad'];
$soyad=$row['soyad'];
$dtarihi=$row['d_tarihi'];
$email=$row['e_mail'];
$telefon=$row['telefon'];
$gsm=$row['gsm'];
$adres=$row['adres'];
$sgk_no=$row['sgk_no'];
$maas=$row['maas'];
}
?>
<?php
if($_POST && $_GET["calisan"]=="guncelle")
{
if(@$_POST[tckimlik]=="" || @$_POST[ad]=="" || @$_POST[soyad]=="" || @$_POST[dtarihi]=="" || @$_POST[gsm]=="" || @$_POST[sgk_no]=="" || @$_POST[maas]=="" || @$_POST[adres]=="")
{
echo "<script>alert('Lütfen * işaretli alanları doldurunuz.')</script>";
}
else
{
$ids=@$_GET[id];
mysql_select_db($dbdata,$con);
mysql_query("update firma_calisanlari set tckimlik_no='$_POST[tckimlik]',ad='$_POST[ad]',soyad='$_POST[soyad]',d_tarihi='$_POST[dtarihi]',telefon='$_POST[telefon]',gsm='$_POST[gsm]',e_mail='$_POST[email]',adres='$_POST[adres]',sgk_no='$_POST[sgk_no]',maas=$_POST[maas] where calisan_id=$ids");

echo "<script>alert('Güncelleme Başarı ile Tamamlanmıştır.')</script>";
}}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mevcut Çalışanlar</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><form id="form1" name="form1" method="post" action="mevcut_calisanlar_detay.php?calisan=guncelle&id=<?php echo $ID ?>">
      <table width="690" border="0" align="left" cellpadding="5" cellspacing="5">
        <tr>
          <td>Tc Kimlik No</td>
          <td align="center" valign="middle">:</td>
          <td><input name="tckimlik" type="text" class="sablon_kutular" id="tckimlik" value="<?php echo $tckimlik_no; ?>" />
            *</td>
        </tr>
        <tr>
          <td width="83"> Adı</td>
          <td width="4" align="center" valign="middle">:</td>
          <td width="553"><input name="ad" type="text" class="sablon_kutular" id="ad" value="<?php echo $ad; ?>" />
            *</td>
        </tr>
        <tr>
          <td>Soyadı</td>
          <td align="center" valign="middle">:</td>
          <td><input name="soyad" type="text" class="sablon_kutular" id="soyad" value="<?php echo $soyad; ?>" />
            *</td>
        </tr>
        <tr>
          <td>D.Tarihi</td>
          <td align="center" valign="middle">:</td>
          <td><input name="dtarihi" type="text" class="sablon_kutular" id="dtarihi" value="<?php echo $dtarihi; ?>" />
            *</td>
        </tr>
        <tr>
          <td>Telefon</td>
          <td align="center" valign="middle">:</td>
          <td><input name="telefon" type="text" class="sablon_kutular" id="telefon" value="<?php echo $telefon; ?>" /></td>
        </tr>
        <tr>
          <td>Gsm</td>
          <td align="center" valign="middle">:</td>
          <td><input name="gsm" type="text" class="sablon_kutular" id="gsm" value="<?php echo $gsm; ?>" />
            *</td>
        </tr>
        <tr>
          <td>E-Mail</td>
          <td align="center" valign="middle">:</td>
          <td><input name="email" type="text" class="sablon_kutular" id="email" value="<?php echo $email; ?>" /></td>
        </tr>
        <tr>
          <td>Sgk No</td>
          <td align="center" valign="middle">:</td>
          <td><input name="sgk_no" type="text" class="sablon_kutular" id="sgk_no" value="<?php echo $sgk_no; ?>">
            *</td>
        </tr>
        <tr>
          <td>Maaş</td>
          <td align="center" valign="middle">:</td>
          <td><input name="maas" type="text" class="sablon_kutular" id="maas" value="<?php echo $maas; ?>">
            *</td>
        </tr>
        <tr>
          <td>Adresi</td>
          <td align="center" valign="middle">:</td>
          <td><textarea name="adres" class="sablon_kutular1" id="adres"><?php echo $adres; ?></textarea>
            *</td>
        </tr>
        <tr>
          <td colspan="2" align="center">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input name="button" type="submit" class="sablon2" id="button" value="Çalışanı Güncelle" /></td>
          <td align="left">&nbsp;</td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($con); ?>