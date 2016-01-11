<?php
require_once ('includes/connexion_bdd.php');
if($_GET['action']=='afficher'||$_GET['action']=='modifier'||$_GET['action']=='supprimer'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_practicien` WHERE id=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>
<html>

	<head>
	 	<link rel="stylesheet" href="styles/General.css">
		<title>Fiche du médecin</title>
	</head>

	<body>
		<div>Nom: <?php echo "nom"; ?></div>
		<div>Spécialité: <?php  echo "spécialite"; ?></div>
		<div>Jours présences: <?php  echo "jour_presence"; ?></div>
		<div>Heure début: <?php  echo "heure_debut"; ?></div>
		<div>Heure fin: <?php  echo "heure_fin"; ?></div>
		<div>Durée des rendez-vous: <?php  echo "duree_rdv"; ?></div>
		
<?php }?>
		
		<div class="button">
			<button type="submit" >Modifier</button>
			<button type="reset" >Supprimer</button>
		</div>
	</body>

</html>	

