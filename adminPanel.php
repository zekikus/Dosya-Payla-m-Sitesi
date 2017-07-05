<?php
@session_start();
if(isset($_SESSION['giris'])){ 	?>
<html>
	<head>
		<link rel="stylesheet" href="css/adminPanel.css" />
	</head>
	<body>
		<div class="adminContainer">
			<div class="ortaKisim">
				<span><b>Admin Yönetim Paneli</b></span>
				<form action="index.php?s=deleteSonuc" method="post" name="adminPanel">
					<table>
						<tr class="baslik">
							<td>Dosya</td>
							<td>Dosya Kodu</td>
							<td>Dosya Adı</td>
							<td>Dosya Boyutu</td>
							<td>Dosya Türü</td>
							<td>Kalan Süre</td>
							<td>Yüklenme Tarihi</td>
							<td>Görünürlük</td>
						</tr>
			
						<?php
							include("mysql.php");
							include("saat.php");
							
							
							$sorgu = mysql_query("SELECT * FROM uploads WHERE silinmisMi = 0");
							$toplamKayit = mysql_num_rows($sorgu);
							$listeSayisi = 5;
							$toplamSayfa = ceil($toplamKayit / $listeSayisi);
							$limit = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
							$baslangic= ($limit-1) * $listeSayisi;
							$kayitGetir = mysql_query("SELECT * FROM uploads WHERE silinmisMi = 0 LIMIT $baslangic,$listeSayisi");
							
							while($gelen = mysql_fetch_assoc($kayitGetir)){
														
							$kalanSure = (int) ceil((strtotime($gelen["sonTarih"]) - strtotime($datum)) / 86400);
							
							?>	
								<tr class='gelenKayitlar'>
									<td><input type="checkbox" name="kayitlar[]" value="<?=$gelen["dosyaKodu"]?>"></td>
									<td><a href="index.php?s=update&v=<?=$gelen["dosyaKodu"]?>"><?=$gelen["dosyaKodu"]?></a></td>
									<td><?=$gelen["dosyaAdi"]?></td>
									<td><?=round($gelen["dosyaBoyut"]/1000000,2).' MB'?></td>
									<td><?=$gelen["dosyaTur"]?></td>
									<td><?=$kalanSure <= 0 ? '0 Gün' : $kalanSure." Gün"?></td>
									<td><?=$gelen["yuklenmeTarih"]?></td>
									<td><?=$gelen["gorunurluk"]?></td>
								</tr>
							<?php		
							}
						?>
					</table>
					<input type="submit" value="Sil" class="sil" />
				</form>
				<form name = "listeleForm" action="" method="get">
					<input type="hidden" value="<?=$_GET["s"]?>" name="s" />
					<select size="1" name="sayfa" onchange='this.form.submit()'>
						<?php
							for($i = 1; $i <= $toplamSayfa; $i++){
								echo "<option ";
								echo $i == $limit ? 'selected' : null;
								echo ' value="'.$i.'">'.$i.'.Sayfa</option>';
							}
						?>
					</select>
				</form>
			<div>
		</div>
	</body>
</html><?php						
}else{header("Location:index.php?s=admin");}
					
?>
