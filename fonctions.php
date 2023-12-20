<?php
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
function authentification($user_name, $password)
{
    $conn = connexionDB();

    $sql = "SELECT * FROM `user` WHERE `user_name` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        // Checker si le password est le meme
        if ($user && password_verify($password, $user['pwd'])) {
            // start session et enregistrer user id et le role 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role_id'];

            if ($user['role_id'] == 1) { // Admin
                header("Location: ../admin/acceuilAdmin.php");
            } else {
                header("Location: produits.php");
            }
            exit();
        } else {
            header("Location: form.php");
            exit();
        }
    }
}

//fonction qui inscrit un nouvel utilisateur
function register($user_name, $email, $pwd, $street_name, $street_nb, $city, $province, $zip_code, $country)
{
    $conn = connexionDB();

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $street_name = $_POST['street_name'];
    $street_nb = $_POST['street_nb'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $country = $_POST['country'];

    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

    // Insertion dans la table user les infos entrées par le user
    $sql_user = "INSERT INTO `user` (`user_name`, `email`, `pwd`, `role_id`) VALUES ('$user_name', '$email', '$hashed_password', (SELECT `id` FROM `role` WHERE `name` = 'client'))";

    if (mysqli_query($conn, $sql_user)) {
        // Obtenir id du user
        $user_id = mysqli_insert_id($conn);

        // Insertion dans la table address
        $sql_address = "INSERT INTO `address` (`street_name`, `street_nb`, `city`, `province`, `zip_code`, `country`)
                        VALUES ('$street_name', '$street_nb', '$city', '$province', '$zip_code', '$country')";

        if (mysqli_query($conn, $sql_address)) {

            $address_id = mysqli_insert_id($conn);

            // updating la table user avec l id 
            $sql_update_user = "UPDATE `user` SET `billing_address_id` = $address_id, `shipping_address_id` = $address_id
                                WHERE `id` = $user_id";

            if (mysqli_query($conn, $sql_update_user)) {
                header("Location: profil.php");
            } else {
                echo "Error" ;
            }
        }
    }
}


//fonction qui modifie le mot de passe
function UpdatePassword($id, $mot_de_passe)
{
    $conn = connexionDB();
    $sql = "UPDATE user SET pwd=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $mot_de_passe, $id);
    $result = $stmt->execute();
    if ($result) {
        header('Location: profil.php');
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
function deleteUserByid($id)
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
function addProduct($name, $quantity, $price, $description)
{
    $conn = connexionDB();
    $sql = "INSERT INTO product (name, price, quantity, description) values (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siis", $name, $price, $quantity,$description);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    if ($result) {
        echo "Ajout fait";
        header("Location: ./admin/acceuilAdmin.php");
        exit();
    } else {
        echo "Erreur durant l'ajout du produit";
    }
    $stmt->close();
    $conn->close();
}


//fonction qui recupere un produit par son id
function getProductById($id)
{
    $conn = connexionDB();
    $sql = "SELECT id, name, quantity, price, description FROM product ";
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
        $sql = "DELETE FROM product where id = ?";
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
function addCommand($total)
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



//fonction qui recupere une commande par son id
function getCommandById($id)
{
    $conn = connexionDB();
    $sql = "SELECT * FROM user_order where id=?";
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

        $sql = 'DELETE FROM user_order where id = ?';
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
