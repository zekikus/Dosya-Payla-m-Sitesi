<html>
<head>
	<title>Dosya Paylaşım Sitesi</title>
	<link rel="stylesheet" href="css/download.css" />
</head>
<body>
	<div class="ortaKisim">
		<form name="download" action="index.php?s=downloadInfo" method="post" enctype="multipart/form-data">
			<span style="color:#009900; float:left; font-size:13px;">Dosya İndir</span>
			<div class="downloadBox">
				<span style="font-size:13px">Dosya İndirme Kodu:</span>
				<input type="text" name="dKodu" />
				<input type="submit" name="dButton" value="Onay"/>
			</div>
		</form>
	</div>
</body>
</html>