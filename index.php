<?php @session_start(); ?>
<html>
<head>
	<title>Dosya Paylaşım Sitesi</title>
	<link rel="stylesheet" href="css/stil.css">
</head>
<body>
	<!-- Container Divi  -->
	<div class="container">
		
		<!-- Header -->
		<div class="header">
			
			<div class="logo">
				<a href="index.php?s=anasayfa"><img src="images/logo.png" width="90%" height="60%" /></a>
			</div>
			<div class="links">
				<ul>
					<li><a href="index.php?s=anasayfa">Anasayfa</a></li>
					<li><a href="index.php?s=upload">Dosya Gönder</a></li>
					<li><a href="index.php?s=download">Dosya İndir</a></li>
					<li><a href="#">Yardım</a></li>
					<li style="margin-left:75%"><img src="images/admin.png" width="15%" height="5%" style="float:left; margin-top:-7%"/>
						
							<?php
								if(isset($_SESSION["giris"])){?><a href="index.php?s=admin">Yönetici Çıkış</a>
																<a href="index.php?s=adminPanel" style="margin-left:5%">Panele Git</a><?php
								}else{ ?><a href="index.php?s=admin">Yönetici Giriş</a><?php } 
							?>
						
					</li>
				</ul>
			</div>
			<b>Dosya Paylaşım Sistemi</b>
		</div>
		<!-- Header Son -->
		
		<div class="ortaBolum">
			<?php
				if(isset($_GET["s"]))
					include($_GET["s"].".php");
				else
					include("anasayfa.php");
			?>
		
		</div>
	</div>
	<!-- Container Divi Son -->
</body>
</html>