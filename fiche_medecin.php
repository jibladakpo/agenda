<?php
require_once ('includes/connexion_bdd.php');
if($_GET['action']=='afficher'||$_GET['action']=='modifier'||$_GET['action']=='supprimer'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>
<html>

	<head>
	 	<link rel="stylesheet" href="">
		<title>Fiche du m�decin</title>
	</head>
<h1>Fiche du M�decin</h1>
	<body>
		<div>Nom: <?php echo "$s->nom"; ?></div>
		<div>Sp�cialit�: <?php  echo "$s->specialite"; ?></div>
		<div>Jours pr�sences: <?php  echo "$s->jour_presence"; ?></div>
		<div>Heure d�but: <?php  echo "$s->heure_debut"; ?></div>
		<div>Heure fin: <?php  echo "$s->heure_fin"; ?></div>
		<div>Dur�e des rendez-vous: <?php  echo "$s->duree_rdv"; ?></div>
		
<?php }?>
		
		<div class="button">
			<button type="submit" >Modifier</button>
			<button type="reset" >Supprimer</button>
		</div>
	</body>

</html>	

