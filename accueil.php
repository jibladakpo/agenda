<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<head>
<title>Agenda en PHP</title>

<link href="styles/calendrier.css" rel="stylesheet" type="text/css" />
</head>
<body>
<DIV ALIGN="CENTER">

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

$list_indispo=array();//Liste pour les jours indisponibles; 
$list_vac=array();//Liste pour les jours de vacances; 
$list_spe=array();//Mettez vos dates des evenements ; NB format(annee-m-j)
$lien_redir="rdv_jour.php";//Lien de redirection apres un clic sur une date, NB la date selectionner va etre ajouter Ã  ce lien afin de la rÃ©cuperer ultÃ©rieurement 
$clic=1;//1==>Activer les clic sur tous les dates; 2==>Activer les clic uniquement sur les dates speciaux; 3==>Désactiver les clics sur tous les dates
$col1="#d6f21a";//couleur au passage du souris pour les dates normales
$col2="#8af5b5";//couleur au passage du souris pour les dates speciaux
$col3="#6a92db";//couleur au passage du souris pour les dates disponibles
$mois_fr = Array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août","Septembre", "Octobre", "Novembre", "Décembre");
if(isset($_GET['id_praticien']) && isset($_GET['mois']) && isset($_GET['annee']))
{
	$id_praticien=$_GET['id_praticien'];
	$mois=$_GET['mois'];
	$annee=$_GET['annee'];
}
else
{
	$id_praticien=("p");
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


<!-- selection du médecin, mois et année -->
<form name="dt" method="get" action="">
<select name="id_praticien" id="id_praticien" onChange="change()" class="liste">
				<?php $select = $db->query ("SELECT * FROM `agenda_praticien` ORDER BY nom_medecin ASC");
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

 $select = $db->query ("SELECT * FROM `agenda_praticien` ORDER BY nom_medecin ASC");

 ( $s = $select->fetch ( PDO::FETCH_OBJ ) ) 
 
	?>
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
	$da=$i."/".$mois."/".$annee;
	$id_praticien= "$s->id_praticien";
	$lien=$lien_redir;
	$lien.="?action=afficher&amp;id_praticien=$id_praticien&amp;dt=".$da;
	echo "<td";
	if(in_array($da, $list_spe))
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
function change()
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
</DIV>

</body>
