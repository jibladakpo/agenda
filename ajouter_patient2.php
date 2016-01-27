<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<?php 

	$id=$_GET['id_praticien'];
	$d=$_GET['dt'];
	$h=$_GET['h'];	
?>
<?php if (isset ( $_POST ['submit'] )) {
	
	$nom = ($_POST ['nom']);
	$prenom = ($_POST ['prenom']);
	$date_naissance = ($_POST ['date_naissance']);
	$tel_fixe = ($_POST ['tel_fixe']);
	$mail = ($_POST ['mail']);
	$adresse = ($_POST ['adresse']);
	$ville = ($_POST ['ville']);
	$cp = ($_POST ['cp']);
	$medecin_traitant = ($_POST ['medecin_traitant']);
	
	
	
		$db->query ( "INSERT INTO agenda_patient VALUES ('','" . $nom . "','" . $prenom . "','" . $date_naissance . "','" . $tel_fixe . "','" . $mail . "','" . $adresse . "','" . $cp . "','" . $ville . "','". $medecin_traitant ."')" );
		
		echo 
		header ( 'location: patient.php' );
		'<script LANGUAGE="JavaScript">alert("patient enregistré")</script>';
		}
	
?>
<html>

<head>
	<link rel="stylesheet" href="styles/formulaire.css">
	<title></title>
</head>
<body>
<DIV ALIGN="CENTER">
<div id="corps">
	<h1>Ajouter un nouveau patient</h1>
	<form action="" method="POST">
		
		<div>
			<label>Nom:</label>
			<input type="text" name="nom" id="nom" value="" placeholder="" class="">
		</div>
		<div>
			<label>Prénom:</label>
			<input type="text" name="prenom" id="prenom" class="">
		</div>
		<div>
			<label>Date de naissance :</label>
			<input type="text" name="date_naissance" id="date_naissance" value="" size="20" placeholder="" class="">
		</div>
		<div>
			<label>Téléphone:</label>
			<input type="text" name="tel_fixe" id="tel_fixe" value="" placeholder="" class="">
		</div>
		
		<div>
			<label>Adresse mail:</label>
			<input type="text" name="mail" id="mail" value="" placeholder="" class="">
		</div>
		<div>
			<label>Adresse:</label>
			<input type="text" name="adresse" id="adresse" value="" placeholder="" class="">
		</div>
		<div>
			<label>Ville:</label>
			<input type="text" name="ville" id="ville" size="">
		</div>
		<div>
			<label>Code Postal:</label>
			<input type="text" name="cp" id="cp" size="">
		</div>
		<div>
			<label>Médecin Traitant:</label>
			<input type="text" name="medecin_traitant" id="medecin_traitant" placeholder="" size="">
		</div>
		
		<div class="button">
       		<button type="submit" name="submit">Valider</button>
     		<button type="reset" name="annuler">Annuler</button>
    	</div>
    			
    
	</form>
</div>
</DIV>
</body>
</html>
