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
<?php
    include_once "connessione.php";
    session_start();
    if(!isset($_SESSION['utente']))
    {
        header('Location:login.php');
        exit;
    }
?>
<body>
<br>
<form method="POST" action="registrazioneUtenti.php">
    <h3>Crea nuovo utente </h3>
    <input type="submit" value="CREA UTENTE" />  
</form>
<br>
<form method="POST" action="modificaUser.php">
    <h3>Scegli utente da modificare: </h3>
    <select name="cmbUtenti">
        <?php
            include_once "connessione.php";	
            $Query="SELECT ID_Utente, nome_rappresentante FROM utenti;"; 
            $risultato=$conn->query($Query);  
            while ($riga=mysqli_fetch_array ($risultato))
            {
             echo "<option value=\"".$riga['ID_Utente']."\">"; 
             echo   $riga['nome_rappresentante'];    
             echo "</option>";
            }
        ?>
    </select>
    <input type="submit" value="MODIFICA UTENTE" />  
</form>
<br>
<form method="POST" action="delUser.php">
    <h3>Scegli utente da eliminare: </h3>
    <select name="cmbUtenti">
        <?php
            include_once "connessione.php";	
            $Query="SELECT ID_Utente, nome_rappresentante FROM utenti;"; 
            $risultato=$conn->query($Query);  
            while ($riga=mysqli_fetch_array ($risultato))
            {
             echo "<option value=\"".$riga['ID_Utente']."\">"; 
             echo   $riga['nome_rappresentante'];    
             echo "</option>";
            }
        ?>
    </select>
    <input type="submit" value="ELIMINA UTENTE" />  
</form>



</body>
</html>