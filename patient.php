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

<form action="rechercher_patient.php" method="Post">
<div>Recherche patient</div>
Nom<input type="text" name="nom" size="10">
Prénom<input type="text" name="prenom" size="10">
Date de naissance<input type="date" name="date de naissance" size="100">
<input type="submit" value="Ok">
</form>
	<?php 
$select = $db->query ("SELECT nom, prenom FROM `agenda_patient` ORDER BY nom ASC");

while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
?>
		<table>

 
 			 <tr>      
      			 <td> <a href="fiche_patient.php?action=afficher&amp;id=id">- <?php echo $s->nom;?> <?php echo $s->prenom;?></a></td> 		
  			</tr>
		</table>

<?php } ?>

</div>

</html>