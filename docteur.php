<?php
require_once ('includes/connexion_bdd.php');

$select = $db->query ("SELECT nom FROM `agenda_practicien` ORDER BY nom ASC");

while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
<html>
	<head>
		 <link rel="stylesheet" href="styles/General.css">
		<title>Docteur</title>
	</head>

<body>
	<table>

  	 <tr>
       <th>Nom du docteur</th>
   	</tr>
   	<tr>      
       <td> <a href="fiche_patient.php?action=afficher&amp;id=id">- <?php echo $s->nom;?></a></td>	
   	</tr>
	</table>

<?php } ?>

</body>

</html>	


