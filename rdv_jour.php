<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<head>
<title>Agenda en PHP</title>

<link href="styles/calendrier2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<DIV ALIGN="CENTER">

<!--  ========Partie calendrier======== -->



<!--  ========Partie agenda======== -->


<?php
if($_GET['action']=='afficher'){
$id=$_GET['id_praticien'];
}
$d=$_GET['dt'];

$select = $db->query ("SELECT nom, date_heure_debut, heure_debut, heure_fin,agenda_praticien.id_praticien ,duree_rdv , observation, nom_medecin FROM `agenda_rdv`,`agenda_praticien`,`agenda_patient` 
						WHERE agenda_praticien.id_praticien = agenda_rdv.id_praticien AND agenda_rdv.id_patient = agenda_patient.id_patient 
						AND agenda_praticien.id_praticien = 1");

$s = $select->fetch ( PDO::FETCH_OBJ )

?>


<?php
$total = $s->duree_rdv; //ton nombre de secondes 
$heure = intval(abs($total / 3600)); 
$total = $total - ($heure * 3600); 
$minute = intval(abs($total / 60)); 
$total = $total - ($minute * 60); 
$seconde = $total; 

?> 

<?php 
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

<tr>
	<td colspan="2"><a href="fiche_medecin.php?action=afficher&amp;id=<?php echo$s->id_praticien;?>"><?php echo $s->nom_medecin?></a><br>
	Date: <?php echo $d;?></td>
	
</tr>

<?php
			$h = horaire("$s->heure_debut", "$s->heure_fin", "$minute"); 
			foreach($h as $valeur) {
		?>
<tr>
	<td width="300"> <?php echo $valeur ?></td>
<td width="700"><a href="recherche_patient.php?action=afficher&amp;id=<?php echo $s->id_rdv;?>"><img src="image/plus.jpg" width="30"/></a></td>
</tr>
<?php }?>

</table>

</DIV>
</body>


