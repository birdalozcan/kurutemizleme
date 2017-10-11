<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<?php
include "baglan.php";
$x="";
$y="";
$z="";
 
if(@$_GET["calisan"]=="bul")
{
$tar=@$_POST['calisan'];
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from firma_calisanlari where calisan_id='$tar'");
while($row=mysql_fetch_array($result))
{
$id=$row['calisan_id'];
$ad=$row['ad'];
$soyad=$row['soyad'];

$x=$id;
$y=$ad;
$z=$soyad;
}
}
?>

<?php
if(@$_GET["avans"]=="ver")
{
$id=@$_GET['id'];
$tarih=date("y-m-d");
$gelen_avans=@$_POST["avans"];
mysql_select_db($dbdata,$con);
mysql_query("insert into aylik_odemeler(calisan_id,verilen_avans,odenen_tarih) values($id,$gelen_avans,'$tarih')");
mysql_query("insert into kasa (tarih,avans) values ('$tarih',$gelen_avans)");
echo "<script>alert('Verilen Avans Kayıt Altına Alındı.')</script>";
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Avans Ödemeleri</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi">Avans Ödemeleri Bölümü</span><br>
      <br>
    <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
        <td width="126">Firma Çalışanı Seç</td>
        <td width="8" align="center" valign="middle">:</td>
        <td width="506"><form name="form1" method="post" action="avans_odemeleri.php?calisan=bul">
          <select name="calisan" class="sablon_kutular" id="calisan">
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
            <option value="<?php echo $calisan_id; ?>"><?php echo $ad." ".$soyad; ?></option>
            <?php } ?>
          </select>
                &nbsp;
                <input name="button" type="submit" class="sablon2" id="button" value="Çalışanı Bul">
        </form>        </td>
      </tr>
    </table>
    <br>
    <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
        <td width="114">Çalışan ID</td>
        <td width="8" align="center" valign="middle">:</td>
        <td width="518"><?php echo $x; ?></td>
        </tr>
      <tr>
        <td>Çalışanın Adı</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $y; ?></td>
        </tr>
      <tr>
        <td>Çalışanın Soyadı</td>
        <td align="center" valign="middle">:</td>
        <td><?php echo $z; ?></td>
      </tr>
      <tr>
        <td>Verilen Avans</td>
        <td align="center" valign="middle">:</td>
        <td><form name="form2" method="post" action="avans_odemeleri.php?avans=ver&id=<?php echo $x; ?>">
          <input name="avans" type="text" class="sablon_kutular" id="avans" value="0">
                &nbsp;
                <input name="button2" type="submit" class="sablon2" id="button2" value="Avans Ver">
        </form>        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
