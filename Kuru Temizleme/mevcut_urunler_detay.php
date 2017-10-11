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

$sql="select * from yeni_eklenen_urunler where urun_id=$id";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result))
{
$ID=$row['urun_id'];
$urun_adi=$row['urun_adi'];
$birim_fiyati=$row['urun_birim_fiyati'];
}
?>

<?php
if($_POST && $_GET["urun"]=="guncelle")
{
if(@$_POST[urunadi]=="" ||@$_POST[birimfiyati]=="")
{
echo "<script>alert('Lütfen * işaretli alanları doldurunuz.')</script>";
}
else
{
$ids=@$_GET[id];
mysql_select_db($dbdata,$con);
mysql_query("update yeni_eklenen_urunler set urun_adi='$_POST[urunadi]',urun_birim_fiyati='$_POST[birimfiyati]' where urun_id=$ids");

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
    <td width="690" height="670" valign="top"><form id="form1" name="form1" method="post" action="mevcut_urunler_detay.php?urun=guncelle&id=<?php echo $ID; ?>">
      <table width="690" border="0" align="left" cellpadding="5" cellspacing="5">
        <tr>
          <td width="83"> Ürün Adı</td>
          <td width="4" align="center" valign="middle">:</td>
          <td width="553"><input name="urunadi" type="text" class="sablon_kutular" id="urunadi" value="<?php echo "$urun_adi"; ?>" />
            *</td>
        </tr>
        <tr>
          <td>Birim Fiyatı</td>
          <td align="center" valign="middle">:</td>
          <td><input name="birimfiyati" type="text" class="sablon_kutular" id="birimfiyati" value="<?php echo "$birim_fiyati"; ?>" />
            *</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input name="button" type="submit" class="sablon2" id="button" value="Ürünü Güncelle" /></td>
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