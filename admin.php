<?php
	@session_destroy();
	if(isset($_SESSION["giris"])){
		header("Location:index.php?s=adminPanel");
	}else{

		if(isset($_POST["kadi"]) and isset($_POST["sifre"])){
			$kadi = @strip_tags($_POST["kadi"]);
			$sifre = @strip_tags($_POST["sifre"]);
			
			if(($kadi == "admin") and ($sifre == "admin")){
				session_start();
				$_SESSION["giris"] = $kadi;
				echo $_SESSION["giris"];
				header("Location:index.php?s=adminPanel");
			}
		}
	}
?>

<html>
<head>
	<link rel="stylesheet" href="css/admin.css" />
</head>
<body>
	
	<div class="ortaKisim">
		<span style="color:#009900">Admin Paneli Giriş</span>
		<form name="" action="" method="post">
		<img src = "images/logo.png" />
		<div class="form-style-5">
			<table>
				<tr>
					<td><label>Kullanıcı Adı</label></td>
					<td><label>:</label></td>
					<td><input type="text" name="kadi" placeholder="Kullanıcı Adı"/></td>
				</tr>
				<tr>
					<td><label>Şifre</label></td>
					<td><label>:</label></td>
					<td><input type="password" name="sifre" placeholder="Şifre"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="Giriş" name="loginButton"/></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
</body>
</html>