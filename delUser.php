<?php
 include_once "connessione.php";	// includo pagina di connessione al db

 $delUser=$_POST['cmbUtenti'];
 $Query01="DELETE FROM utenti WHERE ID_Utente = $delUser";
 $risultato=$conn->query($Query01); 
 header('Location:utenti.php');
 exit;		// chiudo connessione
?>
