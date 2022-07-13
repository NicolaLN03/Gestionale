<?php
 include_once "connessione.php";	// includo pagina di connessione al db

 $delProdServ=$_POST['cmbProdServ'];
 $Query01="DELETE FROM servizi_prodotti WHERE ID_serv_prod = $delProdServ";
 $risultato=$conn->query($Query01); 
 if(!risultato)
 {
     die("Non è possibile eliminare l'elemento in quanto è in relazione con un'altra entità " .mysql_error());
 }
 header('Location:servizi_prodotti.php');
 exit;		// chiudo connessione
?>

