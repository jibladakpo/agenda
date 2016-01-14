<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<?php if (isset ( $_POST ['submit'] )) {

	$nom = ($_POST ['nom']);
	$prenom = ($_POST ['prenom']);
	$date_naissance = ($_POST ['date_naissance']);
	$tel_fixe = ($_POST ['tel_fixe']);
	$adresse = ($_POST ['adresse']);
	$ville = ($_POST ['ville']);
	$cp = ($_POST ['cp']);
	$medecin_traitant = ($_POST ['medecin_traitant']);
	$dossier = ($_POST ['dossier']);
	$etablissement =($_POST ['etablissement']);
	
	
		$db->query ( "INSERT INTO agenda_patient VALUES ('','" . $nom . "','" . $prenom . "','" . $date_naissance . "','" . $tel_fixe . "','" . $adresse . "','" . $cp . "','" . $ville . "','". $medecin_traitant ."','". $dossier ."','" . etablissement .  "')" );
		
		echo '<script>alert("patient ajouté")</script>';
		header ( 'location: patient.php' );
		}
	
?>
<html>

<head>
	<link rel="stylesheet" href="">
	<title></title>
</head>
<div id="corps">
	<h1>Ajouter un nouveau patient</h1>
	<form action="" method="POST">
		<table>
		<tr align="center">
			<td>Nom:</td>
			<td><input type="text" name="nom" id="nom" value="" placeholder="" class=""></td>
		</tr>
		<tr align="center">
			<td>Prénom:</td>
			<td><input type="text" name="prenom" id="prenom" class=""></td>
		</tr>
		<tr align="center">
			<td>Date de naissance (écrire jours/mois/année):</td>
			<td><input type="text" name="date_naissance" id="date_naissance" value="" size="20" placeholder="" class=""></td>
		</tr>
		<tr align="center">
			<td>Téléphone:</td>
			<td><input type="text" name="tel_fixe" id="tel_fixe" value="" placeholder="" class=""></td>
		</tr>
		<tr align="center">
			<td>Adresse:</td>
			<td><input type="text" name="adresse" id="adresse" value="" placeholder="" class=""></td>
		</tr>
		<tr align="center">
			<td>Ville:</td>
			<td><input type="text" name="ville" id="ville" size=""></td>
		</tr>
		<tr align="center">
			<td>Code Postal:</td>
			<td><input type="text" name="cp" id="cp" size=""></td>
		</tr>
		<tr align="center">
			<td>Médecin Traitant:</td>
			<td><input type="text" name="medecin_traitant" id="medecin_traitant" placeholder="" size=""></td>
		</tr>
		
		<tr align="center">
			<td>Dossier (LFM, ailleurs, aucun):</td>
			<td><input type="text" name="etablissement" id="etablissement" placeholder="" size=""></td>
   	    </tr>	
	
		<tr align="center">
			<td>Etablissement à contacter si ailleur:</td>
			<td><input type="text" name="etablissement" id="etablissement" placeholder="" size=""></td>
   	    </tr>	
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
