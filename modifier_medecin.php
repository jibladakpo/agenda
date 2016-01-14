<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<?php 
if($_GET['action']=='modifier'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>

<?php if (isset ( $_POST ['submit'] )) {
	
	$nom_medecin = ($_POST ['nom_medecin']);
	$specialite = ($_POST ['specialite']);
	$jour_presence = ($_POST ['jour_presence']);
	$heure_debut = ($_POST ['heure_debut']);
	$heure_fin = ($_POST ['heure_fin']);
	$duree_rdv = ($_POST ['duree_rdv']);
		
		$update = $db->prepare ("UPDATE agenda_praticien 
					SET nom_medecin = '".$nom_medecin."',
				specialite  = '".$specialite."', 
				jour_presence = '".$jour_presence."', 
				heure_debut = '".$heure_debut."', 
				heure_fin = '".$heure_fin."', 
				duree_rdv = '".$duree_rdv."'
				WHERE id_praticien=$id");
		$update->execute ();
		
		echo '<script>alert("informations modifié")</script>';
		header ( 'location: docteur.php' );
		}
	
?>
<html>

<head>
	<link rel="stylesheet" href="">
	<title></title>
</head>
<div id="corps">
	<h1>Modifier les informations concernant le médecin</h1>
	<form action="" method="POST">
		<table>
		<tr align="center">
			<td>Nom:</td>
			<td><input type="text" name="nom_medecin" id="nom_medecin" placeholder="" value="<?php echo "$s->nom_medecin"; ?>" class=""></td>
		</tr>
		<tr align="center">
			<td>Spécialité:</td>
			<td><input type="text" name="specialite" id="specialite"placeholder=""value="<?php echo "$s->specialite"; ?> " class=""></td>
		</tr>
		<tr align="center">
			<td>Jours de présences:</td>
			<td><input type="text" name="jour_presence" id="jour_presence" size="20" placeholder="" value="<?php echo "$s->jour_presence"; ?> " class=""></td>
		</tr>
		<tr align="center">
			<td>Heure du début de rendez-vous:</td>
			<td><input type="text" name="heure_debut" id="heure_debut"  placeholder="" placeholder=">"value="<?php echo "$s->heure_debut"; ?> " class=""></td>
		</tr>
		<tr align="center">
			<td>Heure du fin de rendez-vous:</td>
			<td><input type="text" name="heure_fin" id="heure_fin" placeholder=""  value="<?php echo "$s->heure_fin"; ?> " class=""></td>
		</tr>
		<tr align="center">
			<td>Durée du rendez-vous:</td>
			<td><input type="text" name="duree_rdv" id="duree_rdv"  placeholder="" value="<?php echo "$s->duree_rdv"; ?>"size=""></td>
		</tr>
<?php }?>   	
   	    	
   	    
		<tr align="center">
			<td></td>
				<td>
					<div class="button">
       			 		<button type="submit" name="submit">Valider</button>
     					<button type="reset" name="annuler">Annuler</button>
    				</div>
    			</td>
    	</tr>
		</table>
	</form>
</div>

</html>

