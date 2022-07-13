<?php
include_once "connessione.php";

$ricerca = "SELECT utenti.email FROM utenti";
$risultato = $conn->query($ricerca);
$email = $_POST['txtEmail'];
$check = false;

while($row = mysqli_fetch_array($risultato))
    {
        if($row['email'] == $email)
            $check = true;
    }

    if(!$check)
    {
        $nomeAzienda = $_POST['txtNomeAzienda'];
        $nomeRappresentate = $_POST['txtNomeRappresentate'];
        $email = $_POST['txtEmail'];
        $password = $_POST['txtPassword'];
        $numCell = $_POST['txtNumCell'];
        $indirizzo = $_POST['txtIndirizzo'];
        $tipo_utente = $_POST['cmbTipo_Utente'];
        $password_cripto = password_hash($password, PASSWORD_DEFAULT);

        $toInsert = "INSERT INTO utenti (nome_azienda, nome_rappresentante, email, numero_telefono, indirizzo, passwordU, fk_id_tipo_utente) VALUES
        (?, ?, ?, ?, ?, ?, ?)";

        $query = $conn->prepare($toInsert);
        $query->bind_param("ssssssi", $nomeAzienda, $nomeRappresentate, $email, $numCell, $indirizzo, $password_cripto, $tipo_utente);
        $query->execute();
        header('Location: utenti.php');
    }
    else
    {
        echo '<script language="javascript">';
            echo 'alert("Errore nella registrazione")';
        echo '</script>';
        //header('Location: registrazione.php');
    }

?>