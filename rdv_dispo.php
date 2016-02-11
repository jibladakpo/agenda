<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<html>
<head>
<!-- partie calendrier -->
<title>CHIC LFM Agenda</title>

</head>

<br>
<div id="corps">
<div class="wrapper_liste">
<h1>Calendrier</h1>
<?php include_once('includes/calendrier.php')?>
<table>

	<tr>
		<td colspan=2>Légende</td>
	</tr>
	<tr>
		<td bgcolor="#9cbdfb"width=30></td>
		<td> Jours disponibles </td>
	</tr>
	<tr>
		<td bgcolor="#ffffff"width=30></td>
		<td>  Jours indisponibles </td>
	</tr>

</table>
</div>
<!-- agenda du jour -->
<?php

//rqt sql
$select = $db->query ("SELECT *
						FROM `agenda_praticien`
						WHERE agenda_praticien.id_praticien = $id_praticien");

$s = $select->fetch ( PDO::FETCH_OBJ );

?>



<?php
//converti les secondes en minutes
$total = $s->duree_rdv; //ton nombre de secondes 
$heure = intval(abs($total / 3600)); 
$total = $total - ($heure * 3600); 
$minute = intval(abs($total / 60)); 
$total = $total - ($minute * 60); 
$seconde = $total; 

?> 

<?php 
//fonction qui ajoute des minutes entre le debut et la fin d'heure
function horaire($heure_debut="00:00", $heure_fin="00:00", $pas=60){ 
$horaire = array(); 
$d = new DateTime($heure_debut); 
while ($d->format('H:i') <= $heure_fin) { 
$horaire[] = $d->format('H\hi'); 
$d->modify("+{$pas}min"); 
} 
return $horaire; 
} 

$da=$i."/".$mois."/".$annee;
?>

<div class="wrapper_liste">
<h1>Planning du jour</h1>

<table style="width:560px">

<tr bgcolor="#b3b3ff">
	<td colspan="5"><a href="fiche_medecin.php?action=afficher&amp;id=<?php echo$s->id_praticien;?>"  style="font-size:25px"><b><?php echo $s->nom_medecin?></b></a><br>
	 <h2><input type="hidden" name="date_jour" value="<?php echo $date = date('d/m/Y');?>"> <?php setlocale(LC_TIME, 'fra_fra'); echo strftime('%A %d %B %Y'); ?></h2>
	

<?php 
		$select = $db->query ("SELECT * FROM `agenda_absence`, `agenda_praticien`
				WHERE agenda_praticien.id_praticien = agenda_absence.id_praticien
				AND agenda_absence.id_praticien = $id_praticien
				AND date = '$da'
				
				");
$s = $select->fetch ( PDO::FETCH_OBJ );
?>

<input type='hidden' name='date' value='<?php echo'$da'?>'><?php if(isset($s->date)){echo'(absent)';}else{echo'(présent)';}?></td>
</tr>
<tr>

		<?php 
		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
				AND agenda_rdv.id_praticien = $id_praticien
				AND agenda_rdv.date_debut LIKE '$date'
				ORDER BY heure_deb ASC
				");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>

		<?php 		

	?>	
	<td width='100' bgcolor="#dddddd"> <?php echo $s->heure_deb ?></td>
<td width="500" bgcolor="#c1ffc1"><a href="fiche_rdv.php?action=afficher&amp;id=<?php echo $s->id_rdv?>">
									<?php echo $s->nom?> <?php echo $s->prenom?></a>
									<a href="" title="Examen déjà réalisé"><?php if(strstr($s->examen, "Déjà réalisé")){echo" <img src='image/radio_faite.gif' width='25'/>";}?></a>
									<a href="" title="Examen à prévoir"><?php if(strstr($s->examen, "A prévoir")){echo" <img src='image/radio a faire.jpg' width='25'/>";}?></a>
									<a href="" title="dossier à LFM"><?php if(strstr($s->dossier, "LFM")){echo" <img src='image/logo_chic_lfm.gif' width='25'/>";}?></a>
									<a href="" title="dossier à <?php echo $s->dossier_lieu;?>"><?php if(strstr($s->dossier, "ailleurs")){echo" <img src='image/ailleurs.jpg' width='25'/>";}?></a>
									<a href="" title="aucun"><?php if(strstr($s->dossier, "aucun")){echo" <img src='image/aucun dossier.gif' width='25'/>";}?></a>
									<a href="" title="nez"><?php if(strstr($s->raison, "nez")){echo" <img src='image/nez.gif' width='25'/>";}?></a>
									<a href="" title="gorge"><?php if(strstr($s->raison, "gorge")){echo" <img src='image/gorge.gif' width='35'/>";}?></a>
									<a href="" title="oreille"><?php if(strstr($s->raison, "oreille")){echo" <img src='image/oreille1.gif' width='25'/>";}?></a>
									<a href="" title="<?php echo $s->articulation;?>"><?php if($s->articulation == ""){echo"";}else{echo" <img src='image/os.png' width='25'/>";}?></a>
									<br><?php echo $s->observation?>
</td>
</tr>
<?php }?>

</table>

</div>
</div>

