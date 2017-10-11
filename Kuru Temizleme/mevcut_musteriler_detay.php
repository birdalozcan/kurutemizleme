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

$sql="select * from musteriler where musteri_id=$id";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$ID=$row['musteri_id'];
$ad=$row['musteri_ad'];
$soyad=$row['musteri_soyad'];
$email=$row['musteri_email'];
$telefon=$row['musteri_telefon'];
$gsm=$row['musteri_gsm'];
$iskonto=$row['musteri_iskonto'];
$ekbilgi=$row['musteri_ekbilgi'];
$adres=$row['musteri_adres'];
}
?>

<?php
if($_POST && $_GET["musteri"]=="guncelle")
{
if(@$_POST[ad]=="" ||@$_POST[soyad]=="" || @$_POST[email]=="" || @$_POST[telefon]=="" || @$_POST[iskonto]=="")
{
echo "<script>alert('Lütfen * işaretli alanları doldurunuz.')</script>";
}
else
{
$ids=@$_GET[id];
mysql_select_db($dbdata,$con);
mysql_query("update musteriler set musteri_ad='$_POST[ad]',musteri_soyad='$_POST[soyad]',musteri_email='$_POST[email]',musteri_telefon='$_POST[telefon]',musteri_gsm='$_POST[gsm]',musteri_adres='$_POST[adres]',musteri_iskonto='$_POST[iskonto]',musteri_ekbilgi='$_POST[ekbilgi]' where musteri_id=$ids");

echo "<script>alert('Güncelleme Başarı ile Tamamlanmıştır.')</script>";
}}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mevcut Müşteriler</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><form id="form1" name="form1" method="post" action="mevcut_musteriler_detay.php?musteri=guncelle&id=<?php echo $ID; ?>">
      <table width="690" border="0" align="left" cellpadding="5" cellspacing="5">
        <tr>
          <td width="83"> Adı</td>
          <td width="4" align="center" valign="middle">:</td>
          <td width="553"><input name="ad" type="text" class="sablon_kutular" id="ad" value="<?php echo "$ad"; ?>" />
            *</td>
        </tr>
        <tr>
          <td>Soyadı</td>
          <td align="center" valign="middle">:</td>
          <td><input name="soyad" type="text" class="sablon_kutular" id="soyad" value="<?php echo "$soyad"; ?>" />
            *</td>
        </tr>
        <tr>
          <td>E-Mail</td>
          <td align="center" valign="middle">:</td>
          <td><input name="email" type="text" class="sablon_kutular" id="email" value="<?php echo "$email"; ?>" />
            *</td>
        </tr>
        <tr>
          <td>Telefon</td>
          <td align="center" valign="middle">:</td>
          <td><input name="telefon" type="text" class="sablon_kutular" id="telefon" value="<?php echo "$telefon"; ?>" />
          *</td>
        </tr>
        <tr>
          <td>Gsm</td>
          <td align="center" valign="middle">:</td>
          <td><input name="gsm" type="text" class="sablon_kutular" id="gsm" value="<?php echo "$gsm"; ?>" /></td>
        </tr>
        <tr>
          <td>İskonto</td>
          <td align="center" valign="middle">:</td>
          <td><input name="iskonto" type="text" class="sablon_kutular" id="iskonto" value="<?php echo "$iskonto"; ?>" />
          *</td>
        </tr>
        <tr>
          <td>Adresi</td>
          <td align="center" valign="middle">:</td>
          <td><textarea name="adres" class="sablon_kutular1" id="adres"><?php echo "$adres"; ?></textarea></td>
        </tr>
        <tr>
          <td>Ek Bilgiler</td>
          <td align="center" valign="middle">:</td>
          <td><textarea name="ekbilgi" cols="40" rows="6" class="sablon_kutular1" id="ekbilgi"><?php echo "$ekbilgi"; ?></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input name="button" type="submit" class="sablon2" id="button" value="Müşteriyi Güncelle" /></td>
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