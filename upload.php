<html>
<head>
	<title>Dosya Paylaşım Sitesi</title>
	<link rel="stylesheet" href="css/upload.css">
</head>
<body>
	
	<?php include("saat.php") ?>
	<div class="ortaKisim">
		<form name="upload" method="post" action="index.php?s=uploadInfo" enctype="multipart/form-data">
			<span style="color:#009900; padding:5px;">Dosya Gönder</span>
			<div class="uploadBox">
				<img style="float:left" src="images/upload_box.png" />
				<span>Yüklemek için bir dosya seçiniz</span>
				<span class="selectionField">
					<input type="file" name="dosya">
				</span>
				<span style="padding-left:27%; padding-top:4%">Dosya Son İndirme Tarihi:</span>
				<input type="date" value="<?=date("Y-m-d",$tmestamp)?>" name="tarih" />
				<span style="color:red; font-size:9px; padding-top:3%;">Gönderilecek dosyanın boyutu maksimum 100 mb ve uzantısı zip, rar veya 7z olmalıdır.</span>
			</div>
			<input type="submit" name="yukle" value="Yükle" />
		</form>	
	</div>
</body>
</html>