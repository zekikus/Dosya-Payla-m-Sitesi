<html>
<head>
	<link rel="stylesheet" href="css/downloadInfo.css" />
</head>
<body>

	<?php
		include("mysql.php");
		include("saat.php");
		$gelenDKodu = $_POST["dKodu"];
		$sorgu = @mysql_query("SELECT * FROM uploads WHERE gorunurluk = 1 and silinmisMi = 0 and dosyaKodu = '$gelenDKodu'");
		$gelenveri = @mysql_fetch_assoc($sorgu);
		if($gelenveri){
			$tarih = $gelenveri["yuklenmeTarih"];
			$boyut = $gelenveri["dosyaBoyut"];
			$tur   = $gelenveri["dosyaTur"];
			$dosyaadi = $gelenveri["dosyaAdi"];
			$dKodu = $gelenveri["dosyaKodu"];
			$kopyasiVarmi = $gelenveri["kopyasiVarmi"];
			$sonTarih = $gelenveri["sonTarih"];
			$simdikiTarih = date("d.m.Y H.i.s", $tmestamp);
			$kalanZaman = (int) ceil((strtotime($sonTarih) - strtotime($simdikiTarih)) / 86400);
			
			if($kalanZaman <= 0){
				header("refresh:1;url=index.php?s=download");
				@unlink("uploads/".$dosyaadi);
				mysql_query("UPDATE uploads set gorunurluk = 0 WHERE dosyaKodu = '$gelenDKodu'");
				die("<script>alert('İndirmek İstenen Dosyanın Son İndirilme Tarihi Geçmiş.')</script>");
			}
			
			$kullaniciIP = $_SERVER["REMOTE_ADDR"];
			$gSorgu = mysql_query("SELECT * FROM kullanici WHERE ipadres = '$kullaniciIP' ");
			if(mysql_num_rows($gSorgu) == 0){
				$indirmeSayisi = 1;
				mysql_query("INSERT INTO kullanici (ipadres,dosyaKodu,indirilmeSayisi) VALUES('$kullaniciIP','$gelenDKodu',$indirmeSayisi)");
			}else{
				$dkSorgu = mysql_query("select * from kullanici where dosyaKodu = '$gelenDKodu' and ipadres='$kullaniciIP'");
				if(mysql_num_rows($dkSorgu) == 0){
					$indirmeSayisi = 1;
					mysql_query("INSERT INTO kullanici (ipadres,dosyaKodu,indirilmeSayisi) VALUES('$kullaniciIP','$gelenDKodu',$indirmeSayisi)");
				}else{
					$gVeri = mysql_fetch_assoc($dkSorgu);  
					$indirmeSayisi = $gVeri["indirilmeSayisi"];
					mysql_query("UPDATE kullanici set indirilmeSayisi = $indirmeSayisi + 1 WHERE ipadres = '$kullaniciIP' and dosyaKodu = '$gelenDKodu'");
				}
			}
			
		}else{
			header("refresh:1;url=index.php?s=download");
			die("<script>alert('İndirmek İstenen Dosya Bulunamadı.')</script>");
		}

	?>

	<div class="ortaKisim">
		<span style="color:#009900; padding-left:40%">İndirilen Dosya</span>
		<table>
			<tr>
				<td><b>Yüklenme Tarihi</b></td>
				<td>:</td>
				<td><?=@$tarih?></td>
			</tr>
			<tr>
				<td><b>Dosya Boyutu</b></td>
				<td>:</td>
				<td><?=@round(($boyut/1000000),2)." MB"?></td>
			</tr>
			<tr>
				<td><b>Dosya Türü</b></td>
				<td>:</td>
				<td><?=$tur?></td>
			</tr>
			<tr>
				<td><b>Dosya Adı</b></td>
				<td>:</td>
				<td><?= $kopyasiVarmi == 1 ? substr($dosyaadi,16,strlen($dosyaadi)) : $dosyaadi;?></td>
			</tr>
			<tr>
				<td><b>Dosya İndirme Kodu</b></td>
				<td>:</td>
				<td><?=@$dKodu?></td>
			</tr>
			
		</table>
	</div>
</body>
</html>