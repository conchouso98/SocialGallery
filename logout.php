<?php
session_start();
//Destruimos la sesión
session_destroy();
header("Location: login.php");
?>