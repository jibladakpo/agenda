<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<div id="corps">
<DIV ALIGN="CENTER">
<h1>TEST</h1>
<?php 
function array_doublon($array){
	if (!is_array($array))
		return false;

		$r_valeur = Array();

		$array_unique = array_unique($array);

		if (count($array) - count($array_unique)){
			for ($i=0; $i<count($array); $i++) {
				if (!array_key_exists($i, $array_unique))
					$r_valeur[] = $array[$i];
			}
		}
		return $r_valeur;
}
?>
<?php 

		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
				AND agenda_rdv.id_praticien = 2
				AND agenda_rdv.date_debut = '09/02/2016'
				
				
				
				");
while ($s = $select->fetch ( PDO::FETCH_OBJ )){
	
$heure = array($s->heure_deb);



$heure_d = array_doublon($heure);
foreach ($heure_d as $heure_doublon){
	echo $heure_doublon;
}

$heure2 = $heure;
foreach($heure2 as $heure3){
	echo $heure3. ' ';
}

	
}

?>
<?php


$array_1 = array('pomme','banane','pomme','orange','orange');


// et pour utiliser la fonction "voir doublon"
$array_2 = array_doublon($array_1);
foreach ($array_2 as $array_3)
echo $array_3. ' ';
// affiche
// pommeorange 
?>

	
</DIV>
</div>
