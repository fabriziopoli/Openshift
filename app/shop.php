<?php 
include_once('../db.php');

$anz_artikel = $conn->query('SELECT count(id) as anz_artikel FROM warenkorb');
foreach($anz_artikel as $a) { $anz_artikel = $a['anz_artikel']; }
?>
<!DOCTYPE html>
<html lang="de-CH">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="/openshift/public/img/Openshift Logo Schwarz.png">
    <title>Openshift Shop</title>
    <base href="/openshift/">
    <link rel="stylesheet" href="/openshift/public/css/app.css?ver=1.5">
    <script src="/openshift/public/js/app.js?ver=1.5"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Icons (fontawesome) -->
    <script src="https://kit.fontawesome.com/75d5cdc9c3.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<a href="/openshift/" title="Home"><img src="/openshift/public/img/Openshift Logo Schwarz.png" alt="Logo" /></a>
		<div>
			<menu>
				<button class="menubutton-close" onclick="$('menu').removeClass('open')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"></path></svg></button>
				<a href="/openshift/" title="Home">Home</a>
				<a href="/openshift/app/shop.php" class="active" title="Shop">Shop</a>
				<a href="/openshift/app/about_us.php" title="About Us">About Us</a>
			</menu>
			<a href="/openshift/app/cart.php" title="Cart"><i class="fa-solid fa-cart-shopping"></i><span id="anz_artikel" <?= $anz_artikel == 0 ? 'style="display:none;"' : '' ?>><?= $anz_artikel ?></span></a>
			<button class="menubutton" onclick="$('menu').addClass('open')"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="4" y="7.5" width="16" height="1.5"></rect><rect x="4" y="15" width="16" height="1.5"></rect></svg></button>
		</div>
	</header>
    
	<main>
		<h1 class="center">Shop</h1>
		<div class="holder">
			<?php
			$products = $conn->query('SELECT * FROM artikel');
			
			foreach($products as $p) {
			?>
				<div class="product">
					<div class="product-img" style="background-image: url(/openshift/public/img/<?= $p['bild'] ?>), url(/openshift/public/img/not-found.webp);"></div>
					<span class="product-name"><?= $p['name'] ?></span>
					<span class="product-price"><?= $p['preis'] ?> CHF</span>
					<span class="product-stock"><?= $p['anz'] ?> Auf Lager</span>
					<a class="button product-btn" onclick="addArtikel(<?= $p['id'] ?>)">In den Warenkorb</a>
				</div>
			<?php
			}
			?>
		</div>
        <div class="abstand"></div>
	</main>

	<footer>
		<div>
			<div class="social">
				<a><i class="fa-brands fa-instagram"></i></a>
				<a><i class="fa-brands fa-x-twitter"></i></a>
				<a><i class="fa-brands fa-tiktok"></i></a>
				<a><i class="fa-brands fa-facebook"></i></a>
			</div>
			<div class="contact">
				<h2>Kontakt</h2>
				<form>
					<label>Name: <input type="text" name="name" required/></label>
					<label>E-Mail: <input type="text" name="email" required/></label>
					<label class="textarea">Nachricht: <textarea name="message" required></textarea></label>
					<button type="submit" name="submit-contact" class="button">Senden</button>
				</form>
			</div>
			<div class="links">
				<a href="" title="Impressum">Impressum</a>
				<a href="" title="Datenschutz">Datenschutz</a>
				<a href="" title="AGB">AGB</a>
			</div>
		</div>
	</footer>
</body>
</html>
