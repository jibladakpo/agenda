<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<head>
<title>Agenda en PHP</title>

<link href="styles/calendrier2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="corps">
<DIV ALIGN="CENTER">

<!--  ========Partie calendrier======== -->



<!--  ========Partie agenda======== -->


<?php
//recupération des variables id_praticien et date
$id_praticien=$_GET['id_praticien'];
$d=$_GET['dt'];

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
//Appel 

?>
<h1>Horaires disponibles</h1>

<table>

<tr bgcolor="#b3b3ff">
	<td colspan="5"><a href="fiche_medecin.php?action=afficher&amp;id_praticien=<?php echo$s->id_praticien;?>"  style="font-size:25px"><b><?php echo $s->nom_medecin?></b></a><br>
	Date: <?php echo $d;?></td>
	
</tr>



<?php
			
			$h = horaire("$s->heure_debut", "$s->heure_fin", "$minute"); 
			foreach($h as $valeur) {
		?>
<tr>
<td width='100' bgcolor="#dddddd"> <?php echo $valeur ?></td>
		<?php 
		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
				AND agenda_rdv.id_praticien = $id_praticien
				AND agenda_rdv.date_debut = '$d'
				");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>

		<?php 		
	if($s->heure_deb == $valeur){
	?>	
<td width="500" bgcolor="#c1ffc1"><a href="fiche_rdv.php?action=afficher&amp;id=<?php echo $s->id_rdv?>"><?php echo $s->nom?> <?php echo $s->prenom?><br><?php echo $s->observation?></a></td>
<?php }}?>

<?php if($valeur){?>
<td colspan=2 width="500"><a href="recherche_patient2.php?action=afficher&amp;id_praticien=<?php echo $id_praticien;?>&amp;dt=<?php echo $d;?>&amp;h=<?php echo $valeur;?>"><img src='image/plus.jpg' width='20'/></a></td>
<?php }?>
<?php }?>


</tr>
</table>

</DIV>
</div>
</body>


