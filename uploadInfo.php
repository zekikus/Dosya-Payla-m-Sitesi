<html>
<head>
	<link rel="stylesheet" href="css/uploadInfo.css" />
</head>
<body>
	<?php
			include("mysql.php");
			include("saat.php");
			$dosyaVarmi = false;
			$dosya = $_FILES["dosya"];
			$uzantilar = array("zip","rar");
			$dizin = "uploads/";
			$dosyaAdi = $dosya["name"];
			$dosyakonum = $dizin.basename($dosya["name"]);
			$boyut = $dosya["size"];
			$uzanti = explode('.',$dosyaAdi);
			$uzanti = $uzanti[count($uzanti) - 1];
			$tarih = date("d.m.Y H:i:s",$tmestamp);
			$dosyaKodu = "A".date("dmYHis",$tmestamp);
			$gTarih = $_POST["tarih"];
			
			if(in_array($uzanti,$uzantilar)){
				if(file_exists($dizin.$dosyaAdi)){
					copy($dosyakonum, $dizin.$dosyaKodu.'-'.$dosyaAdi);
					veritabaninaYaz($tarih,$gTarih,$boyut,$uzanti,$dosyaKodu.'-'.$dosyaAdi,$dosyaKodu,1);
					$dosyaVarmi = true;
				}
			}
			
			if(!$dosyaVarmi){
				if(in_array($uzanti,$uzantilar)){
					$upload = move_uploaded_file($dosya["tmp_name"],$dosyakonum);
					if($upload){
						veritabaninaYaz($tarih,$gTarih,$boyut,$uzanti,$dosyaAdi,$dosyaKodu,0);
					}
				}else{
					header("refresh:1;url=index.php?s=upload");
					die("<script> alert('Hatalı Dosya Tipi')</script>");
				}
			}
	?>
	<div class="ortaKisim">
		<span>Upload Bilgileri</span>
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
				<td>Sıkıştırılmış İçerik</td>
			</tr>
			<tr>
				<td><b>Dosya Adı</b></td>
				<td>:</td>
				<td><?=@$dosya["name"]?></td>
			</tr>
			<tr>
				<td><b>Dosya İndirme Kodu</b></td>
				<td>:</td>
				<td><?=@$dosyaKodu?></td>
			</tr>
			
		</table>
	</div>
</body>
</html>