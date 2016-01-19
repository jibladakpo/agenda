<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
	
<html>
	<head>
		 <link rel="stylesheet" href="">
		<title>Docteur</title>
	</head>

	  <div id="corps">
    
<h1>Docteurs</h1>
<table>
<tr>
<th>fiche médecin</th>
<th>Nom du Médecin</th>
<th>Spécialité</th>
<th>Modifier</th>
<th>Supprimer</th>

<?php $select = $db->query ("SELECT * FROM `agenda_praticien` ORDER BY nom_medecin ASC");

while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
?>
	
  	 
   	<tr>      
   	<td> <a href="fiche_medecin.php?action=afficher&amp;id=<?php echo $s->id_praticien;?>"><img src="image/fiche.png" width="30"/></a></td>   
       <td> <?php echo $s->nom_medecin;?> </td>
       <td> <?php echo $s->specialite;?></td>
      <td><a href="modifier_medecin.php?action=modifier&amp;id=<?php echo $s->id_praticien;?>"> <img src="image/modifier.jpg" width="30"/></a> </td>
       <td> <a href="supprimer_medecin.php?action=supprimer&amp;id=<?php echo $s->id_praticien;?>"> <img src="image/croix.jpg" width="30"/></a> </td>
       	
   	</tr>
	
<?php } ?>
</table>
	<br>

<a href="ajouter_medecin.php">=>Ajouter un nouveau médecin</a>
</div>
</html>	


