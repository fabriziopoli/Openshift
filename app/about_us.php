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
    <link rel="icon" type="image" href="/public/img/Openshift Logo Schwarz.png">
    <title>Openshift Shop</title>
    <base href="/">
    <link rel="stylesheet" href="/public/css/app.css?ver=1.5">
    <script src="/public/js/app.js?ver=1.5"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Icons (fontawesome) -->
    <script src="https://kit.fontawesome.com/75d5cdc9c3.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<a href="/" title="Home"><img src="/public/img/Openshift Logo Schwarz.png" alt="Logo" /></a>
		<div>
			<menu>
				<button class="menubutton-close" onclick="$('menu').removeClass('open')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"></path></svg></button>
				<a href="/" title="Home">Home</a>
				<a href="/app/shop.php" title="Shop">Shop</a>
				<a href="/app/about_us.php" class="active" title="About Us">About Us</a>
			</menu>
			<a href="/app/cart.php" title="Cart"><i class="fa-solid fa-cart-shopping"></i><span id="anz_artikel" <?= $anz_artikel == 0 ? 'style="display:none;"' : '' ?>><?= $anz_artikel ?></span></a>
			<button class="menubutton" onclick="$('menu').addClass('open')"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="4" y="7.5" width="16" height="1.5"></rect><rect x="4" y="15" width="16" height="1.5"></rect></svg></button>
		</div>
	</header>

	<main>
		<h1 class="center">Über Uns</h1>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   
        </p>
        <p>
            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet.
        </p>
        <div class="abstand"></div>
		<h1 class="center">Team</h1>
        <div class="holder">
            <div class="person">
                <div class="person-img" style="background-image: url(/public/img/Ghiath.jpg), url(/public/img/person-not-found.png);"></div>
                <span class="person-name">Ghiath Sardast</span>
                <span class="person-function">CEO and Founder</span>
            </div>
            <div class="person">
                <div class="person-img" style="background-image: url(), url(/public/img/person-not-found.png);"></div>
                <span class="person-name">Alejandro Facal</span>
                <span class="person-function">Projekt Manager</span>
            </div>
            <div class="person">
                <div class="person-img" style="background-image: url(), url(/public/img/person-not-found.png);"></div>
                <span class="person-name">Kris Huber</span>
                <span class="person-function">Tester</span>
            </div>
            <div class="person">
                <div class="person-img" style="background-image: url(/public/img/Fabrizio.jpg), url(/public/img/person-not-found.png);"></div>
                <span class="person-name">Fabrizio Poli</span>
                <span class="person-function">Programmer</span>
            </div>
            <div class="person">
                <div class="person-img" style="background-image: url(/public/img/Elias.jpg), url(/public/img/person-not-found.png);"></div>
                <span class="person-name">Elias Amstein</span>
                <span class="person-function">Programmer</span>
            </div>
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
