<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');

if($_GET['action']=='afficher'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>
<html>

	<head>
	 	<link rel="stylesheet" href="">
		<title>Fiche du m�decin</title>
	</head>
	
<div id="corps">
<h1>Fiche du M�decin</h1>
	
		<div>Nom: <?php echo "$s->nom"; ?></div>
		<br>
		<div>Sp�cialit�: <?php  echo "$s->specialite"; ?></div>
		<br>
		<div>Jours de pr�sences: <?php  echo "$s->jour_presence"; ?></div>
		<br>
		<div>Heure d�but: <?php  echo "$s->heure_debut"; ?></div>
		<br>
		<div>Heure fin: <?php  echo "$s->heure_fin"; ?></div>
		<br>
		<div>Dur�e des rendez-vous: <?php  echo "$s->duree_rdv"; ?></div>
		<br>
<?php }?>
		
		<a href="modifier_medecin.php"><input type="button" value="Modifier"
	name="modifier medecin"></a>
			<a href="supprimer.php"><input type="button" value="Supprimer"
	name="supprimer_medecint"></a>
	</div>

</html>	

