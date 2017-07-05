<?php
	
	$host = "localhost";
	$kadi = "root";
	$sifre = "";
	$database = "site";
	
	$baglan = @mysql_connect($host,$kadi,$sifre) or die("Bağlantı Hatası");
	$db = @mysql_select_db($database,$baglan) or die("Bağlantı Hatası");
	date_default_timezone_set('Europe/Istanbul');
	
	function veritabaninaYaz($gTarih,$gkalanGun,$gboyut,$guzanti,$gdosyaAdi,$gdosyaKodu,$gKopya){
		
		$sorgu = @mysql_query("INSERT INTO uploads (dosyaKodu,dosyaAdi,dosyaTur,dosyaBoyut,yuklenmeTarih,sonTarih,gorunurluk,kopyasiVarmi)
		values ('$gdosyaKodu','$gdosyaAdi','$guzanti',$gboyut,'$gTarih','$gkalanGun',1,$gKopya)");
		
		if($sorgu){
			echo "<script>alert('Upload İşlemi Başarılı.')</script>";
		}else{
			echo "<script>alert('Upload İşlemi Sırasında Hata Oluştu.Tekrar Deneyiniz.')</script>";
			header("Location:index.php?s=upload");
		}
		
	}

?>