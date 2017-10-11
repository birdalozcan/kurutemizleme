<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
header("Location:yonetim.php");
}
?>
<?php
error_reporting(0);
$ad=@$_POST['musteriad'];
$soyad=@$_POST['musterisoyad'];
$markabilgileri=@$_POST['markabilgileri'];
$hasardurumu=@$_POST['hasardurumu'];
$iletisimtelefonu=@$_POST['iletisimtelefonu'];
$musteriiskonto=@$_POST['musteriiskonto'];
$isteslimtarihi=@$_POST['isteslimtarihi'];
$degerler=@$_POST["deger"];
$veri=" ";
if($degerler!=NULL)
{
$veri=implode(',',$degerler);

}
else
{
$veri=" ";
}
$degerler1=@$_POST["adet"];

$veri1=" ";
if($degerler1!=NULL)
{
$veri1=implode(',',$degerler1);

}
else
{
$veri1=" ";
}

?>

<?php
$i=0;
$k=0;
$sonuc=0;
$x=0;
$y=0;
$z=0;
include "baglan.php";
$dizi=array();
$dizi1=array();
foreach($degerler as $yenid)
{
mysql_select_db($dbdata,$con);
$result=mysql_query("select urun_birim_fiyati from yeni_eklenen_urunler where urun_adi='$yenid'");
while($row=mysql_fetch_array($result))
{
$a=$row['urun_birim_fiyati'];
//echo $a."<br>";
$dizi[$i]=$a;
$i++;
}
}


foreach($degerler1 as $yeni1)
{
if($yeni1!=0)
{
//echo $yeni1." Adet"."<br>";
$y=$yeni1;
$dizi1[$k]=$y;
$k++;
}
}

for($y=0; $y<count($dizi); $y++)
{
//echo $dizi[$y]."<br>";
//echo $dizi1[$y]."<br>";
$sonuc=$sonuc+($dizi[$y]*$dizi1[$y]);
}
$ind=($sonuc*$musteriiskonto)/100;
$net=$sonuc-$ind;
$teslimatdurumu=0;
$isdurumu=0;
$ucretdurumu=0;



$tarih=date("y-m-d");
include "baglan.php";
mysql_select_db($dbdata,$con);
if($ad=='' || $soyad=='' || $iletisimtelefonu=='' || $isteslimtarihi=='')
{
echo "<script>alert('Lütfen * işaretli alanları doldurunuz.')</script>";
header("Refresh: 00; url=http://localhost/vtys/hizli_kayit.php");
}
else
{
mysql_query("insert into hizli_kayit values(musteri_id,'$ad','$soyad','$veri','$veri1','$markabilgileri','$hasardurumu','$iletisimtelefonu',$sonuc,'$musteriiskonto',$net,$teslimatdurumu,$isdurumu,$ucretdurumu,'$tarih','$isteslimtarihi')");
mysql_close($con);
echo "<script>alert('Kayıt Başarı ile Eklenmiştir.')</script>";
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Son Kayıt Ekranı</title>
</head>

<body>
<table width="690" border="0" align="left" cellpadding="0" cellspacing="0" class="sablon_yazilar">
  <tr>
    <td width="690" height="670" valign="top"><form name="form1" method="post" action="son_kayit.php">
      <table width="690" border="0" cellspacing="5" cellpadding="5">
        <tr>
          <td width="128">Müşteri Adı</td>
          <td width="4" align="center" valign="middle">:</td>
          <td colspan="2"><?php echo $ad; ?></td>
        </tr>
        <tr>
          <td>Müşteri Soyadı</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><?php echo $soyad; ?></td>
        </tr>
        <tr>
          <td>Seçtiği Eşyalar</td>
          <td align="center" valign="middle">:</td>
          <td width="134">
          <?php
		  foreach($degerler as $yeni)
		  {
		  echo $yeni."<br>";
		  }
          ?>          </td>
          <td width="359">
          <?php
		  foreach($degerler1 as $yeni1)
		  {
		  if($yeni1!=0)
		  {
		  echo $yeni1." Adet"."<br>";
		  }
		  }
		  ?>          </td>
        </tr>
        <tr>
          <td>Marka Bilgileri</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><?php echo $markabilgileri; ?></td>
        </tr>
        <tr>
          <td>Hasar Durumu</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><?php echo $hasardurumu; ?></td>
        </tr>
        <tr>
          <td>İletişim Telefonu</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><?php echo $iletisimtelefonu; ?></td>
        </tr>
        <tr>
          <td>Müşteri İskontosu</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"> % <?php echo $musteriiskonto; ?></td>
        </tr>
        <tr>
          <td>İş Tutarı</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><?php echo $sonuc; ?> TL</td>
        </tr>
        <tr>
          <td>İndirim Tutarı</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><?php echo ($sonuc*$musteriiskonto)/100;?> TL</td>
        </tr>
        <tr>
          <td>Ödeme Tutarı</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><?php echo $net; ?> TL</td>
        </tr>
        <tr>
          <td>İş Teslim Tarihi</td>
          <td align="center" valign="middle">:</td>
          <td colspan="2"><?php echo $isteslimtarihi; ?></td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
</body>
</html>
