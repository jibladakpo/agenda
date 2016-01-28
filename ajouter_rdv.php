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
		header ( 'location: accueil.php');
		}
	
?>
<html>
<link rel="stylesheet" href="">
<head>
	<link rel="stylesheet" href="styles/formulaire.css">
	<title></title>
</head>
<body>
<DIV ALIGN="CENTER">
<div id="corps">
	<h1>Prendre rendez-vous</h1>
	<form action="" method="POST">
	
<?php 	 

	$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id_patient=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>
	<div>
		<label>Nom du patient:</label>
		<input type="hidden" name="id_patient" id=id_patient value="<?php echo $s->id_patient;?>"><input type="text" name="nom_patient" id="nom_patient" value="<?php echo "$s->nom"; ?>" size="20"placeholder="" class="">
	</div>
	
	<div>
		<label>Prénom du patient:</label>
		<input type="text" name="prenom_patient" id="prenom_patient" value="<?php echo "$s->prenom"; ?>" size="20"placeholder="" class="">
	</div>

<?php 	 

	$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien=$id_praticien");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>

	<div>
		<label>Nom du médecin:</label>
		<input type="hidden" name="id_praticien" id=id_praticien value="<?php echo $s->id_praticien;?>"><input type="text" name="nom_praticien" id="nom_praticien" value="<?php echo "$s->nom_medecin"; ?>" size="20"placeholder="" class="">
	</div>

	<div>
		<label>Date :</label>
		<input type="text" name="date_debut" id="date_debut" value="<?php echo $d;?>" size="20" placeholder="" class="">
	</div>
	
	<div>
		<label>Heure :</label>
		<input type="text" name="heure_deb" id="heure_deb" value="<?php echo $h;?>" size="20" placeholder="" class="">
	</div>
	
	<div>
		<label>Observartion:</label>
		<textarea name="observation" id="observation"  placeholder="" class=""></textarea>
	</div>
	<?php 	 
	$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id_patient=$id");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>
	<div>
		<label>Dossier :</label>
				
			<INPUT type="checkbox" name="dossier" id="dossier" value="LFM"> LFM
			<INPUT type="checkbox" name="dossier" id="dossier" value="ailleurs"> ailleurs
			<INPUT type="checkbox" name="dossier" id="dossier" value="aucun"> aucun
	</div>
	<div>		
		<label>Lieu du dossier:</label>
		<input type="text" name="dossier_lieu" id="dossier_lieu" value="" size="20" placeholder="" class="">
	</div>
<?php 	 

	$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien=$id_praticien");
$s = $select->fetch ( PDO::FETCH_OBJ )

?>	
	<?php if($s->id_praticien == 2){?> <!-- modifier l'id selon les praticiens -->
				<div>
				<label>Examen:</label>
		<INPUT type="checkbox" name="examen" id="examen" value="scanner">Scanner
		<INPUT type="checkbox" name="examen" id="examen" value="irm"> IRM
		<INPUT type="checkbox" name="examen" id="examen" value="radio"> Radio	
				
				</div>
						
				<div>
					<label>Articulation concerné:</label>
					<textarea name="articulation" id="articulation"  placeholder="" class=""></textarea>
				</div>
			<?php }?>
			
			<?php if($s->id_praticien == 9){?> <!-- modifier l'id selon les praticiens -->
				<div>
				<label>Raison:</label>
		<INPUT type="checkbox" name="raison" id="raison" value="nez"> Nez
		<INPUT type="checkbox" name="raison" id="raison" value="gorge"> Gorge
		<INPUT type="checkbox" name="raison" id="raison" value="oreille"> Oreille	
				
				</div>
				
			<?php }?>
	
	<div class="button">
        <button type="submit" name="submit">Valider</button>
        
    </div>
    
    
	</form>
</div>
</DIV>
</body>
</html>
<?php }?>