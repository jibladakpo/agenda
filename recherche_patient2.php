<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>
<head>

<title>CHIC LFM Recherche</title>

</head>
<?php
if(isset($_POST['requete']) && $_POST['requete'] != NULL  || isset($_POST['requete2']) && $_POST['requete2'] != NULL ) // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
{
mysql_connect('localhost','root','');
mysql_select_db('agenda'); // on se connecte à MySQL. Je vous laisse remplacer les différentes informations pour adapter ce code à votre site.
$requete = htmlspecialchars($_POST['requete']); // on crée une variable $requete pour faciliter l'écriture de la requête SQL, mais aussi pour empêcher les éventuels malins qui utiliseraient du PHP ou du JS, avec la fonction htmlspecialchars().
$requete2 = htmlspecialchars($_POST['requete2']);
$query = mysql_query("SELECT * FROM agenda_patient WHERE nom LIKE '%$requete%' AND date_naissance LIKE '%$requete2%'OR prenom LIKE '%$requete%' AND date_naissance LIKE '%$requete2%' ORDER BY id_patient DESC") or die (mysql_error()); // la requête, que vous devez maintenant comprendre ;)
$nb_resultats = mysql_num_rows($query); // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
{
// maintenant, on va afficher les résultats et la page qui les donne ainsi que leur nombre, avec un peu de code HTML pour faciliter la tâche.
?>
<div id="corps">
<DIV ALIGN="CENTER">
<h1>Résultats de votre recherche</h1>
<p>Nous avons trouvé  <?php echo  $nb_resultats; // on affiche le nombre de résultats 
if($nb_resultats > 1) { echo ' résultats '; } else { echo ' résultat '; } // on vérifie le nombre de résultats pour orthographier correctement. 
?>
 dans notre base de données.<br/>
<br/>
<?php
while($donnees = mysql_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<?php 

	$id_praticien=$_GET['id_praticien'];
	$d=$_GET['dt'];
	$h=$_GET['h'];	
?>
<p><?php echo $donnees['nom']; ?> <?php echo $donnees['prenom']; ?>
	 <?php echo $donnees['date_naissance']; ?><a href="ajouter_rdv.php?action=ajouter&amp;id=<?php echo $donnees['id_patient']; ?>&amp;id_praticien=<?php echo $id_praticien;?>&amp;h=<?php echo $h;?>&amp;dt=<?php echo $d;?>"> 
	<input type="button" value="Prendre rendez-vous"
	name="ajouter_rdv">
</a></p>
<?php
} // fin de la boucle
?><br/>
<br/>
<p><a href="recherche_patient2.php?&amp;id_praticien=<?php echo $id_praticien;?>&amp;h=<?php echo $h;?>&amp;dt=<?php echo $d;?>">Faire une nouvelle recherche</a></p>
</div>
</div>
<?php
}
else
{ // de nouveau, un peu de HTML
?>
<div id="corps">
<h1>Pas de résultats</h1>
<p>Nous n'avons trouvé aucun résultat pour votre requête. <a href="recherche_patient.php">Réessayez</a> avec autre chose.</p>
<p><a href="ajouter_patient2.php?id_praticien=<?php echo $id;?>&amp;h=<?php echo $h;?>&amp;dt=<?php echo $d;?>">Ajouter un nouveau patient</a></p>
<?php
}// Fini d'afficher l'erreur ^^
mysql_close(); // on ferme mysql
}
else
{ 
?>
<?php $id=$_GET['id_praticien'];
$d=$_GET['dt'];
$h=$_GET['h'];
?>
</DIV>
</div>
<head>
	<link rel="stylesheet" href="styles/recherche.css">
</head>
<div id="corps">
<DIV ALIGN="CENTER">
	<h1><img src='image/loupe.jpg' width='25'/> Recherche Patient</h1>
</DIV>

 <form action="recherche_rdv.php" method="Post">
 <div>
 <label>Nom ou prénom </label>
 <input type="text" name="requete" size="20">
</div> 

<div>
<label>Date de naissance </label> 
 <input type="text" name="requete2" size="20">
</div>   

<div class="button">
	<input type="submit" value="Rechercher">
</div> 
</form>

</div>

<?php
}
// et voilà, c'est fini !
?>

