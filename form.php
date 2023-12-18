<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];
    if (!empty($email) && !empty($mot_de_passe)) {
        authentification($email, $mot_de_passe);
    }
}


if (isset($_POST['register'])) {
    $nom = $_POST['user_name'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];
    $c_mot_de_passe = $_POST['c-mot_de_passe'];
    if (!empty($nom) && !empty($email) && !empty($mot_de_passe) && !empty($c_mot_de_passe)) {
        if ($mot_de_passe === $c_mot_de_passe) {
            register($nom, $email, $mot_de_passe);
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
				<li><a href="profil.php">Mon profil</a></li>
                <li><a href="form.php">Connexion/Inscription </a></li>
                <li><a href="commandes.php">Mon panier </a></li>   
            </ul>
        </div> 
        
       	  <div class="container">
       	  <div class="card">
       	  	<div class="inner-box" id="card">

       	  		<div class="card-front">
       	  		   <h2> CONNEXION </h2>
       	  		   <form action="connexion.php" method="post">
                     <input type="email" class="input-box" placeholder="Entrez votre email" name="email" required>
                     <input type="password" class="input-box" placeholder="Entrez votre mot de passe" name="password" required>
                     <button type="submit" class="submit-btn" name="submit">Se connecter<a href="produits.php"></a></button>
       	  		   </form>
       	  		   <button type="button" class="btn" onclick="openINSCRIPTION()">Je suis nouveau ici</button>
       	        </div>
             
       	  		<div class="card-back">
                    <h2> INSCRIPTION </h2>
       	  		    <form action="inscription.php" method="post">
                     <input type="text" class="input-box" placeholder="Entrez votre nom et votre prénom" name="user_name" required>
                      <input type="email" class="input-box" placeholder="Entrez votre email" name="email" required>
                      <input type="password" class="input-box" placeholder="Entrez votre mot de passe" name="password" required>
                      <button type="submit" class="submit-btn" name="register">S'inscrire</button>
       	  		   </form>
       	  		   <button type="button" class="btn" onclick="openCONNEXION()">J'ai un compte</button>
          	    </div>

       	    </div>
           </div>
          </div>

           
      <script>
      	 
      	 var card=document.getElementById("card");

      	 function openINSCRIPTION(){
      	 	card.style.transform="rotateY(-180deg)";
      	 }

      	 function openCONNEXION(){
      	 	card.style.transform="rotateY(0deg)";
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
       		<h2>SephoraMosta</h2>
       		<div class="content">
       		<div class="copyright"> Copyright © Tous droits réservés, BeautéM 2023
       		</div>
       	</div>
       </div>
    </footer>

</body>
</html>