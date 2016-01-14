<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');

if($_GET['action']=='afficher'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` WHERE agenda_patient.id_patient = agenda_rdv.id_patient AND agenda_praticien.id_praticien = agenda_rdv.id_praticien AND agenda_rdv.id_rdv=$id ");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>
<html>

	<head>
	 	<link rel="stylesheet" href="">
		<title>Fiche rendez-vous</title>
	</head>
	
<div id="corps">
<h1>Fiche rendez vous</h1>

		<div>Nom du patient: <?php echo "$s->nom"; ?> <?php echo "$s->prenom"; ?></div>
	
		<div>Nom: <?php echo "$s->nom_medecin"; ?></div>
		
		<br>
		<div>Date/heure début: <?php echo "$s->date_heure_debut"; ?></div>
		<br>
		<div>Dossier: <?php echo "$s->dossier"; ?></div>
		<br>
		<div>Lieu du dossier: <?php echo "$s->dossier_lieu"; ?></div>
		
		<div>Motif: <?php echo "$s->motif"; ?></div>
		
		<div>Examen: <?php echo "$s->examen"; ?></div>
<?php }?>
		
		 <a href="modifier_rdv.php?action=modifier&amp;id=<?php echo $s->id;?>"><input type="button" value="Modifier"
	name="modifier rdv"></a>
			<a href="supprimer_rdv.php?action=supprimer&amp;id=<?php echo $s->id;?>"><input type="button" value="Supprimer"
	name="supprimer_rdv"></a>
	</div>

</html>	