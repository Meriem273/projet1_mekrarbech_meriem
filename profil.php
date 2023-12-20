<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['update'])){

    $conn=connexionDB();

    $user_id = $_SESSION['user_id'];

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    if (empty($user_name) || empty($email) || empty($fname) || empty($lname)) {
        echo "Faites entrer toutes les informations";
        exit();
    }

    $sql = "UPDATE `user` SET `user_name` = '$user_name', `email` = '$email', `fname` = '$fname', `lname` = '$lname' WHERE `id` = $user_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: profil.php");
    } else {
        echo "Error ";
        exit();
    }
}
}

mysqli_close($conn);
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
				</div>
            </div>
        </div>
    </div>
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