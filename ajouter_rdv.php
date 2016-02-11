<?php 
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
//script pour ajouter un rendez-vous
?>
		<script type="text/javascript">
function change()
{
	document.dt.submit();
}

</script>
<?php 



if($_GET['action']=='ajouter'){
$action=$_GET['action'];
$_SESSION['action']=$action;
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
	$articulation = ($_POST ['articulation']);
	$raison = ($_POST ['raison']);
	
	
	
	foreach($_POST ['raison'] as $chkb2){
	
		$chk2 .= $chkb2." ";
	}
		$db->query ( "INSERT INTO agenda_rdv VALUES ('','" . $id_praticien .  "', '" . $id_patient . "','" . $date_debut . "','" . $heure_deb . "','" . $observation . "','" . $dossier . "','" . $dossier_lieu . "','" . $motif . "','" . $examen . "','" . $articulation . "','" . $chk2 . "')" );
		
		echo '<script>alert("rendez-vous pris")</script>';
		header ( 'location: rdv_jour.php?id_praticien='.$id_praticien.'&dt='.$d.'');
		}
	
?>
<html>
<link rel="stylesheet" href="">
<head>
	<link rel="stylesheet" href="styles/formulaire.css">
	<title>CHIC LFM Ajouter RDV</title>
</head>
<body>
<DIV ALIGN="CENTER">
<div id="corps">
	<h1>Prendre rendez-vous</h1>
	
	
	<!--<form name="dt" method="get" action="">
<select name="id_praticien" id="id_praticien" onChange="change()" class="liste2">
				<?php $select = $db->query ("SELECT * FROM `agenda_praticien`");
				while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
				?>
				<option value="<?php echo $s->id_praticien.'&='.$test;?>" <?php if($s->id_praticien==$id_praticien)echo'selected';else'';?> ><?php echo $s->nom_medecin;?></option>
				<?php }?>
		</select>
		</form>-->
	
	
	<form action="" method="POST">
	
<?php 	 

	$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id_patient='$id'");
$s = $select->fetch ( PDO::FETCH_OBJ );

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
	
	
	<select name="id_praticien" id="id_praticien" onChange="change()">
	<?php $select = $db->query ("SELECT * FROM `agenda_praticien`");
	while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
	<option value="<?php echo $s->id_praticien;?>" <?php  if($s->id_praticien==$id_praticien)echo'selected';else'';?> >	<?php echo $s->nom_medecin;?></option>
	<?php }?>
	</select>
	
	

	

	
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
		<label>Observation:</label>
		<textarea name="observation" id="observation"  placeholder="" class=""></textarea>
	</div>
	<?php 	 
	$select = $db->query ("SELECT * FROM `agenda_patient` WHERE id_patient='$id'");
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
		<INPUT type="checkbox" name="examen" id="examen" value="Déjà réalisé">Déjà réalisé
		<INPUT type="checkbox" name="examen" id="examen" value="A prévoir"> A prévoir
	
				
				</div>
						
				<div>
					<label>Articulation concernée:</label>
					<textarea name="articulation" id="articulation"  placeholder="" class=""></textarea>
				</div>
			<?php }?>
			
			<?php if($s->id_praticien == 1){?> <!-- modifier l'id selon les praticiens -->
				<div>
				<label>Raison:</label>
		<INPUT type="checkbox" name="raison[]" id="raison" value="nez"> Nez
		<INPUT type="checkbox" name="raison[]" id="raison" value="gorge"> Gorge
		<INPUT type="checkbox" name="raison[]" id="raison" value="oreille"> Oreille	
				
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