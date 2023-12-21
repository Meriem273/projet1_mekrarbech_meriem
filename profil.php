<?php 
include './fonctions.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['update'])){
    $conn=connexionDB();
    //recuperer l'id
    $user_id = $_SESSION['user_id'];
    //recuperer les champs entrés par le user pour modifier son profil
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    //verifier si tout a ete correctement entrés
    if (empty($user_name) || empty($email) || empty($fname) || empty($lname)) {
        echo "Faites entrer toutes les informations";
        exit();
    }
    //update tout ça dans la bdd
    $sql = "UPDATE `user` SET `user_name` = '$user_name', `email` = '$email', `fname` = '$fname', `lname` = '$lname' WHERE `id` = $user_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: profil.php");
    } else {
        echo "Error ";
        exit();
    }
}

if (isset($_POST['enregistrer'])) {
    //recuperer ce que le user a fait entrer
    $password = $_POST['pwdNew'];
    if (!empty($password)) {
        UpdatePassword($user_id, $password);  //utiliser une fonction pour changer le password
    } else {
        header("Location: profil.php");
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
		</ul>
	</div>

	<div class="container">
		<div class="card">
			<div class="inner-box" id="card">

				<div class="card-front">
					<h2> Mon profil </h2>
					<form action="" method="post">
						<input type="text" class="input-box" placeholder="user name" name="user_name" required>
						<input type="email" class="input-box" placeholder="email" name="email" required>
                        <input type="text" class="input-box" placeholder="first name" name="fname" required>
                        <input type="text" class="input-box" placeholder="last name" name="lname" required>
						<button type="submit" class="submit-btn" name="update">Enregistrer</button>
					</form>
                    <button type="button" class="btn" onclick="openINSCRIPTION()">Changer mot de passe</button>
				</div>

                <div class="card-back">
					<h2> Changer mot de passe </h2>
					<form action="" method="post">
                        <input type="password" class="input-box" placeholder="nouveau mot de passe" name="pwdNew" required>
						<button type="submit" class="submit-btn" name="enregistrer">Enregistrer</button>
					</form>
					<button type="button" class="btn" onclick="openCONNEXION()">Afficher profil</button>
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