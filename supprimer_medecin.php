<?php
require_once ('includes/connexion_bdd.php');
?>
<?php

if($_GET['action']=='supprimer'){
	$id=$_GET['id'];
 
  //requ�te SQL permettant de supprimer un patient:
  $delete = $db->prepare("DELETE 
          FROM agenda_praticien
	      WHERE id_praticien = $id ");
  $delete->execute ();
  echo '<script>alert("m�decin supprim�")</script>';
  header ( 'location: docteur.php' );

}
?>
