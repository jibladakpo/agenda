<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
	
<html>
	<head>
		<title>CHIC LFM M�decin</title>
	</head>

	  <div id="corps">
    <DIV ALIGN="CENTER">
<h1><img src='image/steth.png' width='25'/> M�decins <img src='image/steth.png' width='25'/></h1>
<table>
<tr>
<th>fiche m�decin</th>
<th>Nom du M�decin</th>
<th>Sp�cialit�</th>
<th>Modifier</th>
<th>Supprimer</th>

<?php $select = $db->query ("SELECT * FROM `agenda_praticien` ORDER BY nom_medecin ASC");

while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
?>
	
  	 
   	<tr>      
   	<td> <a href="fiche_medecin.php?action=afficher&amp;id=<?php echo $s->id_praticien;?>"><img src="image/fiche.png" width="30"/></a></td>   
       <td width=400> <?php echo $s->nom_medecin;?> </td>
       <td width=400> <?php echo $s->specialite;?></td>      
      <td width=100><a href="modifier_medecin.php?action=modifier&amp;id=<?php echo $s->id_praticien;?>"> <img src="image/modifier.jpg" width="30"/></a> </td>
       <td width=100> <a href="supprimer_medecin.php?action=supprimer&amp;id=<?php echo $s->id_praticien;?>"> <img src="image/croix.jpg" width="30"/></a> </td>
       	
   	</tr>
	
<?php } ?>
</table>
	<br>

<a href="ajouter_medecin.php"> <img src='image/fleche.png' width='20'/> Ajouter un nouveau m�decin</a>
</DIV>
</div>
</html>	


