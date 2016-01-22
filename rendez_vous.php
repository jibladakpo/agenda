<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<body>
<div id="corps">
<h1>Rendez-vous</h1>
<table>
<tr>
<th>date du rendez-vous</th>
<th>heure du rendez vous</th>
<th> description </th>
</tr>

<?php 
		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
				AND agenda_rdv.id_praticien = 1
				ORDER BY date_heure_debut ASC ");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>

<tr>
<td width=100><?php echo date('d/m/Y', $s->date_heure_debut); ?></td>
<td width=100><?php echo date('H\hi', $s->date_heure_debut); ?></td>
<td width=700><?php echo $s->nom;?> <?php echo $s->prenom;?><br>
				<?php echo $s->nom_medecin?><br>
				 <?php echo $s->observation;?>
</td>
</tr>
<?php }?>
</table>


</div>
</body>