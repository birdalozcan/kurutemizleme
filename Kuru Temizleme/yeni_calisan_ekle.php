<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<?php
include "baglan.php";
if($_POST && $_GET["calisan"]=="kaydet")
{
if(@$_POST[tckimlik]=="" || @$_POST[ad]=="" || @$_POST[soyad]=="" || @$_POST[dtarihi]=="" || @$_POST[gsm]=="" || @$_POST[sgkno]=="" || @$_POST[maas]=="" || @$_POST[adres]=="")
{
echo "<script>alert('Lütfen * ile işaretli alanları doldurunuz.')</script>";
}
else
{
$tarih=date("y-m-d");
mysql_select_db($dbdata,$con);
mysql_query("insert into firma_calisanlari values(calisan_id,'$_POST[tckimlik]','$_POST[ad]','$_POST[soyad]','$_POST[dtarihi]','$_POST[telefon]','$_POST[gsm]','$_POST[email]','$_POST[adres]','$_POST[sgkno]','$_POST[maas]','$tarih',0,0)");
echo "<script>alert('Çalışan Kayıt Başarı ile Tamamlanmıştır.')</script>";
mysql_close($con);
}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yeni Çalışan Ekleme</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><span class="bilgi">Yeni Firma Çalışanı Ekleme Bölümü<br>
      <br>
    </span><form id="form1" name="form1" method="post" action="yeni_calisan_ekle.php?calisan=kaydet">
      <table width="690" border="0" align="left" cellpadding="5" cellspacing="5">
        <tr>
          <td>Tc Kimlik No</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="tckimlik" type="text" class="sablon_kutular" id="tckimlik">
            *</td>
        </tr>
        <tr>
          <td width="129"> Adı</td>
          <td width="6" align="center" valign="middle">:</td>
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
          <td>D.Tarihi</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="dtarihi" type="text" class="sablon_kutular" id="dtarihi" />
            *</td>
        </tr>
        <tr>
          <td>Telefon</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="telefon" type="text" class="sablon_kutular" id="telefon" /></td>
        </tr>
        <tr>
          <td>Gsm</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="gsm" type="text" class="sablon_kutular" id="gsm" />
            *</td>
        </tr>
        <tr>
          <td>E-Mail</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="email" type="text" class="sablon_kutular" id="email" value="" /></td>
        </tr>
        <tr>
          <td>Sgk No</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="sgkno" type="text" class="sablon_kutular" id="sgkno">
            *</td>
        </tr>
        <tr>
          <td>Maaş</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><input name="maas" type="text" class="sablon_kutular" id="maas">
            *</td>
        </tr>
        <tr>
          <td>Adresi</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><textarea name="adres" class="sablon_kutular1" id="adres"></textarea>
            *</td>
        </tr>
        <tr>
          <td colspan="4" align="center">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="2" align="center"><input name="button" type="submit" class="sablon2" id="button" value="Firma Çalışanı Kaydet" /></td>
          <td width="199" align="right"><input name="button2" type="reset" class="sablon2" id="button2" value="Formu Temizle" /></td>
          <td width="291" align="left">&nbsp;</td>
        </tr>
      </table>
        </form>    </td>
  </tr>
</table>
</body>
</html>
