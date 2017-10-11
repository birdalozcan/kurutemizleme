<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<?php 
include "baglan.php";
if($_POST && $_GET["gider"]=="kaydet")
{
if(@$_POST['temel_gider']=="" || $_POST['aciklama']=="")
{
echo "<script>alert('Lütfen * işaretli alanları doldurunuz.')</script>";
}
else
{
$tarih=date("y-m-d");
mysql_select_db($dbdata,$con);
mysql_query("insert into kasa (tarih,masraf,aciklama) values('$tarih',$_POST[temel_gider],'$_POST[aciklama]')");
echo "<script>alert('Temel Gider Kayıt Altına Alındı.')</script>";
}}
mysql_close($con);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Temel Giderler</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi">Temel Gider Ekleme Bölümü</span><br>
      <br>
    <form id="form1" name="form1" method="post" action="temel_giderler.php?gider=kaydet">
      <table width="690" border="0" cellpadding="5" cellspacing="5" class="sablon">
        <tr>
          <td width="128">Temel Gider</td>
          <td width="8">:</td>
          <td colspan="2"><input name="temel_gider" type="text" class="sablon_kutular" id="temel_gider" />
            *</td>
        </tr>
        <tr>
          <td>Açıklama</td>
          <td>:</td>
          <td colspan="2"><textarea name="aciklama" class="sablon_kutular1" id="aciklama"></textarea>
            *</td>
        </tr>
        <tr>
          <td colspan="2" align="left"><input name="button" type="submit" class="sablon2" id="button" value="Kaydet" /></td>
          <td width="199" align="right"><input name="button2" type="reset" class="sablon2" id="button2" value="Temizle" /></td>
          <td width="286" align="left">&nbsp;</td>
        </tr>
      </table>
      </form>    </td>
  </tr>
</table>
</body>
</html>
