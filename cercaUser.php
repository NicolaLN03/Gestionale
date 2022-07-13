<html>
<head>
 <title></title>
  <link href="stile.css" rel="stylesheet" typr="text/css">
</head>
<header>
</header>
<body>
    <?php
        include_once "connessione.php";
        $cercaUser = $_POST["cmbUtenti"];
        $query = "SELECT nome_azienda, nome_rappresentante, email, numero_telefono, indirizzo, fk_id_tipo_utente  
        FROM utenti
        WHERE nome_rappresentante = $cercaUser";
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
            echo "<th>Nome azienda</th> <th>Nome Rappresentate</th> <th>Email</th> <th>Numero di telefono</th> <th>Indirizzo</th> <th>Tipo utente</th>";
            echo"</tr>"; 			
            while ($riga=mysqli_fetch_array($risultato,MYSQLI_ASSOC)) 
            {
                echo"<tr>";		// scrivo le righe nella tabella
                echo"<td>".$riga['nome_azienda']."</td> <td>".$riga['nome_rappresentante']."</td> <td>".$riga['email']."</td> <td>".$riga['numero_telefono']."</td> <td>".$riga['indirizzo']."</td> <td>".$riga['fk_id_tipo_utente']."</td>";
                echo"</tr>";
            }
            echo"</table><br/><br/>";
        }// fine else
        mysqli_close($conn);
    ?>
</body>
</html>