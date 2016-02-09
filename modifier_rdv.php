<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<?php 
if($_GET['action']=='modifier'){
	$id=$_GET['id'];
	
$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
						WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
						AND agenda_praticien.id_praticien = agenda_rdv.id_praticien
						AND agenda_rdv.id_rdv=$id ");
$s = $select->fetch ( PDO::FETCH_OBJ );
$id_praticien=$s->id_praticien;
?>

<?php if (isset ( $_POST ['submit'] )) {
	
	$id_praticien = ($_POST ['id_praticien']);
	$id_patient = ($_POST ['id_patient']);
	$date_debut = ($_POST ['date_debut']);
	$heure_deb = ($_POST ['heure_deb']);
	$observation = ($_POST ['observation']);
	$dossier = ($_POST ['dossier']);
	$motif = ($_POST ['motif']);
	$examen = ($_POST ['examen']);
	$articulation = ($_POST ['articulation']);
	
	
	foreach($_POST ['raison'] as $chkb2){
	
		$chk2 .= $chkb2." ";
	}
		$update = $db->prepare ("UPDATE agenda_rdv 
					SET id_patient = '".$id_patient."',
				id_praticien  = '".$id_praticien."', 
				date_debut = '".$date_debut."', 
				heure_deb = '".$heure_deb."', 
				observation = '".$observation."', 
				dossier = '".$dossier."',
				motif = '".$motif."',
				examen = '".$examen."',
				articulation = '".$articulation."',
				raison = '".$chk2."'
				WHERE id_rdv=$id");
		$update->execute ();
		
		echo '<script>alert("informations modifié")</script>';
		header ( 'location: rdv_jour.php?id_praticien='.$id_praticien.'&dt='.$date_debut.'' );
		}
	
?>
<html>

<head>
	<link rel="stylesheet" href="styles/formulaire.css">
	<title>CHIC LFM Modifier RDV</title>
</head>
<body>
<DIV ALIGN="CENTER">
<div id="corps">
	<h1>Modifier fiche rendez-vous</h1>
	<form action="" method="POST">

	<div>
	<label>Nom du patient:</label>
	<input type="hidden" name="id_patient" id=id_patient value="<?php echo $s->id_patient;?>"><input type="text" name="nom_patient" id="nom_patient" value="<?php echo "$s->nom"; ?>" size="20"placeholder="" class="">
	</div>
	
	<div>
	<label>Prénom du patient:</label>
	<input type="text" name="prenom_patient" id="prenom_patient" value="<?php echo "$s->prenom"; ?>" size="20"placeholder="" class="">
	</div>
	
	<div>
	<label>Nom du médecin:</label>
	
	
	<select name="id_praticien" id="id_praticien" >
	<?php $select = $db->query ("SELECT * FROM `agenda_praticien`");
	while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
	<option value="<?php echo $s->id_praticien;?>" <?php  if($s->id_praticien==$id_praticien)echo'selected';else'';?> >	<?php echo $s->nom_medecin;?></option>
	<?php }?>
	</select>
	
	

	

	
	</div>
	
	
	
<?php $select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
		WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
		AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
		AND agenda_rdv.id_rdv=$id ");
$s = $select->fetch ( PDO::FETCH_OBJ )	
?>
	<div>
	<label>Date :</label>
	<input type="text" name="date_debut" id="date_debut" value="<?php echo $s->date_debut;?>" size="20" placeholder="" class="">
	</div>
	
	<div>
	<label>Heure :</label>
	<input type="text" name="heure_deb" id="heure_deb" value="<?php echo $s->heure_deb;?>" size="20" placeholder="" class="">
	</div>
	
	<div>
	<label>Observation:</label>
	<textarea name="observation" id="observation"  placeholder="" class=""><?php echo $s->observation;?></textarea>
	</div>
	
	<div>
	<label>Dossier:</label>
			
		<INPUT type="checkbox" name="dossier" id="dossier" value="LFM"<?php if(strstr($s->dossier, "LFM")){echo" checked";}else{echo"";}?>> LFM
		<INPUT type="checkbox" name="dossier" id="dossier" value="ailleurs"<?php if(strstr($s->dossier, "ailleurs")){echo" checked";}else{echo"";}?>> ailleurs
		<INPUT type="checkbox" name="dossier" id="dossier" value="aucun"<?php if(strstr($s->dossier, "aucun")){echo" checked";}else{echo"";}?>> aucun
	</div>		
		
	<div>
	<label>Lieu du dossier:</label>
	<input type="text" name="dossier_lieu" id="dossier_lieu" value="<?php echo $s->dossier_lieu;?>" size="20" placeholder="" class="" >
	</div>
		<?php if($s->id_praticien == 2){// Dr Pages à modifier selon id_praticien?>
				<div>
				<label>Examen:</label>
		<INPUT type="checkbox" name="examen" id="examen" value="Déjà réalisé"<?php if(strstr($s->examen, "Déjà réalisé")){echo" checked";}else{echo"";}?>> Déjà réalisé
		<INPUT type="checkbox" name="examen" id="examen" value="A prévoir"<?php if(strstr($s->examen, "A prévoir")){echo" checked";}else{echo"";}?>> A prévoir
		
				
				</div>
				
				
				<div>
					<label>Articulation concerné:</label>
					<textarea name="articulation" id="articulation"  placeholder="" class=""></textarea>
				</div>
			<?php }?>
			
			<?php if($s->id_praticien == 1){// Dr Gombert à modifier selon id_praticien?> 
				<div>
				<label>Raison:</label>
		<INPUT type="checkbox" name="raison[]" id="raison" value="nez"<?php if(strstr($s->raison, "nez")){echo" checked";}else{echo"";}?>> Nez
		<INPUT type="checkbox" name="raison[]" id="raison" value="gorge"<?php if(strstr($s->raison, "gorge")){echo" checked";}else{echo"";}?>> Gorge
		<INPUT type="checkbox" name="raison[]" id="raison" value="oreille"<?php if(strstr($s->raison, "oreille")){echo" checked";}else{echo"";}?>> Oreille	
				
				</div>
				
			<?php }?>
	<div>
	<label>Motif:</label>
	<textarea name="motif" id="motif"  placeholder="" class=""><?php echo $s->motif;?></textarea>
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