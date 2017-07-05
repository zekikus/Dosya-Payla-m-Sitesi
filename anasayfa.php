<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/anasayfa.css" />
</head>

<?php
	include("mysql.php");
	$sorgu = @mysql_query("SELECT k.dosyaKodu FROM kullanici k,uploads u WHERE k.dosyaKodu = u.dosyaKodu and ipadres = '".$_SERVER['REMOTE_ADDR']."'");
	$toplamKayit = @mysql_num_rows($sorgu);
?>

<body>
		<div class="ortaKisim">
			<a href="index.php?s=upload"><img id="upload" src="images/guploadx.png" style="margin-left:22%; margin-top:5%"/></a>
			<a href="index.php?s=download"><img id="download" src="images/gdownloadx.png" /></a>
		</div>
		
		<div class="altKisim">
			<span style="color:#009900; font-size:12px;">Daha Önce Sizin Tarafınızdan İndirilenler</span><br>
			<span style="font-size:12px;">
				<form name="downloads" action="index.php?s=downloadInfo" method="post">
					<table>
						<tr class="baslik">	
							<td>İndirme Kodu</td>
							<td>Dosya Adı</td>
							<td>Dosya Boyutu</td>
							<td>İndirilme Sayısı</td>
						</tr>
						<?php
							$ip = $_SERVER["REMOTE_ADDR"];
							$sorgu2 = @mysql_query("SELECT u.dosyaKodu,u.dosyaAdi,u.dosyaBoyut,k.indirilmeSayisi FROM kullanici k,uploads u WHERE k.dosyaKodu = u.dosyaKodu and k.ipadres = '$ip'");
							$limit = 5;
							$sayfa = @isset($_GET["sayfa"]) ? $_GET["sayfa"] : 1;
							$sayfaSayisi = ceil(mysql_num_rows($sorgu2)/$limit);
							$baslangic = ($limit * $sayfa) - $limit;
							
							
							$listele = @mysql_query("SELECT u.dosyaKodu,u.dosyaAdi,u.dosyaBoyut,k.indirilmeSayisi,u.kopyasiVarmi FROM kullanici k,uploads u WHERE k.dosyaKodu = u.dosyaKodu and k.ipadres = '$ip' LIMIT $baslangic,$limit");
							
							while($gVeri = mysql_fetch_assoc($listele)){
								$dosyaAdi = $gVeri["dosyaAdi"];
								$kopyasiVarmi = $gVeri["kopyasiVarmi"];
								?>
								
								<tr class="icerik">
									<td><input type="submit" name="dKodu" value="<?=$gVeri["dosyaKodu"]?>" /></td>										
									<td><?=$kopyasiVarmi == 1 ? substr($dosyaAdi,16,strlen($dosyaAdi)) : $dosyaAdi;?></td>
									<td><?=round($gVeri["dosyaBoyut"]/1000000,2)?> MB</td>
									<td><?=$gVeri["indirilmeSayisi"]?></td>
								</tr>
								<?php
							}
						?>
					</table>
				</form>
					<form name="sayfala" action="" method="get">
						<input type="hidden" value="<?=isset($_GET["s"]) ? $_GET["s"] : 'anasayfa' ?>" name="s" />
						<select name="sayfa" onchange="this.form.submit();">
						<?php
							for($i = 1 ; $i <= $sayfaSayisi ; $i++){
								echo "<option ";
								echo $i == $sayfa ? 'selected' : null;
								echo ' value="'.$i.'">'.$i.'.Sayfa</option>';
							}
						?>
						</select>
					</form>
			</span><br>
			<span style="margin-left:35%; font-size:12px; padding-top:10%;"><b>Toplam Kayıt Sayısı</b> <?=$toplamKayit?> kayıt</span>
		</div>
</body>
</html>