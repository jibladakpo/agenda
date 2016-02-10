<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
$id_praticien=$_GET['id_praticien'];
?>
<html>
	<head>
		<title>CHIC LFM Absences</title>
	</head>

<div id="corps">
<DIV ALIGN="CENTER">

<h1>Absences</h1>

<?php $select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien = $id_praticien");

$s = $select->fetch ( PDO::FETCH_OBJ );
?>
<h2>><a href="ajouter_absence.php?action=ajouter&amp;id_praticien=<?php echo $id_praticien;?>">Ajouter une absence</a></h2>

<table>
	<tr>
		<th>Date</th>
		<th>Libellé</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	<tr>

<?php 

$select = $db->query ("SELECT * FROM `agenda_praticien`,`agenda_absence`
							 WHERE agenda_praticien.id_praticien = agenda_absence.id_praticien
							 AND agenda_praticien.id_praticien = $id_praticien
		");

while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
?>

  	<tr>       	 
       <td width=400> <?php echo $s->date;?> </td> 
       <td width=400> <?php echo $s->libelle;?></td>  	
        <td width=100><a href="modifier_absence.php?action=modifier&amp;id=<?php echo $id_praticien;?>"> <img src="image/modifier.jpg" width="30"/></a> </td>
       <td width=100> <a href="supprimer_absence.php?action=supprimer&amp;id=<?php echo $id_praticien;?>"> <img src="image/croix.jpg" width="30"/></a> </td>
   	</tr>  
 <?php } ?>  	  
</table>    

</DIV>
</div>
</html>