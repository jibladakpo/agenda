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
	
	<table>
			
			<tr>
			<th>Fiche patient</th>
			<th>Nom du Patient</th>
			<th>Date de naissance </th>
			<th>Modifier</th>
			<th>Supprimer</th>
			</tr>
	<?php 
		$select = $db->query ("SELECT nom, prenom, date_naissance,id_patient FROM `agenda_patient` ORDER BY nom ASC");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
	
			
 			 	<tr > 
 			 	<td> <a href="fiche_patient.php?action=afficher&amp;id=<?php echo $s->id_patient;?>"><img src="image/fiche.png" width="30"/></a></td>       
      				 <td> <?php echo $s->nom;?> <?php echo $s->prenom;?></td> 
      				 <td> <?php echo $s->date_naissance;?> </td> 
      				 <td><a href="modifier_patient.php?action=modifier&amp;id=<?php echo $s->id_patient;?>"> <img src="image/modifier.jpg" width="30"/></a> </td>
      				<td> <a href="supprimer_patient.php?action=supprimer&amp;id=<?php echo $s->id_patient;?>"> <img src="image/croix.jpg" width="30"/></a> </td>
      				  
  				</tr>
			
	
	

	<?php } ?>
</table>
</div>

</html>