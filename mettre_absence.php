<?php
require_once ('includes/connexion_bdd.php');
?>

<?php 
$date = ($_POST ['dt']);
$id_praticien=$_GET['id_praticien'];

$db->query ( "INSERT INTO agenda_absence VALUES ('','" . $id_praticien . "','" . $date . "','')" );

echo
header ( 'location: accueil.php?id_praticien='.$id_praticien.'date='.$date.'');



?>