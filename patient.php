<?php
require_once ('includes/connexion_bdd.php');

	?>
<html>
	<head>
 		<link rel="stylesheet" href="">
		<title>Patient</title>
	</head>
	
	<body>
<h1>Patients</h1>	
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

</body>

</html>