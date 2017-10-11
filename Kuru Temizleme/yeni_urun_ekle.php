<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<?php
include "baglan.php";
if($_POST && $_GET["urun"]=="ekle")
{
if(@$_POST[urunadi]=="" || @$_POST[birimfiyati]=="")
{
echo "<script>alert('Lütfen * ile işaretli alanları doldurunuz.')</script>";
}
else
{
mysql_select_db($dbdata,$con);
mysql_query("insert into yeni_eklenen_urunler values(urun_id,'$_POST[urunadi]','$_POST[birimfiyati]')");
echo "<script>alert('Kayıt Başarı ile Tamamlanmıştır.')</script>";
mysql_close($con);
}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yeni Ürün Ekleme</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><form name="form1" method="post" action="yeni_urun_ekle.php?urun=ekle">
      <span class="bilgi">Yeni Ürün Ekleme Bölümü</span><br>
      <br>
      <table width="690" border="0" align="left" cellpadding="5" cellspacing="5" class="sablon">
        <tr>
          <td width="129">Ürün Adı</td>
          <td width="14" align="center" valign="middle">:</td>
          <td colspan="2"><input name="urunadi" type="text" class="sablon_kutular" id="urunadi">
            *</td>
        </tr>
        <tr>
          <td>Birim Fiyatı</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="birimfiyati" type="text" class="sablon_kutular" id="birimfiyati">
            *</td>
        </tr>
        <tr>
          <td colspan="2"><input name="button" type="submit" class="sablon2" id="button" value="Yeni Ürünü Kaydet"></td>
          <td width="199" align="right" valign="middle"><input name="button2" type="reset" class="sablon2" id="button2" value="Formu Temizle"></td>
          <td width="279">&nbsp;</td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
</body>
</html>
