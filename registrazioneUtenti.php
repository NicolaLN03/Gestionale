<html>
<head>
 <title></title>
  <link href="stile.css" rel="stylesheet" typr="text/css">
</head>
<header>
<nav>
  <ul>
    <li><a href="utenti.php" title="Query">TORNA INDIETRO</a></li>
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
    <h3>REGISTRAZIONE UTENTE</h3>

    <input class="input" type="text" name="txtNomeAzienda" placeholder="Nome Azienda">
      
    <input class="input" type="text" name="txtNomeRappresentate" placeholder="Nome Rappresentate">
    
    <input class="input" type="email" name="txtEmail" placeholder="Email">

    <input class="input" type="password" name="txtPassword" placeholder="Password">

    <input class="input" type="text" name="txtNumCell" placeholder="Numero di cellulare">

    <input class="input" type="text" name="txtIndirizzo" placeholder="Indirizzo">

</br>
    Seleziona tipologia utente:
    <select class="select" name="cmbTipo_Utente">
      <?php
        include_once "connessione.php";	
        $Query="select id_tipo, nome_tipo from tipo_utente;"; 
        $risultato=$conn->query($Query);  
        if($risultato == FALSE)
        {
          echo "Query con errori " ;
          echo mysqli_error($conn);
        }
        else{
          while ($riga=mysqli_fetch_array ($risultato))
          {
            echo "<option value=\"".$riga['id_tipo']."\">"; 
            echo   $riga['nome_tipo'];    
            echo "</option>";
          }
        }  
        ?>
    </select></br>
    <button class="buttonR">Registrati</button>
  </form></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>

  </body>
</html>