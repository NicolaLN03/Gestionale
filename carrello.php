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
    <li><a href="dashboard.php" title="Query">TORNA INDIETRO</a></li>
    <li><a href="logout.php" title="Query">LOGOUT</a></li>
  </nav>
</header>
<body>
<br>

    <?php
        include_once "connessione.php";
        $query = "SELECT nome_prod_serv, costo 
                  FROM carrello
                  JOIN servizi_prodotti ON carrello.fk_id_serv_prod = ID_serv_prod;";
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
            echo "<th>Nome Prodotto o Servizio</th> <th>Costo</th>"; 	// intestazione tabella
            echo"</tr>"; 			
            while ($riga=mysqli_fetch_array($risultato,MYSQLI_ASSOC)) 
            {
                echo"<tr>";		// scrivo le righe nella tabella
                echo"<td>".$riga['nome_prod_serv']."</td> <td>".$riga['costo']."</td>";
                echo"</tr>";
            }
            echo"</table><br/><br/>";
        }// fine else
        mysqli_close($conn);
    ?>
</body>
</html>