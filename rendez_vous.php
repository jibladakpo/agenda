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
				ORDER BY date_debut ASC ");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
<tr align="center">
		<td>Nom du patient:</td>
		<td><input type="hidden" name="id_patient" id=id_patient value="<?php echo $s->id_patient;?>"><input type="text" name="nom_patient" id="nom_patient" value="<?php echo "$s->nom"; ?>" size="20"placeholder="" class=""></td>
	</tr>
	<tr align="center">
		<td>Prénom du patient:</td>
		<td><input type="text" name="prenom_patient" id="prenom_patient" value="<?php echo "$s->prenom"; ?>" size="20"placeholder="" class=""></td>
	</tr>
<tr>
<td width=100><?php echo  $s->date_debut; ?></td>
<td width=100><?php echo $s->heure_debut; ?></td>
<td width=700><?php echo $s->nom;?> <?php echo $s->prenom;?><br>
				<?php echo $s->nom_medecin?><br>
				 <?php echo $s->observation;?>
</td>
</tr>
<?php }?>
</table>


</div>
</body>