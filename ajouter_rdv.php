<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<?php 
if($_GET['action']=='ajouter'){
	$id=$_GET['id'];
	$id_praticien=$_GET['id_praticien'];
	$d=$_GET['dt'];
	$h=$_GET['h'];
	
	
?>
<?php if (isset ( $_POST ['submit'] )) {

	$id_praticien = ($_POST ['id_praticien']);
	$id_patient = ($_POST ['id_patient']);
	$date_debut = ($_POST ['date_debut']);
	$heure_deb = ($_POST ['heure_deb']);
	$observation = ($_POST ['observation']);
	$dossier = ($_POST ['dossier']);
	$dossier_lieu = ($_POST ['dossier_lieu']);
	$motif = ($_POST ['motif']);
	$examen = ($_POST ['examen']);
	
		
		$db->query ( "INSERT INTO agenda_rdv VALUES ('','" . $id_praticien .  "', '" . $id_patient . "','" . $date_debut . "','" . $heure_deb . "','" . $observation . "','" . $dossier . "','" . $dossier_lieu . "','" . $motif . "','" . $examen . "')" );
		
		echo '<script>alert("rendez-vous pris")</script>';
		header ( 'location: accueil.php' );
		}
	
?>
<html>
<link rel="stylesheet" href="">
<title></title>
<head>

</head>
<div id="corps">
	<h1>Prendre rendez-vous</h1>
	<form action="" method="POST">
	
	
	 <table >
<?php 	 

	$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id_patient=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>
	<tr align="center">
		<td>Nom du patient:</td>
		<td><input type="hidden" name="id_patient" id=id_patient value="<?php echo $s->id_patient;?>"><input type="text" name="nom_patient" id="nom_patient" value="<?php echo "$s->nom"; ?>" size="20"placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Prénom du patient:</td>
		<td><input type="text" name="prenom_patient" id="prenom_patient" value="<?php echo "$s->prenom"; ?>" size="20"placeholder="" class=""></td>
	</tr>

<?php 	 


	$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien=$id_praticien");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>

	<tr align="center">
	
	<td>Nom du médecin:</td>
	<td><input type="hidden" name="id_praticien" id=id_praticien value="<?php echo $s->id_praticien;?>"><input type="text" name="nom_praticien" id="nom_praticien" value="<?php echo "$s->nom_medecin"; ?>" size="20"placeholder="" class=""></td>
	</tr>

	<tr align="center">
		<td>Date :</td>
		<td><input type="text" name="date_debut" id="date_debut" value="<?php echo $d;?>" size="20" placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Heure :</td>
		<td><input type="text" name="heure_deb" id="heure_deb" value="<?php echo $h;?>" size="20" placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Observartion:</td>
		<td><textarea name="observation" id="observation"  placeholder="" class=""></textarea></td>
	</tr>
	<?php 	 
	$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id_patient=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>
	
	<tr align="center">
			<td>Dossier (LFM, ailleurs, aucun):</td>
			<td>
	
<INPUT type="checkbox" name="dossier" id="dossier" value="LFM"> LFM
<INPUT type="checkbox" name="dossier" id="dossier" value="ailleurs"> ailleurs
<INPUT type="checkbox" name="dossier" id="dossier" value="aucun"> aucun
			
			</td>
	
	<tr align="center">
		<td>Lieu du dossier:</td>
		<td><input type="text" name="dossier_lieu" id="dossier_lieu" value="" size="20" placeholder="" class=""></td>
	</tr>
	
	<tr align="center">
		<td>Motif:</td>
		<td><textarea name="motif" id="motif"  placeholder="" class=""></textarea></td>
	</tr>
	<tr align="center">
		<td>Examen:</td>
		<td><textarea name="examen" id="examen"  placeholder="" class=""></textarea></td>
	</tr>
	
	<tr align="center">
		<td></td>
		<td><div class="button">
        <button type="submit" name="submit">Valider</button>
        <button type="reset" >Annuler</button>
    </div></td>
    </tr>
    </table>
    
	</form>
</div>

</html>
<?php }?>