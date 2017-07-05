<?php
	include("mysql.php");
	
	$gKayitlar = $_POST["kayitlar"];
	if($gKayitlar){
		foreach($gKayitlar as $item){
			$gSorgu = @mysql_query("SELECT dosyaAdi FROM uploads WHERE dosyaKodu = '$item'");
			$gVeri = @mysql_fetch_assoc($gSorgu);
			$sorgu = @mysql_query("UPDATE uploads set silinmisMi = 1 WHERE dosyaKodu = '$item'");
			unlink("uploads/".$gVeri["dosyaAdi"]);
		}
		header("Location:index.php?s=adminPanel&sayfa=1");
	}else{
		header("Location:index.php?s=adminPanel&sayfa=1");
	}
?>