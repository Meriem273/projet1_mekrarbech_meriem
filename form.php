<?php
include './fonctions.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['submit'])) {
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		if (!empty($user_name) && !empty($password)) {
			authentification($user_name, $password);
		}else {
		header("Location: index.php");
		exit();
		}
	}
	if (isset($_POST['register'])) {
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		$street_name = $_POST['street_name'];
		$street_nb = $_POST['street_nb'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$zip_code = $_POST['zip_code'];
		$country = $_POST['country'];
		if (!empty($user_name) && !empty($email) && !empty($pwd) && !empty($street_name) && !empty($street_nb) && !empty($city) && !empty($province) && !empty($zip_code) && !empty($country)) {
			$result = register($user_name, $email, $pwd, $street_name, $street_nb, $city, $province, $zip_code, $country);
		}else {
			header("Location: index.php");
			exit();
		}
	}
}
?>
<html>

<head>
	<title> Formulaire </title>
	<link rel="stylesheet" href="./css/form.css">
	<script src="https://kit.fontawesome.com/3ad2fd06ba.js" crossorigin="anonymous"></script>
</head>

<body>

	<div class="nav-area">
		<div class="logo">BeautéM</div>
		<ul class="menu-area">
			<li><a href="index.php">Acceuil</a></li>
			<li><a href="form.php">Connexion/Inscription </a></li>
			<li><a href="commandes.php">Mon panier </a></li>
		</ul>
	</div>

	<div class="container">
		<div class="card">
			<div class="inner-box" id="card">

				<div class="card-front">
					<h2> CONNEXION </h2>
					<form action="" method="post">
						<input type="text" class="input-box" placeholder="Entrez votre user name" name="user_name" required>
						<input type="password" class="input-box" placeholder="Entrez votre mot de passe" name="password" required>
						<button type="submit" class="submit-btn" name="submit">Se connecter</button>
					</form>
					<button type="button" class="btn" onclick="openINSCRIPTION()">Je suis nouveau ici</button>
				</div>

				<div class="card-back">
					<h2> INSCRIPTION </h2>
					<form action="" method="post">
						<input type="text" class="input-box" placeholder="user name" name="user_name" required>
						<input type="email" class="input-box" placeholder="email" name="email" required>
						<input type="password" class="input-box" placeholder="mot de passe" name="pwd" required>
						<input type="text" class="input-box" placeholder="nom de rue" name="street_name" required>
						<input type="text" class="input-box" placeholder="numero de rue" name="street_nb" required>
						<input type="text" class="input-box" placeholder="ville	" name="city" required>
						<input type="text" class="input-box" placeholder="province" name="province" required>
						<input type="text" class="input-box" placeholder="zip_code" name="zip_code" required>
						<input type="text" class="input-box" placeholder="pays" name="country" required>
						<button type="submit" class="submit-btn" name="register">S'inscrire<a href="form.php"></a></button>
					</form>
					<button type="button" class="btn" onclick="openCONNEXION()">J'ai un compte</button>
				</div>

			</div>
		</div>
	</div>


	<script>
		var card = document.getElementById("card");

		function openINSCRIPTION() {
			card.style.transform = "rotateY(-180deg)";
		}

		function openCONNEXION() {
			card.style.transform = "rotateY(0deg)";
		}
	</script>

	<footer>
		<div class="main-content">
			<div class="left box">
				<h2>About us </h2>
				<div class="content">
					<p>Fondée à Montréal par Meriem , en 2023, BeautéM a rapidement acquis une réputation d’expert de la beauté.Ses équipes d’experts conseil, assurent, par leur énergie et leur enthousiasme, un service d’exception .</p>
					<div class="social">
						<a href="#"><span class="fab fa-facebook-f"></span></a>
						<a href="#"><span class="fab fa-twitter"></span></a>
						<a href="#"><span class="fab fa-instagram"></span></a>
						<a href="#"><span class="fab fa-youtube"></span></a>
					</div>
				</div>
			</div>
			<div class="center box">
				<h2>Adresse </h2>
				<div class="content">
					<div class="place">
						<span class="fas fa-map-marker-alt"></span>
						<span class="text">Montréal, Canada</span>
					</div>
					<br>
					<br>
					<div class="email">
						<span class="fas fa-envelope"></span>
						<span class="text">BeautéM@gmail.com</span>
					</div>
					<br>
					<br>
					<div class="phone">
						<span class="fas fa-phone-alt"></span>
						<span class="text">+213797454621</span>
					</div>
				</div>
			</div>
			<div class="right box">
				<h2>BeauteM</h2>
				<div class="content">
					<div class="copyright"> Copyright © Tous droits réservés, BeautéM 2023
					</div>
				</div>
			</div>
	</footer>

</body>

</html>