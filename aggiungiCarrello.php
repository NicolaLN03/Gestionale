<?php
include_once "connessione.php";


$IDProdotto = $_POST['cmbCarrello'];
$toInsert = "INSERT INTO carrello (fk_id_serv_prod) VALUES
(?)";

$query = $conn->prepare($toInsert);
$query->bind_param("i", $IDProdotto);
$query->execute();
header('Location: dashboard.php');
    
?>