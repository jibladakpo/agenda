<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<html>
<head>
<!-- partie calendrier -->
<title>CHIC LFM Agenda</title>

</head>

<?php 
if(isset($_GET['id_praticien']) && isset($_GET['mois']) && isset($_GET['annee']))
{
	$id_praticien=$_GET['id_praticien'];
	$mois=$_GET['mois'];
	$annee=$_GET['annee'];
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

$list_indispo=array();//Liste pour les jours indisponibles;  ==>NON DEVELLOPPER!
$list_vac=array();//Liste pour les jours de vacances; ==>NON DEVELLOPPER!
$date_jour= array(date('d/m/y'));//date du jour  ==>NON DEVELLOPPER!
$list_spe=array();//Mettez vos dates des evenements ; NB format(annee-m-j) ==>NON DEVELLOPPER!
$lien_redir="rdv_jour.php";//Lien de redirection apres un clic sur une date, NB la date selectionner va etre ajouter Ã  ce lien afin de la rÃ©cuperer ultÃ©rieurement 
$clic=1;//1==>Activer les clic sur tous les dates; 2==>Activer les clic uniquement sur les dates speciaux; 3==>Désactiver les clics sur tous les dates
$col1="#d6f21a";//couleur au passage du souris pour les dates normales ==>NON DEVELLOPPER!
$col2="#8af5b5";//couleur au passage du souris pour les dates speciaux ==>NON DEVELLOPPER!
$col3="#6a92db";//couleur au passage du souris pour les dates disponibles
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
$ccl2=array($col1,$col2,$col3);
$l_day=date("t",mktime(0,0,0,$mois,1,$annee));
$x=date("N", mktime(0, 0, 0, $mois,1 , $annee));
$y=date("N", mktime(0, 0, 0, $mois,$l_day , $annee));
$titre=$mois_fr[$mois]." : ".$annee;
//echo $l_day;
?>
<br>
<div id="corps">
<div class="wrapper_liste">
<h1>Calendrier</h1>
<!-- selection du médecin, mois et année -->
<form name="dt" method="get" action="">
<select name="id_praticien" id="id_praticien" onChange="change()" class="liste">
				<?php $select = $db->query ("SELECT * FROM `agenda_praticien`");
				while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
				?>
				<option value="<?php echo $s->id_praticien;?>" <?php if($s->id_praticien==$id_praticien)echo'selected';else'';?> ><?php echo $s->nom_medecin;?></option>
				<?php }?>
		</select>
<select name="mois" id="mois" onChange="change()" class="liste">
<?php
	for($i=1;$i<13;$i++)
	{
		echo '<option value="'.$i.'"';
		if($i==$mois)
			echo ' selected ';
		echo '>'.$mois_fr[$i].'</option>';
	}
?>
</select>
<select name="annee" id="annee" onChange="change()" class="liste">
<?php
	for($i=1950;$i<2500;$i++) // l'année va de 1950 à 2500
	{
		echo '<option value="'.$i.'"';
		if($i==$annee)
			echo ' selected ';
		echo '>'.$i.'</option>';
	}
?>
</select>


</form>
<table class="tableau"><caption><?php echo $titre ;?></caption>
<tr><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th><th>Dim</th></tr>
<tr>


<?php

