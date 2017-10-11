<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<?php
include "baglan.php";
if($_POST && $_GET["musteri"]=="kaydet")
{
if(@$_POST[ad]=="" || @$_POST[soyad]=="" || @$_POST[email]=="" || @$_POST[telefon]=="" || @$_POST[iskonto]=="")
{
echo "<script>alert('Lütfen * ile işaretli alanları doldurunuz.')</script>";
}
else
{
$tarih=date("d.m.y");
mysql_select_db($dbdata,$con);
mysql_query("insert into musteriler values(musteri_id,'$_POST[ad]','$_POST[soyad]','$_POST[email]','$_POST[telefon]','$_POST[gsm]','$_POST[adres]','$_POST[iskonto]','$_POST[ekbilgi]','$tarih')");
echo "<script>alert('Kayıt Başarı ile Tamamlanmıştır.')</script>";
mysql_close($con);
}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hızlı Kayıt</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><form id="form1" name="form1" method="post" action="yeni_musteri_ekle.php?musteri=kaydet">
      <span class="bilgi">Yeni Müşteri Ekleme Bölümü</span> <br>
      <br>
      <table width="690" border="0" align="left" cellpadding="5" cellspacing="5">
        <tr>
          <td width="121"> Adı</td>
          <td width="15" align="center" valign="middle">:</td>
          <td colspan="2"><input name="ad" type="text" class="sablon_kutular" id="ad" />
            *</td>
        </tr>
        <tr>
          <td>Soyadı</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="soyad" type="text" class="sablon_kutular" id="soyad" />
            *</td>
        </tr>
        <tr>
          <td>E-Mail</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="email" type="text" class="sablon_kutular" id="email" />
            *</td>
        </tr>
        <tr>
          <td>Telefon</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="telefon" type="text" class="sablon_kutular" id="telefon" />
          *</td>
        </tr>
        <tr>
          <td>Gsm</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="gsm" type="text" class="sablon_kutular" id="gsm" /></td>
        </tr>
        <tr>
          <td>İskonto</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="iskonto" type="text" class="sablon_kutular" id="iskonto" value="" />
            *</td>
        </tr>
        <tr>
          <td>Adresi</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><textarea name="adres" class="sablon_kutular1" id="adres"></textarea></td>
        </tr>
        <tr>
          <td>Ek Bilgiler</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><textarea name="ekbilgi" cols="40" rows="6" class="sablon_kutular1" id="ekbilgi"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center">&nbsp;</td>
          <td colspan="2" align="left">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input name="button" type="submit" class="sablon2" id="button" value="Müşteri Kaydet" /></td>
          <td width="202" align="right"><input name="button2" type="reset" class="sablon2" id="button2" value="Formu Temizle" /></td>
          <td width="287" align="left">&nbsp;</td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
</body>
</html>
