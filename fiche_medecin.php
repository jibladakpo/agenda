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
		<title>Fiche du m�decin</title>
	</head>

	<body>
		<div>Nom: <?php echo "nom"; ?></div>
		<div>Sp�cialit�: <?php  echo "sp�cialite"; ?></div>
		<div>Jours pr�sences: <?php  echo "jour_presence"; ?></div>
		<div>Heure d�but: <?php  echo "heure_debut"; ?></div>
		<div>Heure fin: <?php  echo "heure_fin"; ?></div>
		<div>Dur�e des rendez-vous: <?php  echo "duree_rdv"; ?></div>
		
<?php }?>
		
		<div class="button">
			<button type="submit" >Modifier</button>
			<button type="reset" >Supprimer</button>
		</div>
	</body>

</html>	

