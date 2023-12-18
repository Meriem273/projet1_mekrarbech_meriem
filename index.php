
<?php
include './fonctions.php';
?>
<html>

<head>
    <title> Acceuil</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/3ad2fd06ba.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <video src="im/pub.mp4" class="vid-bg" muted loop autoplay></video>
        <div class="nav-area">
            <div class="logo">BeauteM</div>
            <ul class="menu-area">
                <li><a href="profil.php">Mon profil</a></li>
                <li><a href="form.php">Connexion/Inscription </a></li>
                <li><a href="panier.php">Mon panier </a></li>
            </ul>
        </div>

        <div class="banner-text">
            <h2> Envie de connaitre les meilleurs produits chez BeauteM ? </h2>
            <h3> Achetez chez nous !</h3>
            <p>C'est pour cela que nous avons mis ce site à votre disposition .</p>
            <a href="form.php">ACHETEZ</a>
    </header>
    <footer>
        <div class="main-content">
            <div class="left box">
                <h2>About us </h2>
                <div class="content">
                    <p>Fondée à Montréal par Meriem, en 2021, BeautéM a rapidement acquis une réputation d’expert de la beauté.Ses équipes d’experts conseil, assurent, par leur énergie et leur enthousiasme, un service d’exception . </p>
                    <div class="social">
                        <a href="#"><span class="fab fa-facebook-f"></span></a>
                        <a href="#"><span class="fab fa-twitter"></span></a>
                        <a href="#"><span class="fab fa-instagram"></span></a>
                        <a href="#"><span class="fab fa-youtube"></span></a>
                    </div>
                </div>
            </div>
            <div class="center box">
                <h2> Adresse </h2>
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
                        <span class="text">+15149568233</span>
                    </div>
                </div>
            </div>
            <div class="right box">
                <h2>BeautéM</h2>
                <div class="content">
                    <div class="copyright"> Copyright © Tous droits réservés, BeautéM 2023
                    </div>
                </div>
            </div>
    </footer>

</body>