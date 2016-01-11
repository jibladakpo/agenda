<?php
require_once ('includes/connexion_bdd.php');
if($_GET['action']=='afficher'||$_GET['action']=='modifier'||$_GET['action']=='supprimer'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>
<html>

	<head>
		<link rel="stylesheet" href="styles/General.css">
		<title>Fiche du patient</title>
	</head>

	<body>
		<div>Nom:<?php echo "nom"; ?></div>
		<div>Prénom:<?php echo "nom"; ?></div>
		<div>Date de naissance:<?php echo "nom"; ?></div>
		<div>Téléphone:<?php echo "nom"; ?></div>
		<div>Adresse:<?php echo "nom"; ?></div>
		<div>Ville:<?php echo "nom"; ?></div>
		<div>Code Postal:<?php echo "nom"; ?></div>
		<div>Médecin traitant:<?php echo "nom"; ?></div>
		

<?php }?>
		
		<div class="button">
			<button type="submit" >Modifier</button>
			<button type="reset" >Supprimer</button>
		</div>

	</body>

</html>	
