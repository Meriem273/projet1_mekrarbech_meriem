<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: form.php");
    exit();
}

//recuperer le role
$user_role = $_SESSION['user_role'];

// si ce n'est pas un admin le rediriger 
if ($user_role != 1) {
    header("Location: ../../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title> Page Admin</title>
	<link rel="stylesheet" href="./css/form.css">
	<script src="https://kit.fontawesome.com/3ad2fd06ba.js" crossorigin="anonymous"></script>
</head>

<body>

	<div class="nav-area">
		<div class="logo">BeautéM</div>
		<ul class="menu-area">
			<li><a href="index.php">Acceuil</a></li>
			<li><a href="ajouterProduit.php">Ajouter produit </a></li>
            <li><a href="supprimerProduit.php">Supprimer produit </a></li>
			<li><a href="supprimerUtilisateur.php">Supprimer utilisateur</a></li>
            <li><a href="supprimerCommande.php">Supprimer commande </a></li>
            <li><a href="logout.php">Se déconnecter </a></li>
		</ul>
	</div>
</body>
</html>
