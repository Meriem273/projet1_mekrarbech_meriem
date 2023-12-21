<?php
include './fonctions.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
        $orderId = $_POST['id'];
        $ref = $_POST['ref'];
        $date = $_POST['date'];
    }
}

?>
<html>

<head>
    <title>Produits</title>
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
                <li><a href="panier.php">Mon panier </a></li>
            </ul>
        </div>

        <div class="banner-text">
            <h2> Envie de connaitre les meilleurs produits chez BeauteM ? </h2>
            <h3> Achetez chez nous !</h3>
            <p>C'est pour cela que nous avons mis ce site à votre disposition .</p>

    </header>

    <div class="site-section">
        <div class="site-section-inside">

            <div class="section-header">
                <h2> Nos Parfums </h2>
            </div>

        </div>

        <div class="feature-box">

            <img src="im/burberry.jpg" alt="qualité">
            <h4> BURBERRY </h4>
            <p> Eau De Parfum 35 ml</p>
            <h5> A Partir De 200$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>


        <div class="feature-box">

            <img src="im/chanel.jpg" alt="couleur">
            <h4> CHANEL N°5 </h4>
            <p> Eau De Parfum 35 ml </p>
            <h5> A Partir De 300$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>


        <div class="feature-box">

            <img src="im/Dior.jpg" alt="distribution">
            <h4> DIOR SAUVAGE </h4>
            <p> Eau De Parfum 60 ml</p>
            <h5> A Partir De 250$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>

        <div class="feature-box">

            <img src="im/Gucci.jpg" alt="distribution">
            <h4> GUCCI INTENSE OUD </h4>
            <p> Eau De Parfum Homme 90 ml</p>
            <h5> A Partir De 350$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>

        <div class="feature-box">

            <img src="im/lancome.jpg" alt="distribution">
            <h4> LANCOME LA NUIT TRÉSOR </h4>
            <p> Eau De Parfum 50 ml</p>
            <h5> A Partir 280$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>


        <div class="feature-box">

            <img src="im/yves_saint_laurent.jpg" alt="distribution">
            <h4> YVES SAINT LAURENT BLACK OPIUM </h4>
            <p> Eau de Parfum 90 ml</p>
            <h5> A Partir De 300$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>
        <div class="site-section-inside">

            <div class="section-header">
                <h2> Nos maquillages</h2>
            </div>

        </div>



        <div class="feature-box">

            <img src="im/B.jpg" alt="couleur">
            <h4> CHARLOTTE TILBURY </h4>
            <p> Matte revolution Rouge à lèvres </p>
            <h5> A Partir De 80$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>


        <div class="feature-box">

            <img src="im/C.jpg" alt="distribution">
            <h4> CHANEL </h4>
            <p> Fond De Teint Les BEIGES Teint Belle Mine Naturelle Hydratation Et Longue Tenue </p>
            <h5> A Partir De 120$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>

        <div class="feature-box">

            <img src="im/D.jpg" alt="distribution">
            <h4> HUDA BEAUTY </h4>
            <p> la Palette Naughty Nude </p>
            <h5> A Partir De 60$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>

        <div class="site-section-inside">

            <div class="section-header">
                <h2> Nos Soins Capillaires </h2>
            </div>

        </div>

        <div class="feature-box">

            <img src="im/10.jpg" alt="qualité">
            <h4> KERASTASE </h4>
            <p> La Gamme complète</p>
            <h5> A Partir De 150$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>



        <div class="feature-box">

            <img src="im/12.jpg" alt="distribution">
            <h4> OLAPLEX </h4>
            <p> Soin Capillaire NO.3 Hair Perfector </p>
            <h5> A Partir De 90$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>

        <div class="feature-box">

            <img src="im/13.jpg" alt="distribution">
            <h4> BEAUTEM COLLECTION </h4>
            <p> Gommage Lavant Cheveux Menthe Poivrée (100g) </p>
            <h5> A Partir De 65$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>

        <div class="site-section-inside">

            <div class="section-header">
                <h2> Nos Soins Corps Et Visages </h2>
            </div>
        </div>

        <div class="feature-box">

            <img src="im/02.jpg" alt="couleur">
            <h4> CLARINS </h4>
            <p> Crème Eclat Du Jour 30 ml </p>
            <h5> A Partir De 50$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>


        <div class="feature-box">

            <img src="im/03.jpg" alt="distribution">
            <h4> BEAUTEM COLLECTION </h4>
            <p> Gamme Bain</p>
            <h5> A Partir De 40$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>

        <div class="feature-box">

            <img src="im/04.jpg" alt="distribution">
            <h4> NUXE </h4>
            <p> Gel Nettoyant et Démaquillant Visage Rêve de Miel 400 ml </p>
            <h5> A Partir De 65$ </h5>
            <input type="submit" name="save" value="Achetez">
        </div>

    </div>





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