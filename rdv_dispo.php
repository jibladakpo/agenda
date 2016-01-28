<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<head>
<title>Planning rendez-vous disponible</title>

<link href="" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="corps">
<DIV ALIGN="CENTER">
<h1>Planning horaires disponibles</h1>
<?php if(isset($_GET['id_praticien']) && isset($_GET['mois']) && isset($_GET['annee']))
{
	$id_praticien=$_GET['id_praticien'];
	$annee=$_GET['annee'];
	$mois=$_GET['mois'];
$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien=$id_praticien");
$s = $select->fetch ( PDO::FETCH_OBJ );
}
else
{
	$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien=1");
	$s = $select->fetch ( PDO::FETCH_OBJ );

}
?>

<?php 

$jours_fr = Array("", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
$mois_fr = Array("", "Janvier", "F�vrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Ao�t","Septembre", "Octobre", "Novembre", "D�cembre");
if(isset($_GET['id_praticien']) && isset($_GET['mois']) && isset($_GET['annee']))
{
	$id_praticien=$_GET['id_praticien'];
	$mois=$_GET['mois'];
	$annee=$_GET['annee'];
}
else
{
	$id_praticien=("1");
	$mois=date("n");
	$annee=date("Y");
}

?>
<!-- liste d�roulante -->
<form name="dt" method="get" action="">
<select name="id_praticien" id="id_praticien" onChange="change()" class="liste">
				<?php $select = $db->query ("SELECT * FROM `agenda_praticien`");
				while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
				?>
				<option value="<?php echo $s->id_praticien;?>" <?php if($s->id_praticien==$id_praticien)echo'selected';else'';?> ><?php echo $s->nom_medecin;?></option>
				<?php }?>
		</select>
		<select name="mois" id="mois" onChange="change()" class="liste">
				<?php for($i=1;$i<13;$i++)
					{
						echo '<option value=  "'.$i.'"';
						if($i==$mois)
							echo ' selected ';
							echo '>' .$mois_fr[$i].'</option>';
					}
				?>	
		</select>
		
		<select name="annee" id="annee" onChange="change()" class="liste">
<?php
	for($i=1950;$i<2200;$i++) // l'ann�e va de 1950 � 2500
	{
		echo '<option value="'.$i.'"';
		if($i==$annee)
			echo ' selected ';
		echo '>'.$i.'</option>';
	}
?>

</select>
		</form>
<!-- cr�neaux horaires -->		
<!--  		
<?php 
for($i=1;$i<32;$i++) 
{
	echo '<p>'.$i.'</p>';
}
?>
-->
<?php 
$select = $db->query ("SELECT *
						FROM `agenda_praticien`
						WHERE agenda_praticien.id_praticien = $id_praticien");

$s = $select->fetch ( PDO::FETCH_OBJ );

?>
<?php
//converti les secondes en minutes
$total = $s->duree_rdv; //ton nombre de secondes 
$heure = intval(abs($total / 3600)); 
$total = $total - ($heure * 3600); 
$minute = intval(abs($total / 60)); 
$total = $total - ($minute * 60); 
$seconde = $total; 

?> 

<table>

<?php 
$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien = $id_praticien");
while ($s = $select->fetch ( PDO::FETCH_OBJ ) ){
	?>
<tr>	
<td><?php echo $s->jour_presence?></td>
<tr>
<?php
	$h = horaire("$s->heure_debut", "$s->heure_fin", "$minute"); 
	foreach($h as $valeur) {
?>
<tr>

<td width='100' bgcolor="#dddddd"> <?php echo $valeur ?></td>

<?php }}?>
</tr>
</table>

<?php 
//fonction qui ajoute des minutes entre le debut et la fin d'heure
function horaire($heure_debut="00:00", $heure_fin="00:00", $pas=60){ 
$horaire = array(); 
$d = new DateTime($heure_debut); 
while ($d->format('H:i') <= $heure_fin) { 
$horaire[] = $d->format('H\hi'); 
$d->modify("+{$pas}min"); 
} 
return $horaire; 
} 
//Appel 

?>

<!-- fonction  -->
		<script type="text/javascript">
function change()
{
	document.dt.submit();
}


</script>
		
</DIV>
</div>
</body>