<html>
<head>
 <title></title>
  <link href="stile.css" rel="stylesheet" typr="text/css">
</head>
<header>
<h1>AREA CLIENTE</h1>
<br>
<nav>
  <ul>
  <li><a href="carrello.php" title="Query">CARRELLO</a></li>
    <li><a href="logout.php" title="Query">LOGOUT</a></li>
  </nav>
</header>
<body>
<br>

<form method="POST" action="aggiungiCarrello.php">
    <h3>Scegli prodotto/servizio da aggiungere al carrello: </h3>
    <select name="cmbCarrello">
        <?php
            include_once "connessione.php";	
            $Query="SELECT ID_serv_prod, nome_prod_serv FROM servizi_prodotti;"; 
            $risultato=$conn->query($Query);  
            while ($riga=mysqli_fetch_array ($risultato))
            {
             echo "<option value=\"".$riga['ID_serv_prod']."\">"; 
             echo   $riga['nome_prod_serv'];    
             echo "</option>";
            }
        ?>
    </select>
    <input type="submit" value="AGGIUNGI AL CARRELLo" />  
</form>
<br>

    <?php
        include_once "connessione.php";
        $query = "SELECT nome_prod_serv, descrizione, fk_id_serv_prod, disponibilita, costo, sconto FROM servizi_prodotti;";
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
            echo "<th>Nome Prodotto o Servizio</th> <th>Descrizione</th> <th>Prodotto o Servizio</th> <th>Disponibilita</th> <th>Costo</th> <th>Sconto</th>"; 	// intestazione tabella
            echo"</tr>"; 			
            while ($riga=mysqli_fetch_array($risultato,MYSQLI_ASSOC)) 
            {
                echo"<tr>";		// scrivo le righe nella tabella
                echo"<td>".$riga['nome_prod_serv']."</td> <td>".$riga['descrizione']."</td> <td>".$riga['fk_id_serv_prod']."</td> <td>".$riga['disponibilita']."</td> <td>".$riga['costo']."</td> <td>".$riga['sconto']."</td>";
                echo"</tr>";
            }
            echo"</table><br/><br/>";
        }// fine else
        mysqli_close($conn);
    ?>
</body>
</html>