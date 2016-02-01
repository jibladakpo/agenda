<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<?php 

 mysql_connect("localhost", "root","");
mysql_select_db("agenda");
$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien ");
$e = $select->fetch ( PDO::FETCH_OBJ );
$sql = "SELECT COUNT(id_rdv) As nbRdv FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien
						ORDER BY nom ASC";
$req=mysql_query($sql) or die (mysql_error());
$data=mysql_fetch_assoc($req);

$nbRdv = $data['nbRdv'];
$perPage = 30;
$nbPage = ceil($nbRdv/$perPage);

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
	<title>CHIC Rendez-vous</title>
</head>
	
<div id="corps">
<DIV ALIGN="CENTER">
<h1>Rendez-vous</h1>
</DIV>
</div>
<?php include_once ('recherche_rdv.php')?>
<div id="corps">
<DIV ALIGN="CENTER">

<table>
			<tr>
			<th>Fiche rdv</th>
			<th>Nom du médecin</th>
			<th>Nom du patient</th>
			<th>Date de naissance</th>
			<th>Date rdv</th>
			<th>Heure rdv</th>
			<th>Modifier</th>
			<th>Supprimer</th>		
			</tr>
	<?php 
		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
				ORDER BY date_debut ASC 
				LIMIT ".(($cPage-1)*$perPage)." ,$perPage");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>
					
 			 	<tr align="center"> 
 			 		 <td > <a href="fiche_rdv.php?action=afficher&amp;id=<?php echo $s->id_rdv;?>"><img src="image/fiche.png" width="30"/></a></td>    
 			 		 <td width=200> <a href="fiche_medecin.php?action=afficher&amp;id=<?php echo $s->id_praticien;?>"> <?php echo $s->nom_medecin;?></a></td>
      				 <td width=200> <a href="fiche_patient.php?action=afficher&amp;id=<?php echo $s->id_patient;?>"> <?php echo $s->nom;?> <?php echo $s->prenom;?></a></td>
      				 <td width=200><?php echo $s->date_naissance;?> </td>
      				 <td width=200><?php echo$s->date_debut; ?> </td>
      				 <td width=200><?php echo$s->heure_deb; ?> </td>
      				 <td ><a href="modifier_rdv.php?action=modifier&amp;id=<?php echo $s->id_rdv;?>"> <img src="image/modifier.jpg" width="30"/></a> </td>
      				 <td> <a href="supprimer_rdv.php?action=supprimer&amp;id=<?php echo $s->id_rdv;?>"> <img src="image/croix.jpg" width="30"/></a> </td>		 
  				</tr>
		
	<?php } ?>
</table>
<?php for ($i=1;$i<=$nbPage;$i++){
	if($i==$cPage){
		echo "<style>.page{position:relative;}</style> <div class='page'>$i /</div>";
		
	}
	else{
		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien ");
		$e = $select->fetch ( PDO::FETCH_OBJ );
	echo "<style>.page{position:relative;display:inline-block;}</style> <div class='page'> <a href=\"rdv.php?action=afficher&amp;id=$i&amp;p=$i\">$i </a>/</div>";
}
}
?>	
</DIV>
</div>
</html>