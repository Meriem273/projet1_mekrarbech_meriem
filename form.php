<html>
<head>
   <title> Formulaire </title>
   <link rel="stylesheet" href="form.css">
   <script src="https://kit.fontawesome.com/3ad2fd06ba.js" crossorigin="anonymous"></script>
</head>
<body>
	   
	    <div class="nav-area">
			<div class="logo">BeautéM</div>
			<ul class="menu-area">
				<li><a href="index.php">Acceuil</a></li>
                <li><a href="form.php">Connexion/Inscription </a></li>
                <li><a href="commandes.php">Panier </a></li>   
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
                     <button type="submit" class="submit-btn" name="submit">Se connecter</button>
       	  		   </form>
       	  		   <button type="button" class="btn" onclick="openINSCRIPTION()">Je suis nouveau ici</button>
       	        </div>
             
       	  		<div class="card-back">
                    <h2> INSCRIPTION </h2>
       	  		    <form action="inscription.php" method="post">
                     <input type="text" class="input-box" placeholder="Entrez votre nom et votre prénom" name="nomprenom" required>
                     <input type="text" class="input-box" placeholder="Entrez votre adresse" name="adresse" required>
                      <input type="tel" class="input-box" placeholder="Entrez votre numéro de téléphone" name="tel" required>
                      <input type="email" class="input-box" placeholder="Entrez votre email" name="email" required>
                      <input type="password" class="input-box" placeholder="Entrez votre mot de passe" name="password" required>
                      <button type="submit" class="submit-btn" name="s">S'inscrire</button>
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