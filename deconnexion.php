<?php // script d�connexion de l'utilisateur
session_start();
session_unset();
session_destroy();
header('location: index.php');
?>