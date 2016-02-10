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
	 	<link rel="stylesheet" href="styles/fiche.css">
		<title>CHIC LFM Fiche RDV</title>
	</head>
	
<div id="corps">
<DIV ALIGN="CENTER">
<h1><img src='image/fiche.png' width='30'/>Fiche rendez vous</h1>

</DIV>
<div class="fiche">

		<div>
		<label>Nom  du patient:</label>
		<?php echo "$s->nom"; ?>
		</div>
		
		<div>
		<label>Prénom  du patient:</label>
		<?php echo "$s->prenom"; ?>
		</div>
	
		<input type="hidden" name="id_praticien" id=id_praticien value="<?php echo $s->id_praticien;?>">
		<div>
		<label>Nom:</label>
		 <?php echo "$s->nom_medecin"; ?>
		 </div>
		 
		<div>
		<label>Date:</label> 
		<?php echo "$s->date_debut"; ?>
		</div>
		
		<div>
		<label>Heure :</label>
		 <?php echo "$s->heure_deb"; ?>
		 </div>
		 
		<div>
		<label>Observation:</label> 
		<?php echo "$s->observation"; ?>
		</div>
		
		<div>
		<label>Dossier:</label>
		 <?php echo "$s->dossier"; ?>
		 </div>
		 
		<div>
		<label>Lieu du dossier: </label>
		<?php echo "$s->dossier_lieu"; ?>
		</div>
		
		<div>
		<label>Motif: </label>
		<?php echo "$s->motif"; ?>
		</div>
		<?php if($s->id_praticien == 2){// Dr Pages à modifier selon id_praticien ?> 
		
		<div>
		<label>Examen: </label>
		<?php echo "$s->examen"; ?>
		</div>
		
		<div>
		<label>Articulation concernée: </label>
		<?php echo "$s->articulation"; ?>
		</div>
		<?php }?>
		
		<?php if($s->id_praticien == 1){// Dr Gombert à modifier selon id_praticien?> 
		<div>
		<label>Raison: </label>
		<?php echo "$s->raison"; ?>
		</div>
		<?php }?>
<?php }?>
		<div class="button">
		 <a href="modifier_rdv.php?action=modifier&amp;id=<?php echo $s->id_rdv;?>"><input type="button" value="Modifier"
	name="modifier rdv"></a>
			<a href="supprimer_rdv.php?action=supprimer&amp;id=<?php echo $s->id_rdv;?>&amp;id_praticien=<?php echo$s->id_praticien;?>&amp;dt=<?php echo $s->date_debut;?>"><input type="button" value="Supprimer"
	name="supprimer_rdv"></a>
	</div>
	</div>
	
	</div>

</html>	