<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}


//fonction de connexion a la DB
function connexionDB()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "ecom1_projet";
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    if (!$conn) {
        die("Erreur de connexion => " . mysqli_connect_error());
    }
    return $conn;
}


//fonction d'authentification de l'utilisateur
function authentification($email, $mot_de_passe)
{
    $conn = connexionDB();
    $sql = "SELECT * FROM  user wHERE email =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $utilisateur = $stmt->get_result();

    if ($utilisateur->num_rows >= 1) {
        $utilisateur = $utilisateur->fetch_assoc();
        if (password_verify($mot_de_passe, $utilisateur['pwd'])) {
            $_SESSION['utilisateur'] = $utilisateur['id'];
            $_SESSION['user_id'] = $utilisateur['id'];
            $_SESSION['utilisateur_nom'] = $utilisateur['nom'];
            $_SESSION['utilisateur_add'] = $utilisateur['addresse'];
            $_SESSION['utilisateur_email'] = $utilisateur['email'];
            $_SESSION['utilisateur_pscode'] = $utilisateur['postal_code'];
            $_SESSION['utilisateur_prenom'] = $utilisateur['prenom'];
            $_SESSION['roleU'] = $utilisateur['roleU'];
            header('Location: ./index.php');
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur introuvable";
    }
}

//fonction d'enregistrement d'un utilisateur
function register($nom, $email, $mot_de_passe)
{
    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $conn = connexionDB();
    $sql = "INSERT INTO user(nom,email,mot_de_passe,roleU) VALUES (?,?,?,?)";
    $user = "Client";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nom, $email, $mot_de_passe, $user);
    $result = $stmt->execute();
    if ($result) {
        header('Location: ./connexion.php');
    } else {
        echo "Erreur";
    }
}

//fonction qui modifie le mot de passe
function UpdatePassword($id, $mot_de_passe)
{
    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $conn = connexionDB();
    $sql = "UPDATE user SET mot_de_passe=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $mot_de_passe, $id);
    $result = $stmt->execute();
    if ($result) {
        header('Location: ./myProfile.php');
    } else {
        echo "Erreur";
    }
}


//fonction qui recupere tous les utilisateurs
function getAllUsers()
{
    $conn = connexionDB();
    $sql = "SELECT * FROM user;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->get_result();
    $users = array();
    foreach ($resultats as $user) {
        $users[] = $user;
    }
    return $users;
}


//fonction qui recupre un utilisateur par son id
function getUserById($id)
{
    $conn = connexionDB();
    $sql = "SELECT * FROM user where id=?; ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    return $user;
}


//Fonction qui supprime un utilisateur en utilisant l'id
function deleteUser($id)
{
    $conn = connexionDB();
    $user = getUserById($id);
    if ($user) {
        $sql = 'DELETE FROM user where id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        if ($result) {
            echo "utilisateur supprimé";
            exit();
        } else {
            echo "Erreur";
        }
    } else {
        echo "Utilisateur introuvable";
    }
}


//fonction ajouter produit
function addProduct($name, $price, $quantity){
    $conn = connexionDB();
    $sql = "Insert into product (name, price, quantity) values (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $name, $price, $quantity);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    if ($result) {
        echo "Ajout fait"; 
        exit();
    } else {
        echo "Erreur durant l'ajout du produit";
    }
    $stmt->close();
    $conn->close();
}


//fonction qui recupere tous les produits
function getAllProducts()
{
    $conn = connexionDB();
    $sql = "SELECT p.id, p.nom,p.item_description,p.prix,p.taille,p.couleur,p.quantite, i.chemin FROM product p" ;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->get_result();
    $products = array();
    foreach ($resultats as $product) {
        $products[] = $product;
    }
    return $products;
}

//fonction qui recupere un produit par son id
function getProductById($id)
{
    $conn = connexionDB();
    $sql = "SELECT p.id, p.nom,p.item_description,p.prix,p.taille,p.couleur,p.quantite, i.chemin FROM product p";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_assoc();
    return $products;
}


//fonction qui supprime un produit par son id
function deleteProductById($id)
{
    $conn = connexionDB();

    $product = getProductById($id);
    if ($product) {

        $sql = 'DELETE FROM product where id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        if ($result) {
            echo "Suppression faite";
            exit();
        }
    } else {
        echo "Erreur durant la suppression";
    }
}


//fonction qui rajoute une commande
function addCommand($total, $id_utilisateur)
{
    $conn = connexionDB();
    $sql = "INSERT INTO user_order(ref,total,date,user_id) values(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('dsi', $ref, $total, $date, $user_id);
    $resultat = $stmt->execute();
    if ($resultat) {
        echo "Commande ajoutée avec succes";
    }
}


//fonction qui recupere toutes les commandes
function getAllCommands()
{
    $conn = connexionDB();
    $sql = "SELECT * FROM user_order";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->get_result();
    $commands = array();
    foreach ($resultats as $command) {
        $commands[] = $command;
    }
    return $commands;
}


//fonction qui recupere une commande par son id
function getCommandById($id)
{
    $conn = connexionDB();
    $sql = "SELECT * FROM order_has_product where order_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();
    $commands = array();
    foreach ($results as $command) {
        $commands[] = $command;
    }
    return $commands;
}



//fonction qui supprime une commande par son id
function deleteCommandById($id)
{
    $conn = connexionDB();

    $command = getCommandById($id);
    if ($command) {

        $sql = 'DELETE FROM user_order where order_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        if ($result) {
            echo "Commande supprimée avec succes";
            exit();
        }
    } else {
        echo "Erreur durant la suppression";
    }
}


?>

