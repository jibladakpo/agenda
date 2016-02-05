<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');

if($_GET['action']=='afficher'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>
<html>

	<head>
	 	<link rel="stylesheet" href="styles/fiche.css">
		<title>CHIC LFM Fiche médecin</title>
	</head>
	
<div id="corps">
<DIV ALIGN="CENTER">
<h1><img src='image/fiche.png' width='30'/>Fiche Médecin</h1>
</DIV>
<div class=fiche>

		<div>
		<label>Nom:</label>
		 <?php echo "$s->nom_medecin"; ?>
		 </div>
		
		<div>
		<label>Spécialité:</label>
		 <?php  echo "$s->specialite"; ?>
		</div>
		
		<div>
		<label>Jours de présences:</label>
		 <?php  echo "$s->jour_presence"; ?>
		</div>
		
		<div>
		<label>Heure début: </label>
		<?php  echo "$s->heure_debut"; ?>
		</div>
		
		<div>
		<label>Heure fin: </label>
		<?php  echo "$s->heure_fin"; ?>
		</div>

		<div>
		<label>Durée des rendez-vous:</label>
		 <?php  echo "$s->duree_rdv"; ?>
		</div>
		
<?php }?>
		<div class="button">
		 <a href="modifier_medecin.php?action=modifier&amp;id=<?php echo $s->id_praticien;?>"><input type="button" value="Modifier"
			name="modifier medecin">
		</a>
			<a href="supprimer_medecin.php?action=supprimer&amp;id=<?php echo $s->id_praticien;?>"><input type="button" value="Supprimer"
			   name="supprimer_medecin">
			</a>
	</div>
	</div>
</div>
</html>	

