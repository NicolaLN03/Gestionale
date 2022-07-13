<?php
include_once "connessione.php";
session_start();

$ID_ordine = $_POST['cmbOrdine'];
$nome_stato = $_POST['cmbStatoOrdine'];

$stmt = $conn->prepare("UPDATE ordini SET fk_id_stato_ordine = ? WHERE ID_Ordini = ?");
$stmt->bind_param("si", $nome_stato, $ID_ordine);
$stmt->execute();

$risultato = $stmt->get_result();

header('Location:ordini.php');

?>