<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<?php 
if($_GET['action']=='ajouter'){
	$id=$_GET['id'];
	
?>
<?php if (isset ( $_POST ['submit'] )) {

	$id_praticien = ($_POST ['id_praticien']);
	$id_patient = ($_POST ['id_patient']);
	$date_heure_debut = ($_POST ['date_heure_debut']);
	$observation = ($_POST ['observation']);
	$id_utilisateur = ($_POST ['id_utilisateur']);
	$date_creation = ($_POST ['date_creation']);
	$date_motif = ($_POST ['date_motif']);
	$dossier = ($_POST ['dossier']);
	$motif = ($_POST ['motif']);
	$examen = ($_POST ['examen']);
	
		
		$db->query ( "INSERT INTO agenda_rdv VALUES ('','" . $id_praticien . "','" . $id_patient . "','" . $date_heure_debut . "','" . $observation . "','" . $id_utilisateur . "','" . $date_creation . "','" . $date_motif . "','" . $dossier . "','" . $motif . "','" . $examen . "') WHERE agenda_patient.id_patient= agenda.id_patient AND agenda_praticien.id_praticien = agenda_rdv.id_praticien" );
		
		echo '<script>alert("rendez-vous pris")</script>';
		header ( 'location: calendrier.php' );
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
		<td><input type="text" name="nom" id="id_patient" value="<?php echo "$s->nom"; ?>" size="20"placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Prénom du patient:</td>
		<td><input type="text" name="prenom" id="id_patient" value="<?php echo "$s->prenom"; ?>" size="20"placeholder="" class=""></td>
	</tr>
<?php }?>
	<tr align="center">
	<td>Nom du médecin:</td>
	<td><select>
	
			<optgroup label="Médecins">
				<?php $select = $db->query ("SELECT *  FROM `agenda_praticien` ORDER BY nom_medecin ASC");
				while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
				?>
				<option><?php echo $s->nom_medecin;?> </option>
				<?php }?>
			</optgroup>
	</select></td>
	</tr>
	<tr align="center">
		<td>Date/heure du rendez-vous:</td>
		<td><input type="text" name="date_heure_debut" id="date_heure_debut" value="" size="20" placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Observartion:</td>
		<td><textarea name="observation" id="observation"  placeholder="" class=""></textarea></td>
	</tr>
	<tr align="center">
		<td>Dossier:</td>
		<td><input type="text" name="dossier" id="dossier" value=""  size="20"placeholder="" class=""></td>
	</tr>
	
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
