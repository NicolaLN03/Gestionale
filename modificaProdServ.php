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

<?php
    include_once "connessione.php";
    session_start();
    $data = $conn->query("SELECT * FROM utenti");
    while ($row = $data->fetch_assoc()) {
        if ($row['email'] == $_SESSION['utente']) {
            $nomeAzienda = $row['nome_azienda'];
            $nomeRappresentante = $row['nome_rappresentante'];
            $telefono = $row['numero_telefono'];
            $mail = $row['email'];
        }
    }
    echo '<div class="backgroundM">
    <div class="shapeM"></div>
    <div class="shapeM"></div>
  </div>
    <form class="formM" method="POST" action="modificaDatiServProd.php">
      <h3>MODIFICA SERVIZI/PRODOTTI</h3> <br>
  
      <input class="input" type="text" name="txtNomeProdServ" placeholder="Nome Prodotto/Servizi">
      
      <input class="input" type="text" name="txtDescrizione" placeholder="Descrizione">
    
      <input class="input" type="text" name="txtDisponibilita" placeholder="Disponibilita">

      <input class="input" type="text" name="txtCosto" placeholder="Costo">

      <input class="input" type="text" name="txtSconto" placeholder="Sconto">

      <button class="buttonR">Modifica dati</button>
      </form>';
    
?>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>

  </body>
</html>