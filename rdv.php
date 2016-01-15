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
			
			</tr>
	<?php 
		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` WHERE agenda_patient.id_patient = agenda_rdv.id_patient AND agenda_praticien.id_praticien = agenda_rdv.id_praticien GROUP BY agenda_patient.id_patient ORDER BY nom ASC ");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
			
			
 			 	<tr align="center"> 
 			 		<td> <a href="fiche_rdv.php?action=afficher&amp;id=<?php echo $s->id_rdv;?>"><img src="image/fiche.png" width="30"/></a></td>    
      				 <td> <a href="fiche_patient.php?action=afficher&amp;id=<?php echo $s->id_patient;?>"> <?php echo $s->nom;?> <?php echo $s->prenom;?></a></td>
      				 <td> <a href="fiche_medecin.php?action=afficher&amp;id=<?php echo $s->id_praticien;?>"> <?php echo $s->nom_medecin;?></a></td>
      				 
      				 
  				</tr>
			
	
	

	<?php } ?>
</table>
</div>

</html>