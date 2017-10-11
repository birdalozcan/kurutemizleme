<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Kuru Temizleme Web Yazılımı - Yönetim Bölümü</title>
</head>

<body>
<table width="980" border="0" align="left" cellpadding="5" cellspacing="5">
  <tr>
    <td height="30" colspan="2" bgcolor="#145687" class="yonetim_bolumu">Kuru Temizleme Web Yazılımı Yönetim Bölümü</td>
  </tr>
  <tr>
    <td width="250" height="500" align="left" valign="top" class="yonetim_bolumu"><table width="250" border="0" align="left" cellpadding="5" cellspacing="5" class="yonetim_kategori_yazilar">
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/list-add-user.png" width="24" height="24" /></td>
        <td width="141"><a href="hizli_kayit.php" target="frame">Hızlı Kayıt</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/urun.png" width="24" height="24" /></td>
        <td><a href="bekleyen_urunler.php" target="frame">Bekleyen Ürünler</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/delivery.png" width="24" height="24" /></td>
        <td><a href="urun_teslimati.php" target="frame">Ürün Teslimatı</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/clean.png" width="24" height="24" /></td>
        <td><a href="yapilan_isler.php" target="frame">Yapılan İşler Bölümü</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/user-group-new.png" width="24" height="24" /></td>
        <td><a href="yeni_musteri_ekle.php" target="frame">Yeni Müşteri Ekleme</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/Users.png" width="24" height="24" /></td>
        <td><a href="mevcut_musteriler.php" target="frame">Mevcut Müşteriler</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/document_add.png" width="24" height="24" /></td>
        <td><a href="yeni_urun_ekle.php" target="frame">Yeni Ürün Ekleme</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/meanicons_16-64.png" width="24" height="23" /></td>
        <td><a href="mevcut_urunler.php" target="frame">Mevcut Ürünler</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/friedn_added-24.png" width="24" height="24" /></td>
        <td><a href="yeni_calisan_ekle.php" target="frame">Yeni Firma Çalışanı Ekleme</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/add_Firma_calisani.png" width="24" height="24" /></td>
        <td><a href="mevcut_calisanlar.php" target="frame">Mevcut Çalışanlar</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/checkout.png" width="24" height="24" /></td>
        <td><a href="avans_odemeleri.php" target="frame">Avans Ödemeleri</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/expense-24.png" width="24" height="24" /></td>
        <td><a href="temel_giderler.php" target="frame">Temel Gider Ekle</a></td>
      </tr>
      <tr>
        <td height="24" align="center" valign="middle"><img src="grafik/kwrite.png" width="24" height="24" /></td>
        <td><a href="temel_giderler_goruntule.php" target="frame">Temel Giderleri Görüntüle</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/calendar-month.png" width="24" height="24" /></td>
        <td><a href="aylik_odemeler.php" target="frame">Aylık Ödemeler</a></td>
      </tr>
      <tr>
        <td height="24" align="center" valign="middle"><img src="grafik/Windows_View_Detail.png" width="24" height="24" /></td>
        <td><a href="maas_hareketleri.php" target="frame">Maaş Hareketleri</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/cash_register.png" width="24" height="24" /></td>
        <td><a href="kasa.php" target="frame">Kasa Raporu</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/safe.png" width="24" height="24" /></td>
        <td><a href="banka.php" target="frame">Banka</a></td>
      </tr>
      <tr>
        <td width="24" height="24" align="center" valign="middle"><img src="grafik/Delete.png" width="24" height="24" /></td>
        <td><a href="cikis.php">Çıkış Yap</a></td>
      </tr>
    </table></td>
    <td width="730" height="690" valign="top" class="sablon"><iframe name="frame" width="730" height="690" scrolling="auto" frameborder="0" id="frame"></iframe></td>
  </tr>
</table>
</body>
</html>