//echo $y;
$case=0;
if($x>1)
	for($i=1;$i<$x;$i++)
	{
		echo '<td class="desactive">&nbsp;</td>';
		$case++;
	}
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
	$date = "date('d/m/Y')";
	$id= "$id_praticien";
	$lien=$lien_redir;
	$lien.="?action=afficher&amp;id_praticien=$id&amp;dt=".$da;
	echo "<td";
	if(in_array($date, $list_spe))
	{
		echo " class='special' onmouseover='over(this,1,2)'";
		if($clic==1||$clic==2)
			echo " onclick='go_lien(\"$lien\")' ";
	}
	else if(in_array($f, $list_dispo))
	{
		echo " class='dispo' onmouseover='over(this,2,2)'";
		if($clic==1||$clic==2)
			echo " onclick='go_lien(\"$lien\")' ";
	}
	else if(in_array($date,$date_jour)) //condition à revoir
	{
		echo " class='date_jour' onmouseover='over(this,2,2)'"; 
		if($clic==1||$clic==2)
			echo " onclick='go_lien(\"$lien\")' ";
	}
	else if(in_array($f, $list_indispo))
	{
		echo " class='indispo' onmouseover='over(this,0,2)'";
		if($clic==3)
			echo " onclick='go_lien(\"$lien\")' ";
	}
	else 
	{
		echo" onmouseover='over(this,0,2)' ";
		if($clic==3)
			echo " onclick='go_lien(\"$lien\")' ";
	}
	echo" onmouseout='over(this,0,1)'>$i</td>";
	$case++;
	if($case%7==0)
		echo "</tr><tr>";
	
}
if($y!=7)
	for($i=$y;$i<7;$i++)
	{
		echo '<td class="desactive">&nbsp;</td>';
	}
?></tr>
</table>


<script type="text/javascript">
function change()//fonction qui change les cases selon les critères (médecins,mois, années)
{
	document.dt.submit();
}
	function over(this_,a,t)
{
	<?php 
	echo "var c2=['$ccl2[0]','$ccl2[1]','$ccl2[2]'];";
	?>
	var col;
	if(t==2)
		this_.style.backgroundColor=c2[a];
	else
		this_.style.backgroundColor="";
}
function go_lien(a)
{
	top.document.location=a;
}
</script>
</div>
<!-- agenda du jour -->
<?php

//rqt sql
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

$da=$i."/".$mois."/".$annee;
?>

<div class="wrapper_liste">
<h1>Planning du jour</h1>

<table style="width:560px">

<tr bgcolor="#b3b3ff">
	<td colspan="5"><a href="fiche_medecin.php?action=afficher&amp;id_praticien=<?php echo$s->id_praticien;?>"  style="font-size:25px"><b><?php echo $s->nom_medecin?></b></a><br>
	 <h2><input type="hidden" name="id_patient" value="<?php echo $date = date('d/m/Y');?>"> <?php setlocale(LC_TIME, 'fra_fra'); echo strftime('%A %d %B %Y'); ?></h2></td>
	
</tr>

<tr>

		<?php 
		$select = $db->query ("SELECT * FROM `agenda_rdv`,`agenda_patient`, `agenda_praticien` 
				WHERE agenda_patient.id_patient = agenda_rdv.id_patient 
				AND agenda_praticien.id_praticien = agenda_rdv.id_praticien 
				AND agenda_rdv.id_praticien = $id_praticien
				AND agenda_rdv.date_debut LIKE '$date'
				ORDER BY heure_deb ASC
				");

		while ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) {
	?>

		<?php 		

	?>	
	<td width='100' bgcolor="#dddddd"> <?php echo $s->heure_deb ?></td>
<td width="500" bgcolor="#c1ffc1"><a href="fiche_rdv.php?action=afficher&amp;id=<?php echo $s->id_rdv?>">
									<?php echo $s->nom?> <?php echo $s->prenom?>
									<?php if(strstr($s->examen, "irm")){echo" <img src='image/irm.jpg' width='30'/>";}?>
									<?php if(strstr($s->examen, "radio")){echo" <img src='image/radio.png' width='30'/>";}?>
									<?php if(strstr($s->dossier, "LFM")){echo" <img src='image/logo chic.png' width='25'/>";}?>
									<?php if(strstr($s->dossier, "ailleurs")){echo" <img src='image/ailleurs.png' width='30'/>";}?>
									<?php if(strstr($s->dossier, "aucun")){echo" <img src='image/aucun.png' width='30'/>";}?>
									<?php if(strstr($s->raison, "nez")){echo" <img src='image/nez.png' width='30'/>";}?>
									<?php if(strstr($s->raison, "gorge")){echo" <img src='image/gorge.jpg' width='25'/>";}?>
									<?php if(strstr($s->raison, "oreille")){echo" <img src='image/oreille.png' width='30'/>";}?>
									<br><?php echo $s->observation?></a>
</td>
</tr>
<?php }?>





</table>



</div>
</div>

