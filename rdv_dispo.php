<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<head>
<title>CHIC LFM rdv dipo</title>

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
require_once ('includes/condition_jour.php');
?>

<?php 

$jours_fr = Array("", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
$mois_fr = Array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août","Septembre", "Octobre", "Novembre", "Décembre");
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
<!-- liste déroulante -->
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
$l_day=date("t",mktime(0,0,0,$mois,1,$annee));
$x=date("N", mktime(0, 0, 0, $mois,1 , $annee));
$y=date("N", mktime(0, 0, 0, $mois,$l_day , $annee));
	for($i=1950;$i<2200;$i++) // l'année va de 1950 à 2500
	{
		echo '<option value="'.$i.'"';
		if($i==$annee)
			echo ' selected ';
		echo '>'.$i.'</option>';
	}
?>

</select>
		</form>
<!-- créneaux horaires -->		

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
<table style="display:inline-table" class="tab">

<tr>
<?php 
$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien = $id_praticien");
$s = $select->fetch ( PDO::FETCH_OBJ )
	?>
	
<?php 
for($i=1;$i<($l_day+1);$i++)

{
	$f=$y=date("N", mktime(0, 0, 0, $mois,$i , $annee));
	if($i<10)
		$i="0".$i;
		else
			$i=$i;
			if($mois<10)
				$mm="0".$mois;
				else
					$mm=$mois;
	$da=$i."/".$mm."/".$annee;

?>

<td width= 100  colspan= 2 bgcolor="#88c4ff"><input type="hidden" name="id_patient" value="<?php echo $da?>"><?php echo $jours_fr[$f]?> <?php echo $i?> <?php echo $mois_fr[$mois]?> <?php echo $annee?></td>

</tr>
<?php 
$select = $db->query ("SELECT * FROM `agenda_praticien` WHERE id_praticien = $id_praticien");
while ($s = $select->fetch ( PDO::FETCH_OBJ ) ){
	?>

<?php
	$h = horaire("$s->heure_debut", "$s->heure_fin", "$minute"); 
	foreach($h as $valeur) {
?>
<tr>

<td width='50' bgcolor="#dddddd"> <?php echo $valeur ?></td>
<?php if ($jours_fr[$f] == 'lundi' || $jours_fr[$f] == 'mardi' || $jours_fr[$f] == 'mercredi' || $jours_fr[$f] == 'jeudi' || $jours_fr[$f] == 'vendredi'){?>
<td colspan=2 width="10"><a href="recherche_patient2.php?action=afficher&amp;id_praticien=<?php echo $id_praticien;?>&amp;dt=<?php echo $da;?>&amp;h=<?php echo $valeur;?>"><img src='image/plus.jpg' width='20'/></a></td>
<?php } else {echo "<td colspan=2 width='10'><img src='image/croix.jpg' width='20'/></td> ";}?>
<?php }?>
</tr>
<?php 	
}}
?>
</table>
<br>
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