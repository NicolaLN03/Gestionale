<html>
<head>
 <title></title>
  <link href="stile.css" rel="stylesheet" typr="text/css">
</head>
<header>
  <br>
<nav>
  <ul>
    <li><a href="servizi_prodotti.php" title="Query">TORNA INDIETRO</a></li>
  </nav>
</header>
<br/>
<?php
include_once "connessione.php";
 ?>

<div class="backgroundR">
  <div class="shapeR"></div>
  <div class="shapeR"></div>
</div>
  <form class="formR" method="POST" action="dati.php">
    <h3>REGISTRAZIONE PRODOTTI/SERVIZI</h3>

    <input class="input" type="text" name="txtNomeProdServ" placeholder="Nome Prodotto/Servizio">
      
    <input class="input" type="text" name="txtDescrizione" placeholder="Descrizione">
    
    <input class="input" type="text" name="txtDisponibilita" placeholder="Disponibilita">

    <input class="input" type="text" name="txtCosto" placeholder="Costo">

    <input class="input" type="text" name="txtSconto" placeholder="Sconto">

</br>
  
    Seleziona tipologia:
    <select class="select" name="cmbServProd">
      <?php
        include_once "connessione.php";	
        $Query="select ID_serv_prod , nome_serv_prod  from tipo_serv_prod;"; 
        $risultato=$conn->query($Query);  
        if($risultato == FALSE)
        {
          echo "Query con errori " ;
          echo mysqli_error($conn);
        }
        else{
          while ($riga=mysqli_fetch_array ($risultato))
          {
            echo "<option value=\"".$riga['ID_serv_prod']."\">"; 
            echo   $riga['nome_serv_prod'];    
            echo "</option>";
          }
        }  
        ?>
    </select></br>
    <button class="buttonR">Registra prodotto/servizio</button>
  </form></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>

<footer>
  <a href="servizi_prodotti.php">HOME PAGE
  </footer>
  </body>
</html>