<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');

if($_GET['action']=='afficher'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
						WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
						AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
						AND agenda_rdv.id_rdv=$id ");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>
<html>

	<head>
	 	<link rel="stylesheet" href="">
		<title>CHIC LFM Fiche RDV</title>
	</head>
	
<div id="corps">
<h1>Fiche rendez vous</h1>

		<p>Nom  et prénom du patient: <?php echo "$s->nom"; ?> <?php echo "$s->prenom"; ?></p>
	
		<input type="hidden" name="id_praticien" id=id_praticien value="<?php echo $s->id_praticien;?>"><p>Nom: <?php echo "$s->nom_medecin"; ?></p>
		
		<p>Date: <?php echo "$s->date_debut"; ?></p>
		
		<p>Heure : <?php echo "$s->heure_deb"; ?></p>
		
		<p>Observation: <?php echo "$s->observation"; ?></p>
		
		<p>Dossier: <?php echo "$s->dossier"; ?></p>
		
		<p>Lieu du dossier: <?php echo "$s->dossier_lieu"; ?></p>
		
		<p>Motif: <?php echo "$s->motif"; ?></p>
		<?php if($s->id_praticien == 2){?> 
		<p>Examen: <?php echo "$s->examen"; ?></p>
		<?php }?>
		
		<?php if($s->id_praticien == 1){?> 
		<p>Raison: <?php echo "$s->raison"; ?></p>
		<?php }?>
<?php }?>
		
		 <a href="modifier_rdv.php?action=modifier&amp;id=<?php echo $s->id_rdv;?>"><input type="button" value="Modifier"
	name="modifier rdv"></a>
			<a href="supprimer_rdv.php?action=supprimer&amp;id=<?php echo $s->id_rdv;?>"><input type="button" value="Supprimer"
	name="supprimer_rdv"></a>
	</div>

</html>	