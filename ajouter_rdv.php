<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<?php if (isset ( $_POST ['submit'] )) {

	$id_praticien = ($_POST ['id_praticien']);
	$nom_medecin = ($_POST ['id_patient']);
	$nom_medecin = ($_POST ['date_heure_debut']);
	$nom_medecin = ($_POST ['observation']);
	$nom_medecin = ($_POST ['id_utilisateur']);
	$nom_medecin = ($_POST ['date_creation']);
	$nom_medecin = ($_POST ['date_motif']);
	$nom_medecin = ($_POST ['dossier']);
	$nom_medecin = ($_POST ['motif']);
	$nom_medecin = ($_POST ['examen']);
	
		
		$db->query ( "INSERT INTO agenda_rdv VALUES ('','" . $nom_medecin . "','" . $specialite . "','" . $jour_presence . "','" . $heure_debut . "','" . $heure_fin . "','" . $duree_rdv . "')" );
		
		echo '<script>alert("médecin ajoutée")</script>';
		header ( 'location: docteur.php' );
		}
	
?>
<html>
<link rel="stylesheet" href="">
<title></title>
<head>

</head>
<div id="corps">
	<h1>Ajouter un nouveau médecin</h1>
	<form action="" method="POST">
	 <table >
	<tr align="center">
		<td>Nom:</td>
		<td><input type="text" name="nom_medecin" id="nom_medecin" value="" size="20"placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Spécialité:</td>
		<td><input type="text" name="specialite" id="specialite" value="" size="20" placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Jours de présences:</td>
		<td><input type="text" name="jour_presence" id="jour_presence" value=""  size="20"placeholder="" class=""></td>
	</tr>
	
	<tr align="center">
		<td>Durée du rendez-vous:</td>
		<td><input type="text" name="duree_rdv" id="duree_rdv" value="" size="20" placeholder="" class=""></td>
	</tr>
	
	<tr align="center">
		<td>Heure début:</td>
		<td><input type="time" name="heure_debut" id="heure_debut" value="" size="20" placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Heure fin:</td>
		<td><input type="time" name="heure_fin" id="heure_fin" value="" size="20" placeholder="" class=""></td>
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
