<?php
require_once ('includes/connexion_bdd.php');
?>
<?php

if($_GET['action']=='supprimer'){
	$id=$_GET['id'];
	$id_praticien = ($_GET ['id_praticien']);
	$date_debut = ($_GET ['date_debut']);
 
  //requête SQL permettant de supprimer un patient:
  $delete = $db->prepare("DELETE 
          FROM agenda_rdv
	      WHERE id_rdv = $id ");
  $delete->execute ();
  echo '<script>alert("rendez-vous supprimé")</script>';
  header ( 'location: rdv_jour.php' );

}
?>