<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<?php 
include "baglan.php";
$x=""; // ad
$y=""; // soyad
$z=""; // iletişim telefonu
$t=0; // iskonto
if(@$_POST && @$_GET["musteri"]=="bul")
{
$musteriID=@$_POST['kayitlimusteri'];
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from musteriler where musteri_id=$musteriID");
while($row=mysql_fetch_array($result))
{
$ID=$row['musteri_id'];
$ad=$row['musteri_ad'];
$soyad=$row['musteri_soyad'];
$musteri_gsm=$row['musteri_gsm'];
$musteri_iskonto=$row['musteri_iskonto'];

$x=$ad;
$y=$soyad;
$z=$musteri_gsm;
$t=$musteri_iskonto;

}}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hızlı Kayıt</title>
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
<p class="bilgi"><u>Hızlı Kayıt Bölümü</u></p>
<form name="form2" method="post" action="hizli_kayit.php?musteri=bul">
  <table width="690" border="0" align="left" cellpadding="5" cellspacing="5" class="yonetim_bolumu">
    <tr>
      <td width="138">Kayıtlı Müşteri Seç</td>
      <td width="7" align="center" valign="middle">:</td>
      <td width="200"><select name="kayitlimusteri" class="sablon_kutular" id="kayitlimusteri">
        <option>Seçiniz</option>
        <?php
include "baglan.php";
mysql_select_db($dbdata,$con);
$result=mysql_query("select * from musteriler order by musteri_ad ASC");
while($row=mysql_fetch_array($result))
{
$ID=$row['musteri_id'];
$ad=$row['musteri_ad'];
$soyad=$row['musteri_soyad'];
?>
        <option value="<?php echo $ID; ?>"><?php echo $ad." ".$soyad; ?></option>
        <?php }?>
      </select></td>
      <td width="276"><input name="button" type="submit" class="sablon2" id="button" value="BUL" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><form id="form1" name="form1" method="post" action="son_kayit.php">
      <table width="690" border="0" align="left" cellpadding="5" cellspacing="5">
        <tr>
          <td width="118" height="20">Müşteri Adı</td>
          <td width="4" align="center" valign="top">:</td>
          <td colspan="2"><input name="musteriad" type="text" class="sablon_kutular" id="musteriad"  value="<?php echo $x; ?>"/>
          *</td>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td height="20">Müşteri Soyadı</td>
          <td align="center" valign="top">:</td>
          <td colspan="4"><input name="musterisoyad" type="text" class="sablon_kutular" id="musterisoyad" value="<?php echo $y; ?>" />
          *</td>
        </tr>
                  <?php
include "baglan.php";

$result=mysql_query("select * from yeni_eklenen_urunler order by urun_adi ASC");
while($row=mysql_fetch_array($result))
{

$ID=$row['urun_id'];
$urun_adi=$row['urun_adi'];
$urun_birim_fiyati=$row['urun_birim_fiyati'];

?>
        <tr>
          <td height="20">Seçilen Eşyalar</td>
          <td align="center" valign="top">:</td>

          <td width="133"><input name="deger[<?php echo $ID; ?>]" type="checkbox" id="secilenesyalar" value="<?php echo $urun_adi; ?>">
            <?php echo $urun_adi; ?></td>
          
          <td width="84"><input name="adet[<?php echo $ID; ?>]" type="text" class="check" id="adet" value="0"  maxlength="5"></td>
          <td colspan="2">&nbsp;</td>
          <?php }?>
        </tr>
        <tr>
          <td height="20">Marka Bilgileri</td>
          <td align="center" valign="top">:</td>
          <td colspan="4"><input name="markabilgileri" type="text" class="sablon_kutular" id="markabilgileri" /></td>
        </tr>
        <tr>
          <td height="20">Hasar Durumu</td>
          <td align="center" valign="top">:</td>
          <td colspan="4"><textarea name="hasardurumu" cols="30" rows="5" class="sablon_kutular1" id="hasardurumu">Hasarsız</textarea></td>
        </tr>
        <tr>
          <td height="20">İletişim Telefonu</td>
          <td align="center" valign="top">:</td>
          <td colspan="4"><input name="iletisimtelefonu" type="text" class="sablon_kutular" id="iletisimtelefonu" value="<?php echo $z; ?>" />
          *</td>
        </tr>
        <tr>
          <td height="20">Müşteri İskontosu</td>
          <td align="center" valign="top">:</td>
          <td colspan="4"><input name="musteriiskonto" type="text" class="sablon_kutular" id="musteriiskonto" value="<?php echo $t; ?>" /></td>
        </tr>
        <tr>
          <td height="20">İş Teslim Tarihi</td>
          <td align="center" valign="top">:</td>
          <td colspan="4"><input name="isteslimtarihi" type="text" class="sablon_kutular" id="inputField" />
          *</td>
        </tr>
        <tr>
          <td height="20" colspan="2" align="right">&nbsp;</td>
          <td colspan="3" align="center">&nbsp;</td>
          <td width="130">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" colspan="2" align="right"><input name="button3" type="submit" class="sablon2" id="button3" value="Kayıt Et" /></td>
          <td colspan="3" align="center"><input name="button2" type="reset" class="sablon2" id="button2" value="Formu Temizle" /></td>
          <td>&nbsp;</td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($con); ?>