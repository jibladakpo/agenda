<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<html>

	<head>
		
		<title>CHIC Rdv patient</title>
	</head>

	<div id="corps">
<?php 
	

?>
	<?php 
if(isset($_GET['id_praticien'])&& isset($_GET['id_patient']) )
{
	$id_praticien=$_GET['id_praticien'];
	$id=$_GET['id_patient'];
}

else
{
	$id_praticien=("1");
	$id=$_GET['id_patient'];
}
?>
<?php 

$select = $db->query ("SELECT * FROM `agenda_patient`,`agenda_rdv`, `agenda_praticien`
		WHERE agenda_patient.id_patient = agenda_rdv.id_patient
		AND agenda_praticien.id_praticien = agenda_rdv.id_praticien
		AND agenda_patient.id_patient=$id
		
		ORDER by date_debut ASC");
$s = $select->fetch ( PDO::FETCH_OBJ )
?>	
	<h1>Rendez-vous du patient: <a href="fiche_patient.php?action=afficher&amp;id=<?php echo $s->id_patient?>"><?php echo $s->nom;?>  <?php echo $s->prenom;?> <?php echo "$s->date_naissance"; ?></a></h1>
<form name="dt" method="get" action="">
Nom du médecin <select name="id_praticien" id="id_praticien"  onChange="change()" class="liste">
				<?php $select = $db->query ("SELECT * FROM `agenda_patient`,`agenda_rdv`, `agenda_praticien`
											WHERE agenda_patient.id_patient = agenda_rdv.id_patient
											AND agenda_praticien.id_praticien = agenda_rdv.id_praticien
											AND agenda_patient.id_patient=$id 
											GROUP BY nom_medecin");
				while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
				?>
				<option value="<?php echo $s->id_praticien;?>" <?php if($s->id_praticien==$id_praticien)echo'selected';else'';?> ><?php echo $s->nom_medecin;?></option>
				<?php }?>
				<input type="hidden" name="id_patient" value="<?php echo $id?>">
		</select>

</form>		
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
		AND agenda_praticien.id_praticien=$id_praticien
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
