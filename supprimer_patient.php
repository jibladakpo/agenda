<?php
require_once ('includes/connexion_bdd.php');
?>
<?php 
if($_GET['action']=='supprimer'){
	$id=$_GET['id'];
 
  //requ�te SQL permettant de supprimer un patient:
  $delete = $db->prepare("DELETE 
          FROM agenda_patient
	      WHERE id_patient = $id ");
  $delete->execute ();
  echo '<script>alert("patient supprim�")</script>';
  header ( 'location: patient.php' );

}
?>