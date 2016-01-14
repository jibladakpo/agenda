<?php
require_once ('includes/connexion_bdd.php'); // inclure une fois le fichier header.php qui se trouve dans le dossier includes
require_once ('includes/header.php');
?>

<div id="corps">
	<h1>Calendrier</h1>
	
		<select>
			<optgroup label="Médecins">
				<?php $select = $db->query ("SELECT * FROM `agenda_praticien` ORDER BY nom_medecin ASC");
				while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
				?>
				<option><?php echo $s->nom_medecin;?></option>
				<?php }?>
			</optgroup>
		</select>
		<?php $select = $db->query ("SELECT * FROM `agenda_calendrier` GROUP BY mois_libelle   ");
				while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
				?>
				<?php echo $s->mois_libelle;?>|
				<?php }?>
		  
		 <br>
		


</div>