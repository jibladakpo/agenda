<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
//script qui affiche tout les rendez-vous pris par un patient
?>

<html>
	<head>	
		<title>CHIC LFM Rdv patient</title>
	</head>

	<div id="corps">
<?php 
	

?>
	<?php 

	
	$id=$_GET['id_patient'];

?>
<?php 

$select = $db->query ("SELECT * FROM `agenda_patient`,`agenda_rdv`, `agenda_praticien`
		WHERE agenda_patient.id_patient = agenda_rdv.id_patient
		AND agenda_praticien.id_praticien = agenda_rdv.id_praticien
		AND agenda_patient.id_patient=$id
		ORDER by date_debut ASC");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>	
	<h1>Rendez-vous du patient: <a href="fiche_patient.php?action=afficher&amp;id_patient=<?php echo $s->id_patient?>"><?php echo $s->nom;?>  <?php echo $s->prenom;?> <?php echo "$s->date_naissance"; ?></a></h1>

		<table>	
			<tr>
			<th>Fiche rdv</th>
			 <th>Date rdv</th>
			<th>Heure rdv</th>
			<th>Médecin</th>
			<th>Description</th>
			</tr>
			<?php 

$select = $db->query ("SELECT * FROM `agenda_patient`,`agenda_rdv`, `agenda_praticien`
		WHERE agenda_patient.id_patient = agenda_rdv.id_patient
		AND agenda_praticien.id_praticien = agenda_rdv.id_praticien
		AND agenda_patient.id_patient=$id
		
		ORDER by date_debut ASC");

while ($s = $select->fetch ( PDO::FETCH_OBJ )){
?>
			
			<tr>
			<td> <a href="fiche_rdv.php?action=afficher&amp;id=<?php echo $s->id_rdv;?>"><img src="image/fiche.png" width="30"/></a></td>	
			<td  width=100><?php echo $s->date_debut;?></td>
			<td  width=100><?php echo $s->heure_deb;?></td>
			<td  width=100><?php echo $s->nom_medecin;?></td>	
			<td width=700><?php echo $s->observation;?></td>
			</tr>
			
			<?php }?>
		</table>
<script type="text/javascript">
function change()
{
	document.dt.submit();
}
</script>

</div>
</html>
