<?php
session_start();
session_destroy(); //termino la sessione
session_unset();
header('Location:index.php'); //reindirizzo a login

?>