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
    <form class="formM" method="POST" action="modificaDatiUtente.php">
      <h3>MODIFICA UTENTR</h3>
  
      <input class="input" type="text" name="txtNomeAzienda" placeholder="Nome Azienda">
      
      <input class="input" type="text" name="txtNomeRappresentante" placeholder="Nome Rappresentate">
    
      <input class="input" type="text" name="txtEmail" placeholder="Email">

      <input class="input" type="password" name="txtPassword" placeholder="Password">

      <input class="input" type="text" name="txtNumCell" placeholder="Numero di cellulare">

      <input class="input" type="text" name="txtIndirizzo" placeholder="Indirizzo">

      <button class="buttonR">Modifica dati</button>
      </form>';
    
?>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<footer>
</br></br>
  <a href="utenti.php">HOME PAGE
  </footer>
  </body>
</html>



