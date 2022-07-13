<html>
<head>
 <title></title>
  <link href="stile.css" rel="stylesheet" typr="text/css">
</head>
<header>
<h1>AREA ADMIN</h1>
<br>
<nav>
  <ul>
    <li><a href="utenti.php" title="Query">GESTIONE UTENTI</a></li>
    <li><a href="servizi_prodotti.php" title="Query">GESTIONE SERVIZI/PRODOTTI</a></li>
    <li><a href="ordini.php" title="Query">GESTIONE ORDINI</a></li>
    <li><a href="logout.php" title="Query">LOGOUT</a></li>
  </nav>
</header>
<body>
<br>
<form method="POST" action="ImpostaStatoOrdine.php">
    <h3>Scegli prodotto/servizio da modificare: </h3>
    <select name="cmbOrdine">
        <?php
            include_once "connessione.php";	
            $Query="SELECT ID_Ordini FROM ordini;"; 
            $risultato=$conn->query($Query);  
            while ($riga=mysqli_fetch_array ($risultato))
            {
             echo "<option value=\"".$riga['ID_Ordini']."\">"; 
             echo   $riga['ID_Ordini'];    
             echo "</option>";
            }
        ?>
    </select>
    <select name="cmbStatoOrdine">
        <?php
            include_once "connessione.php";	
            $Query="SELECT ID_stato, nome_stato FROM stato_ordine;"; 
            $risultato=$conn->query($Query);  
            while ($riga=mysqli_fetch_array ($risultato))
            {
             echo "<option value=\"".$riga['ID_stato']."\">"; 
             echo   $riga['nome_stato'];    
             echo "</option>";
            }
        ?>
    </select>
    <input type="submit" value="IMPOSTA STATO DELL'ORDINE" />  
</form>
<br>
    <?php
        include_once "connessione.php";
        $query = "SELECT ID_Ordini, nome_azienda, nome_prod_serv, nome_stato
                  FROM ordini
                  JOIN stato_ordine ON fk_id_stato_ordine = ID_stato
                  JOIN utenti ON fk_id_utente = ID_Utente
                  JOIN servizi_prodotti ON ordini.fk_id_serv_prod = ID_serv_prod;";
        $risultato=$conn->query($query); 
        if ($risultato==FALSE) 	// se ci sono problemi
        {
            echo "Query con errori: <br>";
            echo mysqli_error($conn); 	// scrivo eventuali errori
        }
        else
        {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID dell'ordine</th> <th>Cliente</th> <th>Servizio/Prodotto</th> <th>Stato dell'ordine</th>"; 	// intestazione tabella
            echo"</tr>"; 			
            while ($riga=mysqli_fetch_array($risultato,MYSQLI_ASSOC)) 
            {
                echo"<tr>";		// scrivo le righe nella tabella
                echo"<td>".$riga['ID_Ordini']."</td> <td>".$riga['nome_azienda']."</td> <td>".$riga['nome_prod_serv']."</td> <td>".$riga['nome_stato']."</td>";
                echo"</tr>";
            }
            echo"</table><br/><br/>";
        }// fine else
        mysqli_close($conn);
    ?>
</body>
</html>