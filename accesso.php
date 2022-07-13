<?php
 if(isset($_POST['txtEmail']))
 {
    include_once "connessione.php";	
     $ricerca = "SELECT utenti.email, utenti.passwordU FROM utenti";
     $risultato = $conn->query($ricerca);
     $email = $_POST['txtEmail'];
     $password = $_POST['txtPassword'];
     $crypt = password_hash($password, PASSWORD_DEFAULT);
     $checkPassword = false;
     $checkEmail = false;

     while($row = mysqli_fetch_array($risultato))
     {
        if(($row['email'] == $email) && password_verify($password, $row['passwordU']))
        {
            $checkPassword = true;
            $checkEmail = true;
        }   
     }

    if($checkEmail && $checkPassword)
    {
        echo "<p>Ti sei loggato</p>";
        session_start();
        $_SESSION['utente'] = $email;
        header('Location:utenti.php');
        exit;
    }
    else
        echo "<p>Email o password non corretti</p>";
 }
?>