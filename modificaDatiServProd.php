<?php
include_once "connessione.php";
session_start();



$nome_prod_serv = $_POST['txtNomeProdServ'];
$descrizione  = $_POST['txtDescrizione'];
$disponibilita  = $_POST['txtDisponibilita'];
$costo = $_POST['txtCosto'];
$sconto = $_POST['txtSconto'];


$stmt = $conn->prepare("UPDATE servizi_prodotti SET  descrizione=?, disponibilita=?, costo=?, sconto=? WHERE nome_prod_serv = ?");
$stmt->bind_param("sssss", $descrizione, $disponibilita, $costo, $sconto, $nome_prod_serv);
$stmt->execute();

$risultato = $stmt->get_result();

header('Location:servizi_prodotti.php');

?>