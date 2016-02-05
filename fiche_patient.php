<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');

if($_GET['action']=='afficher'){
	$id=$_GET['id_patient'];
$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id_patient=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>

<?php if (isset ( $_POST ['submit'] )) {
	header ( 'location: modifier_patient.php' );
	}
	?>
<html>

	<head>
		<link rel="stylesheet" href="styles/fiche.css">
		<title>CHIC LFM Fiche patient</title>
	</head>

	<div id="corps">
		<DIV ALIGN="CENTER">
			<h1><img src='image/fiche.png' width='30'/>Fiche Patient</h1>
		</DIV>
			<div class="fiche">
		<div>
		<label>Nom:</label>
		<?php echo "$s->nom"; ?></div>
		
		<div>
		<label>Prénom:</label>
		<?php echo "$s->prenom"; ?></div>
		
		<div>
		<label>Date de naissance:</label>
		<?php echo "$s->date_naissance"; ?></div>
		
		<div>
		<label>Téléphone:</label>
		<?php echo "$s->tel_fixe"; ?>
		</div>
		
		<div>
		<label>Adresse mail:</label>
		<?php echo "$s->mail"; ?>
		</div>
		
		<div>
		<label>Adresse:</label>
		<?php echo "$s->adresse"; ?>
		</div>
	
		<div>
		<label>Ville:</label>
		<?php echo "$s->ville"; ?>
		</div>

		<div>
		<label>Code Postal:</label>
		<?php echo "$s->cp"; ?>
		</div>

		<div>
		<label>Médecin traitant:</label>
		<?php echo "$s->medecin_traitant"; ?>
		</div>
	
		
<?php }?>	

		<div class=button>
			<a href="modifier_patient.php?action=modifier&amp;id=<?php echo $s->id_patient;?>"><input type="button" value="Modifier"
			name="modifier patient"></a>
			<a href="supprimer_patient.php?action=supprimer&amp;id=<?php echo $s->id_patient;?>"><input type="button" value="Supprimer"
			name="supprimer_patient"></a>
		</div>
		</div>
	</div>

</html>	
