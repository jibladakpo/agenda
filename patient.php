<?php
require_once ('includes/connexion_bdd.php');

$select = $db->query ("SELECT nom, prenom FROM `agenda_patient` ORDER BY nom ASC");

while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
<html>
	<head>
 		<link rel="stylesheet" href="styles/General.css">
		<title>Patient</title>
	</head>
	
	<body>
		<table>

   			<tr>
      		 <th>Nom et prénom</th>
   			</tr>
 			 <tr>      
      			 <td> <a href="fiche_patient.php?action=afficher&amp;id=id">- <?php echo $s->nom;?> <?php echo $s->prenom;?></a></td> 		
  			</tr>
		</table>

<?php } ?>

</body>

</html>