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
	<title>CHIC LFM Patient</title>
</head>
	

	<?php include_once('recherche_patient.php')?>

