<?php
include_once "connessione.php";
session_start();

$nome_azienda = $_POST['txtNomeAzienda'];
$nome_rappresentante = $_POST['txtNomeRappresentante'];
$email = $_POST['txtEmail'];
$telefono = $_POST['txtNumCell'];
$indirizzo = $_POST['txtIndirizzo'];


$stmt = $conn->prepare("UPDATE utenti SET  nome_azienda=?, email=?, numero_telefono=?, indirizzo=? WHERE nome_rappresentante = ?");
$stmt->bind_param("sssss", $nome_azienda, $email, $telefono, $indirizzo, $nome_rappresentante);
$stmt->execute();

$risultato = $stmt->get_result();

header('Location:utenti.php');

?>