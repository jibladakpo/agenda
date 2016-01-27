<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<?php if (isset ( $_POST ['submit'] )) {

	$nom_medecin = ($_POST ['nom_medecin']);
	$specialite = ($_POST ['specialite']);
	$jour_presence = ($_POST ['jour_presence']);
	$heure_debut = ($_POST ['heure_debut']);
	$heure_fin = ($_POST ['heure_fin']);
	$duree_rdv = ($_POST ['duree_rdv']);
	
		$db->query ( "INSERT INTO agenda_praticien VALUES ('','" . $nom_medecin . "','" . $specialite . "','" . $jour_presence . "','" . $heure_debut . "','" . $heure_fin . "','" . $duree_rdv . "')" );
		
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
		<td>
	
<INPUT type="checkbox" name="jour_presence" id="jour_presence" value="lundi"> lundi
<INPUT type="checkbox" name="jour_presence" id="jour_presence" value="mardi"> mardi
<INPUT type="checkbox" name="jour_presence" id="jour_presence" value="mercredi"> mercredi
<INPUT type="checkbox" name="jour_presence" id="jour_presence" value="jeudi"> jeudi
<INPUT type="checkbox" name="jour_presence" id="jour_presence" value="vendredi"> vendredi
<INPUT type="checkbox" name="jour_presence" id="jour_presence" value="samedi"> samedi
<INPUT type="checkbox" name="jour_presence" id="jour_presence" value="dimanche"> dimanche

	</td>
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
