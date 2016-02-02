<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<?php
//rqt sql
$select = $db->query ("SELECT *
						FROM `agenda_praticien`
						WHERE agenda_praticien.id_praticien = 1");

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
<body>
<div id="corps">
<h1>Rendez-vous</h1>
<table>
<tr>
<th>heure du rendez vous</th>
<th> description </th>
</tr>


<?php
			
			$h = horaire("$s->heure_debut", "$s->heure_fin", "$minute"); 
			foreach($h as $valeur) {
		?>
<tr>

		
		<?php 
		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
				AND agenda_rdv.id_praticien = 1
				AND agenda_rdv.date_debut = '02/02/2016'
				AND heure_deb = '$valeur'
				");

		 $s = $select->fetch ( PDO::FETCH_OBJ )
	?>
<?php if(isset($s->heure_deb)){ ?>


<?php }else{?>
<td width='100' bgcolor="#dddddd"> <?php echo $valeur ?></td><td colspan=2 width="10"><img src='image/plus.jpg' width='20'/></td>
<?php }?>
<?php }?>

</tr>

</table>

	
</div>
</body>