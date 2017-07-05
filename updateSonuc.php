<?php
	
	include("mysql.php");
	
	$gDosyaKodu = $_POST["dKodu"];
	$gTarih = $_POST["yTarih"];
	$gKalanGun = $_POST["kSure"];
	$gGorunurluk = $_POST["gorunurluk"];

	$sorgu = @mysql_query("UPDATE uploads set yuklenmeTarih = '$gTarih',sonTarih = '$gKalanGun',gorunurluk = $gGorunurluk WHERE dosyaKodu = '$gDosyaKodu'");
	
	if($sorgu){
		header("Location:index.php?s=adminPanel");
	}else{
		echo "<script>alert('Güncelleme İşlemi Sırasında Hata Oluştu.')</script>";
			header("refresh:0.1;url=index.php?s=adminPanel");
	}

?>