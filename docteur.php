<?php
require_once ('includes/connexion_bdd.php');


	?>
<html>
	<head>
		 <link rel="stylesheet" href="">
		<title>Docteur</title>
	</head>
<h1>Docteurs</h1>
<body>

<?php $select = $db->query ("SELECT nom FROM `agenda_praticien` ORDER BY nom ASC");

while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
?>
	<table>

  	 
   	<tr>      
       <td> <a href="fiche_medecin.php?action=afficher&amp;id=id">- <?php echo $s->nom;?></a></td>	
   	</tr>
	</table>

<?php } ?>

</body>

</html>	


