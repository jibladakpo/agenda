<?php
require_once ('includes/connexion_bdd.php');
?>
<?php 
$date = ($_GET ['dt']);
$a = ($_GET ['annee']);
$m = ($_GET ['mois']);
$id_praticien=$_GET['id_praticien'];
  //requête SQL permettant de supprimer un patient:
  $delete = $db->prepare("DELETE 
          FROM agenda_absence
	      WHERE date = '$date'
  		AND id_praticien = $id_praticien");
  $delete->execute ();
  echo 
  header ( 'location: accueil.php?id_praticien='.$id_praticien.'&mois='.$m.'&annee='.$a.'');

?>