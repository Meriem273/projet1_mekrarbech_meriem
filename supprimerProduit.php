<?php
include './fonctions.php';
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteProductById($id);
}
?>