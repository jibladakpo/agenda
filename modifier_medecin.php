<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<?php 
if($_GET['action']=='modifier'){
	$id=$_GET['id'];
$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien=$id");
$s = $select->fetch ( PDO::FETCH_OBJ );


?>

<?php if (isset ( $_POST ['submit'] )) {
	
	$nom_medecin = ($_POST ['nom_medecin']);
	$specialite = ($_POST ['specialite']);
	$jour_presence = ($_POST ['jour_presence']);
	$heure_debut = ($_POST ['heure_debut']);
	$heure_fin = ($_POST ['heure_fin']);
	$duree_rdv = ($_POST ['duree_rdv']);
	
	foreach($_POST ['jour_presence'] as $chkb){	
		
		$chk .= $chkb." ";
	}
		$update = $db->prepare ("UPDATE agenda_praticien 
					SET nom_medecin = '".$nom_medecin."',
				specialite  = '".$specialite."', 
				jour_presence = '".$chk ."', 
				heure_debut = '".$heure_debut."', 
				heure_fin = '".$heure_fin."', 
				duree_rdv = '".$duree_rdv."'
				WHERE id_praticien=$id");
		$update->execute ();
	
		echo '<script>alert("informations modifié")</script>';
		header ( 'location: medecin.php' );
		}
	
?>
<html>

<head>
	<link rel="stylesheet" href="styles/formulaire.css">
	<title>CHIC LFM Modifier Médecin</title>
</head>
<body>
<DIV ALIGN="CENTER">
<div id="corps">

	<h1>Modifier fiche médecin</h1>
	<form action="" method="POST">
		
	<div>
	<label>Nom:</label>
		<input type="text" name="nom_medecin" size="80" id="nom_medecin" placeholder="" value="<?php echo "$s->nom_medecin"; ?>" class="">
	</div>	
	<div>	
	<label>Spécialité:</label>
		<input type="text" name="specialite"size="80" id="specialite"placeholder=""value="<?php echo "$s->specialite"; ?> " class="">
	</div>	
		
	<div>	
	<label>Jours de présences:</label>
			<INPUT type="checkbox" name="jour_presence[]" id="jour_presence" value="lundi"<?php if(strstr($s->jour_presence, "lundi")){echo" checked";}else{echo"";}?>> lundi
			<INPUT type="checkbox" name="jour_presence[]" id="jour_presence" value="mardi"<?php if(strstr($s->jour_presence, "mardi")){echo "checked";}else{echo"";}?>> mardi
			<INPUT type="checkbox" name="jour_presence[]" id="jour_presence" value="mercredi"<?php if(strstr($s->jour_presence, "mercredi")) {echo"checked";}else{echo"";}?>> mercredi
			<INPUT type="checkbox" name="jour_presence[]" id="jour_presence" value="jeudi"<?php if(strstr($s->jour_presence, "jeudi")){echo"checked";}else{echo"";}?>> jeudi
			<INPUT type="checkbox" name="jour_presence[]" id="jour_presence" value="vendredi"<?php if(strstr($s->jour_presence, "vendredi")){echo"checked";}else{echo"";}?>> vendredi
			<INPUT type="checkbox" name="jour_presence[]" id="jour_presence" value="samedi"<?php if(strstr($s->jour_presence, "samedi"))echo"checked";}else{echo"";}?>> samedi
			<INPUT type="checkbox" name="jour_presence[]" id="jour_presence" value="dimanche"<?php if(strstr($s->jour_presence, "dimanche")){echo"checked";}else{echo"";}?>> dimanche
	</div>
	
	<div>	
	<label>Durée du rendez-vous:</label>
		<input type="text" name="duree_rdv" size="80" id="duree_rdv"  placeholder="" value="<?php echo "$s->duree_rdv"; ?>"size="">
	</div>	
	<div>	
	<label>Heure début <br>(heure:minute):</label>
		<input type="text" name="heure_debut" size="80" id="heure_debut"  placeholder="" placeholder=">"value="<?php echo "$s->heure_debut"; ?> " class="">
	</div>
		
	<div>	
	<label>Heure fin <br>(heure:minute):</label>
		<input type="text" name="heure_fin" size="80" id="heure_fin" placeholder=""  value="<?php echo "$s->heure_fin"; ?> " class="">
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

