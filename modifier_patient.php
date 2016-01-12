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
	
	
		$db->query ("UPDATE agenda_patient 
					SET nom = '$nom',
				prenom  = '$prenom', 
				date_naissance = '$date_naissance', 
				tel_fixe = '$tel_fixe', 
				adresse = '$adresse', 
				cp = '$cp', 
				ville = '$ville', 
				medecin_traitant = '$medecin_traitant', 
				dossier = '$dossier', 
				etablissement = '$etablissement'
				WHERE id=$id");
		
		echo '<script>alert("patient ajouté")</script>';
		header ( 'location: patient.php' );
		}
	
?>
<?php 
if($_GET['action']=='modifier'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>
<html>

<head>
	<link rel="stylesheet" href="">
	<title></title>
</head>
<div id="corps">
	<h1>Modifier les informations concernant le patient</h1>
	<form action="" method="POST">
		<table>
		<tr align="center">
			<td>Nom:</td>
			<td><input type="text" name="nom" id="nom" placeholder="" value="<?php echo "$s->nom"; ?>" class=""></td>
		</tr>
		<tr align="center">
			<td>Prénom:</td>
			<td><input type="text" name="prenom" id="prenom"placeholder=""value="<?php echo "$s->prenom"; ?> " class=""></td>
		</tr>
		<tr align="center">
			<td>Date de naissance:</td>
			<td><input type="date" name="date_naissance" id="date_naissance" size="20" placeholder="" value="<?php echo "$s->date_naissance"; ?> " class=""></td>
		</tr>
		<tr align="center">
			<td>Téléphone:</td>
			<td><input type="text" name="tel_fixe" id="tel_fixe"  placeholder="" placeholder=">"value="<?php echo "$s->tel_fixe"; ?> " class=""></td>
		</tr>
		<tr align="center">
			<td>Adresse:</td>
			<td><input type="text" name="adresse" id="adresse" placeholder=""  value="<?php echo "$s->adresse"; ?> " class=""></td>
		</tr>
		<tr align="center">
			<td>Ville:</td>
			<td><input type="text" name="ville" id="ville"  placeholder="" value="<?php echo "$s->ville"; ?>"size=""></td>
		</tr>
		<tr align="center">
			<td>Code Postal:</td>
			<td><input type="text" name="cp" id="cp"  placeholder="" value="<?php echo "$s->cp"; ?>"size=""></td>
		</tr>
		<tr align="center">
			<td>Médecin Traitant:</td>
			<td><input type="text" name="medecin_traitant" id="medecin_traitant" placeholder="" value="<?php echo "$s->medecin_traitant"; ?>" size=""></td>
		</tr>
	
		<tr align="center">
			<td>Etablissement à contacter:</td>
			<td><input type="text" name="etablissemeent" id="etablissement" placeholder="" value="<?php echo "$s->etablissement"; ?>" size=""></td>
<?php }?>   	
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

