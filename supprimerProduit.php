<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteProductById($id);
}
?>