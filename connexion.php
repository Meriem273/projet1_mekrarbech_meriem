<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
       
        
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "ecom1_projet";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Pas de connexion dans la base de données');
        }
        else {
            $Select = "SELECT email FROM connexion WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO connexion(email, password) values(?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ss",$email, $password);
                if ($stmt->execute()) {
                    echo "Tout a été bien enregistré";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Quelqu'un a déjà enregistré avec cet email";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "Tous les champs sont obligatoires";
        die();
    }
}
else {
    echo "Le boutton valider n'a pas été cliqué";
}
?>