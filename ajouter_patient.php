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
	
	
		$db->query ( "INSERT INTO agenda_patient VALUES ('','" . $nom . "','" . $prenom . "','" . $date_naissance . "','" . $tel_fixe . "','" . $adresse . "','" . $cp . "','" . $ville . "','". $medecin_traitant ."','','" . etablissement .  "')" );
		
		echo '<script>alert("patient ajoutée")</script>';
		header ( 'location: patient.php' );
		}
	
?>
<html>
<link rel="stylesheet" href="">
<title></title>
<head>

</head>
<div id="corps">
	<h1>Ajouter un nouveau patient</h1>
	 <form action="" method="POST">
	<div><label>Nom:</label>
	<input type="text" name="nom" id="nom" value="" placeholder="" class="form-control"></div>
	<div><label>Prénom:</label>
	<input type="text" name="prenom" id="prenom" class="form-control"> </div>
	<div><label>Date de naissance:</label>
	<input type="date" name="date_naissance" id="date_naissance" value="" placeholder="" class=""></div>
	<div><label>Téléphone:</label>
	<input type="text" name="tel_fixe" id="tel_fixe" value="" placeholder="" class=""></div>
	<div><label>Adresse:</label>
	<input type="text" name="adresse" id="adresse" value="" placeholder="" class=""></div>
	<div><label>Ville:</label>
	<input type="text" name="ville" id="ville" size=""></div>
	<div><label>Code Postal:</label>
	<input type="text" name="cp" id="cp" size=""></div>
	<div><label>Médecin Traitant:</label>
	<input type="text" name="medecin_traitant" id="medecin_traitant" placeholder="" size=""></div>
	<label>Etablissement à contacter:</label>
	<input type="text" name="etablissemeent" id="etablissement" placeholder="" size=""><br>
    	
    
	
<div class="button">
        <button type="submit" name="submit">Valider</button>
      <button type="reset" >Annuler</button>
    </div>
</form>
</div>

</html>
