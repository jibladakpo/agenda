<?php
session_start();
try{
	
	$db = new PDO('mysql:host=localhost;dbname=agenda', 'root',''); 
	
	$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'"); //les contenues des champs prendra en compte lï¿½ensemble des caractï¿½res(utf8)
	
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); // les noms de champs seront en caracteres miniscule
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // les erreurs lanceront des exceptions

}catch(Exception $e){

	die('une erreur est survenue');

};

?>
<p><?php echo time();?></p> <!-- temps codé  -->
<p>date:<?php echo date('d/m/Y H:i:s', 1452843786); ?></p> <!-- temps décodé  -->
<p><?php echo mktime(12,30,0,12,25,2007);?></p>

<?php 

$select = $db->query ("SELECT nom, date_heure_debut, heure_debut, heure_fin , duree_rdv , observation, nom_medecin FROM `agenda_rdv`,`agenda_praticien`,`agenda_patient` 
						WHERE agenda_praticien.id_praticien = agenda_rdv.id_praticien AND agenda_rdv.id_patient = agenda_patient.id_patient AND agenda_praticien.id_praticien = 1");

$s = $select->fetch ( PDO::FETCH_OBJ )


?>


<?php
$total = $s->duree_rdv; //ton nombre de secondes 
$heure = intval(abs($total / 3600)); 
$total = $total - ($heure * 3600); 
$minute = intval(abs($total / 60)); 
$total = $total - ($minute * 60); 
$seconde = $total; 
echo "$heure  : $minute"; 
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

<p><?php echo date('d/m/Y', $s->date_heure_debut); ?></p>
<table>

<tr>
	<th>heure</th>
	<th>rendez-vous</th>
</tr>

<?php
			$h = horaire("$s->heure_debut", "$s->heure_fin", "$minute"); 
			foreach($h as $valeur) {
		?>
<tr>
	<td>
		 <?php echo $valeur ?>
	</td>
<td>
	<a href="fiche_rdv.php?action=afficher&amp;id=<?php echo $s->id_rdv;?>"><img src="image/plus.jpg" width="30"/></a>
</td>
</tr>
<?php }?>

</table>


<?php 

$select = $db->query ("SELECT nom, date_heure_debut, heure_debut, heure_fin , duree_rdv ,motif, nom_medecin FROM `agenda_rdv`,`agenda_praticien`,`agenda_patient` 
						WHERE agenda_praticien.id_praticien = agenda_rdv.id_praticien AND agenda_rdv.id_patient = agenda_patient.id_patient AND agenda_praticien.id_praticien = 1 ORDER BY date_heure_debut");

while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {


?>
<p><?php echo date('H:i', $s->date_heure_debut); ?> <?php echo "$s->nom"; ?> <?php echo "$s->motif"; ?></p>

<?php }?>


