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
<h1>Rendez-vous</h1>
<p><a href="recherche_patient.php?action=ajouter&amp;"> =>Prendre rendez-vous</a></p>


<table>
			<tr>
			<th>Fiche rdv</th>
			<th>Nom du patient</th>
			<th>Nom du médecin</th>
			<th>Date de naissance</th>
			<th>Date rdv</th>
			<th>Heure rdv</th>
			<th>Modifier</th>
			<th>Supprimer</th>		
			</tr>
	<?php 
		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
				ORDER BY date_debut ASC ");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
					
 			 	<tr align="center"> 
 			 		 <td > <a href="fiche_rdv.php?action=afficher&amp;id=<?php echo $s->id_rdv;?>"><img src="image/fiche.png" width="30"/></a></td>    
 			 		 <td width=200> <a href="fiche_medecin.php?action=afficher&amp;id=<?php echo $s->id_praticien;?>"> <?php echo $s->nom_medecin;?></a></td>
      				 <td width=200> <a href="fiche_patient.php?action=afficher&amp;id=<?php echo $s->id_patient;?>"> <?php echo $s->nom;?> <?php echo $s->prenom;?></a></td>
      				 <td width=200><?php echo $s->date_naissance;?> </td>
      				 <td width=200><?php echo$s->date_debut; ?> </td>
      				 <td width=200><?php echo$s->heure_deb; ?> </td>
      				 <td ><a href="modifier_rdv.php?action=modifier&amp;id=<?php echo $s->id_rdv;?>"> <img src="image/modifier.jpg" width="30"/></a> </td>
      				 <td> <a href="supprimer_rdv.php?action=supprimer&amp;id=<?php echo $s->id_rdv;?>"> <img src="image/croix.jpg" width="30"/></a> </td>		 
  				</tr>
		
	<?php } ?>
</table>
</div>

</html>