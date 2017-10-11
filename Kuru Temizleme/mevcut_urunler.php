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
if(@$_GET["urun"]=="sil")
{
mysql_select_db($dbdata,$con);
mysql_query("delete from yeni_eklenen_urunler where urun_id=$id");
mysql_close($con);
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mevcut Ürünler</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi">Mevcut Ürünler Bölümü</span><br>
      <br>
    <form name="form1" method="post" action="mevcut_urunler.php?urun=bul">
      <table width="690" border="0" cellpadding="5" cellspacing="5" class="yonetim_bolumu">
        <tr>
          <td width="88">Ürün Adı</td>
          <td width="8">:</td>
          <td width="204"><input name="urun_bul" type="text" class="sablon_kutular" id="urun_bul"></td>
          <td width="321"><input name="button" type="submit" class="sablon2" id="button" value="Ürün Bul"></td>
        </tr>
      </table>
        </form>
        
    <table width="690" border="0" align="left" cellpadding="5" cellspacing="5" bgcolor="#B7DBF2">
    <?php
include "baglan.php";
if($_POST && $_GET['urun']=="bul")
{
$urun=@$_POST['urun_bul'];
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from yeni_eklenen_urunler where urun_adi='$urun'");
while($row=mysql_fetch_array($result))
{
$ID=$row['urun_id'];
$urun_adi=$row['urun_adi'];
$birim_fiyati=$row['urun_birim_fiyati'];
echo "<table width=690 border=0'align=left cellpadding=0 cellspacing=0 bgcolor=#B7DBF2 class=sablon_yazilar>
<tr>
        <td width=9 height=27 align=center valign=middle>&nbsp;&nbsp;&nbsp;<img src=grafik/devam.gif width=9 height=9 /></td>
        <td width=568 height=27> &nbsp;$urun_adi&nbsp;$birim_fiyati TL</td>
        <td width=24 height=27 align=center valign=middle><a href=mevcut_urunler.php?urun=sil&id=$ID><img src=grafik/sil.png width=24 height=24 border=0 /></a></td>
        <td width=24 height=27 align=center valign=middle border=0><a href=mevcut_urunler_detay.php?urun=guncelle&id=$ID><img src=grafik/update.png width=24 height=24 border=0 /></a></td>
      </tr>
</table>";
 }
}
else{

mysql_select_db($dbdata,$con);
$result=mysql_query("select * from yeni_eklenen_urunler order by urun_adi ASC");
while($row=mysql_fetch_array($result))
{
$ID=$row['urun_id'];
$urun_adi=$row['urun_adi'];
$birim_fiyati=$row['urun_birim_fiyati'];

?>

      <tr>
        <td width="9" height="24" align="center" valign="middle"><img src="grafik/devam.gif" width="9" height="9" /></td>
        <td width="568" height="24"><?php echo $urun_adi; ?>&nbsp;&nbsp;<?php echo $birim_fiyati; ?>  &nbsp;TL</td>
        <td width="24" height="24" align="center" valign="middle"><a href="mevcut_urunler.php?urun=sil&id=<?php echo $ID; ?>"><img src="grafik/sil.png" width="24" height="24" border="0" /></a></td>
        <td width="24" height="24" align="center" valign="middle"><a href="mevcut_urunler_detay.php?urun=guncelle&id=<?php echo $ID; ?>"><img src="grafik/update.png" width="24" height="24" border="0" /></a></td>
      </tr>
      
      <?php }}?>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($con)?>