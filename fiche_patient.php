<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');

if($_GET['action']=='afficher'||$_GET['action']=='modifier'||$_GET['action']=='supprimer'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>
<html>

	<head>
		<link rel="stylesheet" href="">
		<title>Fiche du patient</title>
	</head>
<h1>Fiche du patient</h1>
	<div id="corps">
		<div>Nom:<?php echo "$s->nom"; ?></div>
		<div>Prénom:<?php echo "$s->prenom"; ?></div>
		<div>Date de naissance:<?php echo "$s->date_naissance"; ?></div>
		<div>Téléphone:<?php echo "$s->tel_fixe"; ?></div>
		<div>Adresse:<?php echo "$s->adresse"; ?></div>
		<div>Ville:<?php echo "$s->ville"; ?></div>
		<div>Code Postal:<?php echo "$s->cp"; ?></div>
		<div>Médecin traitant:<?php echo "$s->medecin_traitant"; ?></div>
		

<?php }?>
		
		<div class="button">
			<button type="submit" >Modifier</button>
			<button type="reset" >Supprimer</button>
		</div>

	</div>

</html>	
