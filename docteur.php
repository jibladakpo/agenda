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


<?php $select = $db->query ("SELECT * FROM `agenda_praticien` ORDER BY nom_medecin ASC");

while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
?>
	<table>

  	 
   	<tr>      
       <td> <a href="fiche_medecin.php?action=afficher&amp;id=<?php echo $s->id_praticien;?>">- <?php echo $s->nom_medecin;?> - <?php echo $s->specialite;?></a>
       <a href="modifier_medecin.php?action=modifier&amp;id=<?php echo $s->id_praticien;?>">/ modifier</a> 
       <a href="supprimer_medecin.php?action=supprimer&amp;id=<?php echo $s->id_praticien;?>">- supprimer</a>
       </td>	
   	</tr>
	</table>
	<br>

<?php } ?>

<a href="ajouter_medecin.php">=>Ajouter un nouveau m�decin</a>
</div>
</html>	


