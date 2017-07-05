<html>
<head>
	<link rel="stylesheet" href="css/update.css" />
</head>
<body>
	<?php

		include("mysql.php");
		$gelenkayit = $_GET["v"];
		$sorgu = @mysql_query("SELECT * FROM uploads WHERE dosyaKodu = '$gelenkayit'");
		$gelenveri = @mysql_fetch_assoc($sorgu);
		
		if($gelenveri){ ?>
		<div class="ortaKisim">
			<span><?=$_GET["v"]?> Düzenleme Alanı</span>
			<form name="updateForm" method="post" action="index.php?s=updateSonuc">
				<table>
					<tr>
						<td></td>
						<td></td>
						<td><input type="hidden" name="dKodu" value="<?=$gelenveri["dosyaKodu"]?>"/></td>
					</tr>
					<tr>
						<td><b>Dosya Adı</b></td>
						<td>:</td>
						<td><input type="text" name="dAdi" value="<?=$gelenveri["dosyaAdi"]?>" readonly/></td>
					</tr>
					<tr>
						<td><b>Dosya Türü</b></td>
						<td>:</td>
						<td><input type="text" name="dTuru" value="<?=$gelenveri["dosyaTur"]?>" readonly/></td>
					</tr>
					<tr>
						<td><b>Dosya Boyutu</b></td>
						<td>:</td>
						<td><input type="text" name="dBoyut" value="<?=round(($gelenveri["dosyaBoyut"]/1000000),2)." MB"?>" readonly/></td>
					</tr>
					<tr>
						<td><b>Son İndirme Tarihi</b></td>
						<td>:</td>
						<td><input type="date" name="kSure" value="<?=$gelenveri["sonTarih"]?>"/></td>
					</tr>
					<tr>
						<td><b>Yüklenme Tarihi</b></td>
						<td>:</td>
						<td><input type="text" name="yTarih" value="<?=$gelenveri["yuklenmeTarih"]?>"/></td>
					</tr>
					<tr>
						<td><b>Dosya Görünürlüğü</b></td>
						<td>:</td>
						<td>
							<select size="1" name="gorunurluk">
								<option value="0" <?=$gelenveri["gorunurluk"] == 0 ? ' selected' : null?>>Dosya İndirilmeye Kapalı</option>
								<option value="1" <?=$gelenveri["gorunurluk"] == 1 ? ' selected' : null?>>Dosya İndirilmeye Açık</option>
							</select>
						</td>
					</tr>
				</table>
				<input type="submit" value="Değişiklikleri Kaydet" class="kaydet" />
			</form>
		</div>
		<?php	
		}else{
			header("Location:index.php?s=adminPanel");
		}
	?>
	
</body>
</html>