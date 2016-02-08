<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>


<html>
<head>
 	<link rel="stylesheet" href="">
	<title>CHIC LFM Patient</title>
</head>
	
<?php include_once('recherche_patient.php')?>

<div id="corps">
<DIV ALIGN="CENTER">
<h1><a href="ajouter_patient.php">>Enregistrer un nouveau patient</a></h1>

<!--  
<?php

$conn = oci_connect('kalam70', 'kalam70', 'HEXA2');
if (!$conn) die("Error connecting to Oracle database: " . oci_error());

echo "Successfully connected to Oracle database!";

?>
-->




</DIV>
</div>

