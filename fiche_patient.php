<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');

if($_GET['action']=='afficher'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id_patient=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>

<?php if (isset ( $_POST ['submit'] )) {
	header ( 'location: modifier_patient.php' );
	}
	?>
<html>

	<head>
		<link rel="stylesheet" href="">
		<title>Fiche du patient</title>
	</head>

	<div id="corps">
	
	<h1>Fiche du patient</h1>
		<div>Nom:<?php echo "$s->nom"; ?></div>
		<br>
		<div>Prénom:<?php echo "$s->prenom"; ?></div>
		<br>
		<div>Date de naissance:<?php echo "$s->date_naissance"; ?></div>
		<br>
		<div>Téléphone:<?php echo "$s->tel_fixe"; ?></div>
		<br>
		<div>Adresse:<?php echo "$s->adresse"; ?></div>
		<br>
		<div>Ville:<?php echo "$s->ville"; ?></div>
		<br>
		<div>Code Postal:<?php echo "$s->cp"; ?></div>
		<br>
		<div>Médecin traitant:<?php echo "$s->medecin_traitant"; ?></div>
		<br>
		<div>Dossier: <?php echo "$s->dossier"; ?></div>
		<br>
		<div>Etablissement à contacter(si dossier ailleurs): <?php echo "$s->etablissement"; ?></div>
		<br>
		
<?php }?>	
			<a href="modifier_patient.php?action=modifier&amp;id=<?php echo $s->id_patient;?>"><input type="button" value="Modifier"
	name="modifier patient"></a>
			<a href="supprimer_patient.php?action=supprimer&amp;id=<?php echo $s->id_patient;?>"><input type="button" value="Supprimer"
	name="supprimer_patient"></a>
		
	</div>

</html>	
