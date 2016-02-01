<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<?php 
if($_GET['action']=='modifier'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id_patient=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )

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
	
	
	
		$update = $db->prepare ("UPDATE agenda_patient 
					SET nom = '".$nom."',
				prenom  = '".$prenom."', 
				date_naissance = '".$date_naissance."', 
				tel_fixe = '".$tel_fixe."',
				mail = '".$mail."',
				adresse = '".$adresse."', 
				cp = '".$cp."', 
				ville = '".$ville."', 
				medecin_traitant = '".$medecin_traitant."',
				
				
				WHERE id_patient=$id");
		$update->execute ();
		
		echo '<script>alert("patient ajouté")</script>';
		header ( 'location: patient.php' );
		}
	
?>
<html>

<head>
	<link rel="stylesheet" href="styles/formulaire.css">
	<title>CHIC LFM Modifier Patient</title>
</head>
<body>
<DIV ALIGN="CENTER">
<div id="corps">
	<h1>Modifier fiche patient</h1>
	<form action="" method="POST">
		<div>
			<label>Nom:</label>
			<input type="text" name="nom" id="nom" placeholder="" value="<?php echo "$s->nom"; ?>" class="">
		</div>
		<div>
			<label>Prénom:</label>
			<input type="text" name="prenom" id="prenom"placeholder=""value="<?php echo "$s->prenom"; ?> " class="">
		</div>
		<div>
			<label>Date de naissance:</label>
			<input type="text" name="date_naissance" id="date_naissance" size="20" placeholder="" value="<?php echo "$s->date_naissance"; ?> " class="">
		</div>
		<div>
			<label>Téléphone:</label>
			<input type="text" name="tel_fixe" id="tel_fixe"  placeholder="" placeholder=">"value="<?php echo "$s->tel_fixe"; ?> " class="">
		</div>
		<div>
			<label>Mail:</label>
			<input type="text" name="mail" id="mail"  placeholder="" placeholder=">"value="<?php echo "$s->mail"; ?> " class="">
		</div>
		<div>
			<label>Adresse:</label>
			<input type="text" name="adresse" id="adresse" placeholder=""  value="<?php echo "$s->adresse"; ?> " class="">
		</div>
		<div>
			<label>Ville:</label>
			<input type="text" name="ville" id="ville"  placeholder="" value="<?php echo "$s->ville"; ?>"size="">
		</div>
		<div>
			<label>Code Postal:</label>
			<input type="text" name="cp" id="cp"  placeholder="" value="<?php echo "$s->cp"; ?>"size="">
		</div>
		<div>
			<label>Médecin Traitant:</label>
			<input type="text" name="medecin_traitant" id="medecin_traitant" placeholder="" value="<?php echo "$s->medecin_traitant"; ?>" size="">
		</div>
		
		
<?php }?>   	
   	   
		
		<div class="button">
       		<button type="submit" name="submit">Valider</button>
     		<button type="reset" name="annuler">Annuler</button>
    	</div>
    		
	</form>
</div>
</DIV>
</body>
</html>

