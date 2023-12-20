<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $result = addProduct($name, $quantity, $price, $description);
    }
}
?>


<html>

<head>
    <title> Ajouter Produit </title>
    <link rel="stylesheet" href="./css/form.css">
    <script src="https://kit.fontawesome.com/3ad2fd06ba.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="nav-area">
        <div class="logo">BeautéM</div>
        <ul class="menu-area">
        </ul>
    </div>

    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">

                <div class="card-front">
                    <h2> Ajouter Produit </h2>
                    <form action="" method="post">
                        <input type="text" class="input-box" placeholder="Nom Produit" name="name" required>
                        <input type="text" class="input-box" placeholder="Quantité Produit" name="quantity" required>
                        <input type="text" class="input-box" placeholder="Prix Produit" name="price" required>
                        <input type="text" class="input-box" placeholder="Description Produit" name="description" required>
                        <button type="submit" class="submit-btn" name="add">Ajouter le produit</button>
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