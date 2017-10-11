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
<title>Kasa Bölümü</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi">Kasa Raporu Bölümü</span><br>
    <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
        <td width="113" align="center"><b><u>TARİH</u></b></td>
        <td width="74" align="center"><b><u>GÜNLÜK KAZANÇ</u></b></td>
        <td width="100" align="center"><b><u>TEMEL GİDERLER</u></b></td>
        <td align="center"><b><u>AVANS ÖDEMELERİ</u></b></td>
        <td align="center"><b><u>NET</u></b></td>
        <td align="center"><b><u>BANKA</u></b></td>
      </tr>
        <?php
include "baglan.php";
$para=0;
mysql_select_db($dbdata,$con);
$result=mysql_query("select tarih,durum,sum(nakit) as nakit, sum(masraf) as masraf, sum(avans) as avans from kasa group by tarih");
while($row=mysql_fetch_array($result))
{
$tarih=$row['tarih'];
$nakit=$row['nakit'];
$masraf=$row['masraf'];
$durum=$row['durum'];
$avans=$row['avans'];
?>
<?php $net=$nakit-$avans-$masraf; ?>
      <tr>
        <td align="center" class="sablon"><?php echo $tarih; ?></td>
        <td align="center" class="sablon"><?php if($nakit=='') echo 0; else { echo $nakit;} ?> TL</td>
        <td align="center" class="sablon"><?php echo $masraf; ?> TL</td>
        <td width="112" align="center" class="sablon"><?php echo $avans; ?> TL</td>
        <td width="83" align="center" class="sablon"><?PHP echo $net; ?> TL </td>
        <td width="109" align="center" class="sablon"><form name="form1" method="post" action="kasa.php?para=yatir&tarih=<?php echo $tarih; ?>">
        <?php 
		if($durum==0)
		{ 
          echo "<input type=submit name=button id=button value=Gün&nbsp;Sonu>";
		 }
		 else
		 {
		 	echo "Para Bankada.";
		 }?>
                </form>        </td>
      </tr>
<?php
if($_POST && $_GET["para"]=="yatir" && $_GET["tarih"]==$tarih)
{
mysql_select_db($dbdata,$con);
mysql_query("insert into banka values ('$tarih',$net)");
mysql_query("update kasa set durum=1 where tarih='$_GET[tarih]'");
echo "para hesapta.";
header("Refresh: 00; url=http://localhost/vtys/kasa.php");

}
?>
      <?php  }?>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($con); ?> 