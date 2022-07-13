<html>
<head>
 <title></title>
  <link href="stile.css" rel="stylesheet" typr="text/css">
</head>
<header>
</header>
<br/>
<?php
include_once "connessione.php";
?>
<body>

  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form class="form" method="POST" action="login.php">
    <h3>LOGIN</h3>

    <label class="label" for="username">Email</label>
    <input class="input" type="text" name="txtEmail" placeholder="Email" id="username">

    <label class="label" for="password">Password</label>
    <input class="input" type="password" name="txtPassword" placeholder="Password" id="password">

    <button class="button">ACCEDI</button>
  </form></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
  
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
    {
        echo "<p>Email o password non corretti</p>";
    }

}
?>
  
</body>

</html>