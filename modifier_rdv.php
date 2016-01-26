<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<?php 
if($_GET['action']=='modifier'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` WHERE agenda_patient.id_patient = agenda_rdv.id_patient AND agenda_praticien.id_praticien = agenda_rdv.id_praticien AND agenda_rdv.id_rdv=$id ");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>

<?php if (isset ( $_POST ['submit'] )) {
	
	$id_praticien = ($_POST ['id_praticien']);
	$id_patient = ($_POST ['id_patient']);
	$date_debut = ($_POST ['date_debut']);
	$heure_deb = ($_POST ['heure_deb']);
	$observation = ($_POST ['observation']);
	$dossier = ($_POST ['dossier']);
	$motif = ($_POST ['motif']);
	$examen = ($_POST ['examen']);
		
		$update = $db->prepare ("UPDATE agenda_rdv 
					SET id_patient = '".$id_patient."',
				id_praticien  = '".$id_praticien."', 
				date_debut = '".$date_debut."', 
				heure_deb = '".$heure_deb."', 
				observation = '".$observation."', 
				dossier = '".$dossier."',
				motif = '".$motif."',
				examen = '".$examen."'
				WHERE id_rdv=$id");
		$update->execute ();
		
		echo '<script>alert("informations modifié")</script>';
		header ( 'location: rdv.php' );
		}
	
?>
<html>

<head>
	<link rel="stylesheet" href="">
	<title></title>
</head>
<div id="corps">
	<h1>Modifier les informations concernant le rendez-vous</h1>
	<form action="" method="POST">
		<table>
	
	<tr align="center">
		<td>Nom du patient:</td>
		<td><input type="hidden" name="id_patient" id=id_patient value="<?php echo $s->id_patient;?>"><input type="text" name="nom_patient" id="nom_patient" value="<?php echo "$s->nom"; ?>" size="20"placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Prénom du patient:</td>
		<td><input type="text" name="prenom_patient" id="prenom_patient" value="<?php echo "$s->prenom"; ?>" size="20"placeholder="" class=""></td>
	</tr>
	


	<tr align="center">
	
	<td>Nom du médecin:</td>
	<td><input type="hidden" name="id_praticien" id=id_praticien value="<?php echo $s->id_praticien;?>"><input type="text" name="nom_praticien" id="nom_praticien" value="<?php echo "$s->nom_medecin"; ?>" size="20"placeholder="" class=""></td>
	</tr>
	
	<tr align="center">
		<td>Date du rendez-vous:</td>
		<td><input type="text" name="date_debut" id="date_debut" value="<?php echo $s->date_debut;?>" size="20" placeholder="" class=""></td>
	</tr>
	
	<tr align="center">
		<td>Heure du rendez-vous:</td>
		<td><input type="text" name="heure_deb" id="heure_deb" value="<?php echo $s->heure_deb;?>" size="20" placeholder="" class=""></td>
	</tr>

	<tr align="center">
		<td>Observartion:</td>
		<td><textarea name="observation" id="observation"  placeholder="" class=""><?php echo $s->observation;?></textarea></td>
	</tr>
	<tr align="center">
		<td>Dossier:</td>
		<td><input type="text" name="dossier" id="dossier" value="<?php echo $s->dossier;?>"  size="20"placeholder="" class=""></td>
	</tr>
	
	<tr align="center">
		<td>Lieu du dossier:</td>
		<td><input type="text" name="dossier_lieu" id="dossier_lieu" value="<?php echo $s->dossier_lieu;?>" size="20" placeholder="" class=""></td>
	</tr>
	
	<tr align="center">
		<td>Motif:</td>
		<td><textarea name="motif" id="motif"  placeholder="" class=""><?php echo $s->motif;?></textarea></td>
	</tr>
	<tr align="center">
		<td>Examen:</td>
		<td><textarea name="examen" id="examen"  placeholder="" class=""><?php echo $s->examen;?></textarea></td>
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