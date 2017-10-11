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
<title>Banka Bölümü</title>
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
    <td width="690" height="670" valign="top"><span class="bilgi">Banka Bölümü</span><br>
      <br>
    <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
        <td width="33">Tarih</td>
        <td width="8" align="center" valign="middle">:</td>
        <td width="595"><form name="form1" method="post" action="banka.php?tutar=sorgula">
          <input name="tarih" type="text" class="sablon_kutular" id="inputField">
          &nbsp;
          <input name="button" type="submit" class="sablon2" id="button" value="Tarih'e Göre Ara">
                        </form>        </td>
      </tr>
    </table>
      <br>
      <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
      <tr>
        <td width="156"><b><u>TARİH</u></b></td>
        <td width="499"><b><u>TUTAR</u></b></td>
      </tr>
      <?php
include "baglan.php";
if(@$_GET["tutar"]=="sorgula")
{
$tar=@$_POST['tarih'];
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from banka where tarih='$tar'");
while($row=mysql_fetch_array($result))
{
$tarih=$row['tarih'];
$tutar=$row['tutar'];
echo "<tr>
		<td class=sablon>$tarih</td>
		<td class=sablon>$tutar TL</td>
		</tr>";
}
}
else
{
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from banka order by tarih DESC");
while($row=mysql_fetch_array($result))
{
$tarih=$row['tarih'];
$tutar=$row['tutar'];
?>
      <tr>
        <td class="sablon"><?php echo $tarih; ?></td>
        <td class="sablon"><?php echo $tutar; ?> TL</td>
      </tr>
      <?php } }?> 
    </table></td>
  </tr>
</table>
</body>
</html>
