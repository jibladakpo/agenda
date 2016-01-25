<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<?php 

 mysql_connect("localhost", "root","");
mysql_select_db("agenda");
$select = $db->query ("select * from agenda_patient ");
$e = $select->fetch ( PDO::FETCH_OBJ );
$sql = "SELECT COUNT(id_patient) As nbPat FROM agenda_patient ORDER BY nom ASC";
$req=mysql_query($sql) or die (mysql_error());
$data=mysql_fetch_assoc($req);

$nbPat = $data['nbPat'];
$perPage = 30;
$nbPage = ceil($nbPat/$perPage);

if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage){
	$cPage = $_GET['p'];
	
}
else{
	$cPage=1;
}

?>	

<html>
<head>
 	<link rel="stylesheet" href="">
	<title>Patient</title>
</head>
	
<div id="corps">
	<h1>Patients</h1>	
	<a href="recherche_patient.php">=>Rechercher un patient</a>
	<br>
	<br>
	<a href="ajouter_patient.php">=>Ajouter un nouveau patient</a>
	<br>
	<br>
	
	<table>
			
			<tr>
			<th>Fiche patient</th>
			<th>Nom du Patient</th>
			<th>Date de naissance </th>
			<th>Modifier</th>
			<th>Supprimer</th>
			</tr>
	<?php 
		$select = $db->query ("SELECT nom, prenom, date_naissance,id_patient FROM `agenda_patient` ORDER BY nom ASC LIMIT ".(($cPage-1)*$perPage)." ,$perPage");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
	
			
 			 	<tr > 
 			 	<td > <a href="fiche_patient.php?action=afficher&amp;id=<?php echo $s->id_patient;?>"><img src="image/fiche.png" width="30"/></a></td>       
      				 <td width=400> <?php echo $s->nom;?> <?php echo $s->prenom;?></td> 
      				 <td width=400> <?php echo $s->date_naissance;?> </td> 
      				 <td width=100><a href="modifier_patient.php?action=modifier&amp;id=<?php echo $s->id_patient;?>"> <img src="image/modifier.jpg" width="30"/></a> </td>
      				<td width=100> <a href="supprimer_patient.php?action=supprimer&amp;id=<?php echo $s->id_patient;?>"> <img src="image/croix.jpg" width="30"/></a> </td>
      				  
  				</tr>
			
	
	

	<?php } ?>
</table>
<br>

	<?php for ($i=1;$i<=$nbPage;$i++){
	if($i==$cPage){
		echo "<style>.page{position:relative;}</style> <div class='page'>$i /</div>";
		
	}
	else{
		$select = $db->query ("select * from agenda_patient ");
		$e = $select->fetch ( PDO::FETCH_OBJ );
	echo "<style>.page{position:relative;display:inline-block;}</style> <div class='page'> <a href=\"patient.php?action=afficher&amp;id=$i&amp;p=$i\">$i </a>/</div>";
}
}
?>	
</div>
</html>