<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>


<html>
<head>
 	<link rel="stylesheet" href="">
	<title>Patient</title>
</head>
	
<div id="corps">
	<h1>Patients</h1>	
	<a href="recherche_patient.php">=>Rechercher un patient</a>
	<br>
	<br>
	<a href="ajouter_patient.php">=>Ajouter un nouveau patient</a>
	<br>
	<br>
	<?php 
		$select = $db->query ("SELECT nom, prenom, id FROM `agenda_patient` ORDER BY nom ASC");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
	
			<table>
 			 	<tr align="center">      
      				 <td> <a href="fiche_patient.php?action=afficher&amp;id=<?php echo $s->id;?>"> <?php echo $s->nom;?> <?php echo $s->prenom;?></a> 
      				 <a href="modifier_patient.php?action=modifier&amp;id=<?php echo $s->id;?>">/ modifier</a> 
      				 <a href="supprimer_patient.php?action=supprimer&amp;id=<?php echo $s->id;?>">- supprimer</a>
      				 </td> 
  				</tr>
			</table>
	
	<br>

	<?php } ?>

</div>

</html>