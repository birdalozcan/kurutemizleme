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
<title>Temel Giderleri Görüntüle</title>
<link rel="stylesheet" type="text/css" media="all" href="jquery/jsDatePick.css" />
<script type="text/javascript" src="jquery/jsDatePick.min.1.1.js"></script>
    <script type="text/javascript">
        window.onload = function(){
            new JsDatePick({
                useMode:2,
                target:"inputField"
            });
        };
    </script>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi">Temel Giderleri Görüntüleme Bölümü</span><br>
      <br>
    <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
        <td width="36">Tarih</td>
        <td width="8" align="center">:</td>
        <td><form name="form1" method="post" action="temel_giderler_goruntule.php?gider=goruntule">
          <input name="tarih" type="text" class="sablon_kutular" id="inputField">
                &nbsp;
                <input name="button" type="submit" class="sablon2" id="button" value="Tarih'e Göre Ara">
                &nbsp;
        </form>        </td>
        </tr>
    </table>
      <br>
      <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
        <td width="165"><b><u>TARİH</u></b></td>
        <td width="131"><b><u>MASRAF</u></b></td>
        <td width="340"><b><u>AÇIKLAMA</u></b></td>
        </tr>
        <?php
include "baglan.php";
if($_POST && $_GET["gider"]=="goruntule")
{
$x=0;
$tar=@$_POST['tarih'];
mysql_select_db($dbdata,$con);
$result=mysql_query("select tarih,masraf,aciklama from kasa where tarih='$tar' and masraf<>0");
while($row=mysql_fetch_array($result))
{
$tarih=$row['tarih'];
$masraf=$row['masraf'];
$aciklama=$row['aciklama'];
$x=$x+$masraf;
echo "<tr>
        <td> $tarih</td>
        <td>$masraf TL </td>
        <td>$aciklama </td>
        </tr>";

}
echo "<td><b><u>Toplam Masraf</u> :</b> $x TL</td>";
}
else
{
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from kasa where masraf<>0 order by tarih DESC");
while($row=mysql_fetch_array($result))
{
$tarih=$row['tarih'];
$masraf=$row['masraf'];
$aciklama=$row['aciklama'];
?>
      <tr>
        <td><?php echo $tarih; ?></td>
        <td><?php echo $masraf; ?> TL</td>
        <td><?php echo $aciklama; ?></td>
        <?php } }?>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($con); ?>