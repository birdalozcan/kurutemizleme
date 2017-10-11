<?php
session_start();
if(!isset($_SESSION["oturum"]))
{
	header("Location:yonetim.php");
}
?>
<?php
include "baglan.php";
$id=@$_GET[id];
if(@$_GET["musteri"]=="sil")
{
	mysql_select_db($dbdata,$con);
	mysql_query("delete from musteriler where musteri_id=$id");
	mysql_close($con);
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mevcut Müşteriler</title>
</head>

<body>
	<table width="690" border="0" align="left" cellpadding="0"
		cellspacing="0" class="sablon_yazilar">
		<tr>
			<td width="690" height="670" valign="top"><span class="bilgi">Mevcut
					Müşteriler Bölümü</span><br> <br>
				<form name="form1" method="post"
					action="mevcut_musteriler.php?musteri=ara">
					<table width="690" border="0" cellpadding="5" cellspacing="5"
						class="yonetim_bolumu">
						<tr>
							<td width="88">Müşteri Adı</td>
							<td width="8">:</td>
							<td width="204"><input name="musteri_ara" type="text"
								class="sablon_kutular" id="musteri_ara"></td>
							<td width="321"><input name="button" type="submit"
								class="sablon2" id="button" value="Müşteri Bul"></td>
						</tr>
					</table>
				</form>

				<table width="690" border="0" align="left" cellpadding="5"
					cellspacing="5" bgcolor="#B7DBF2">
					<?php
					include "baglan.php";
					if($_POST && $_GET['musteri']=="ara")
					{
						$musteri=@$_POST['musteri_ara'];
						mysql_select_db($dbdata,$con);
						$result=mysql_query("select * from musteriler where musteri_ad='$musteri'");
						while($row=mysql_fetch_array($result))
						{
							$ID=$row['musteri_id'];
							$ad=$row['musteri_ad'];
							$soyad=$row['musteri_soyad'];
							echo "<table width=690 border=0'align=left cellpadding=0 cellspacing=0 bgcolor=#B7DBF2 class=sablon_yazilar>
							<tr>
							<td width=9 height=27 align=center valign=middle>&nbsp;&nbsp;&nbsp;<img src=grafik/devam.gif width=9 height=9 /></td>
							<td width=568 height=27> &nbsp;$ad&nbsp;$soyad </td>
							<td width=24 height=27 align=center valign=middle><a href=mevcut_musteriler.php?musteri=sil&id=$ID><img src=grafik/sil.png width=24 height=24 border=0 /></a></td>
							<td width=24 height=27 align=center valign=middle><img src=grafik/update.png width=24 height=24 /></td>
							</tr>
							</table>";
						}
					}
					else{

						mysql_select_db($dbdata,$con);
						$result=mysql_query("select * from musteriler order by musteri_ad ASC");
						while($row=mysql_fetch_array($result))
						{
							$ID=$row['musteri_id'];
							$ad=$row['musteri_ad'];
							$soyad=$row['musteri_soyad'];

							?>

					<tr>
						<td width="9" height="24" align="center" valign="middle"><img
							src="grafik/devam.gif" width="9" height="9" /></td>
						<td width="568" height="24"><?php echo $ad; ?>&nbsp;&nbsp;<?php echo $soyad; ?>
						</td>
						<td width="24" height="24" align="center" valign="middle"><a
							href="mevcut_musteriler.php?musteri=sil&id=<?php echo "$ID"; ?>"><img
								src="grafik/sil.png" width="24" height="24" border="0" /> </a></td>
						<td width="24" height="24" align="center" valign="middle"><a
							href="mevcut_musteriler_detay.php?id=<?php echo $ID; ?>"><img
								src="grafik/update.png" width="24" height="24" border="0" /> </a>
						</td>
					</tr>

					<?php }}?>
				</table></td>
		</tr>
	</table>
</body>
</html>
<?php mysql_close($con)?>