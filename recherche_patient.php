<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<?php
if(isset($_POST['requete']) && $_POST['requete'] != NULL  || isset($_POST['requete2']) && $_POST['requete2'] != NULL ) // on v�rifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
{
mysql_connect('localhost','root','');
mysql_select_db('agenda'); // on se connecte � MySQL. Je vous laisse remplacer les diff�rentes informations pour adapter ce code � votre site.
$requete = htmlspecialchars($_POST['requete']); // on cr�e une variable $requete pour faciliter l'�criture de la requ�te SQL, mais aussi pour emp�cher les �ventuels malins qui utiliseraient du PHP ou du JS, avec la fonction htmlspecialchars().
$requete2 = htmlspecialchars($_POST['requete2']);
$query = mysql_query("SELECT * FROM agenda_patient WHERE nom LIKE '%$requete%' AND date_naissance LIKE '%$requete2%'OR prenom LIKE '%$requete%' AND date_naissance LIKE '%$requete2%' ORDER BY id_patient DESC") or die (mysql_error()); // la requ�te, que vous devez maintenant comprendre ;)
$nb_resultats = mysql_num_rows($query); // on utilise la fonction mysql_num_rows pour compter les r�sultats pour v�rifier par apr�s
if($nb_resultats != 0) // si le nombre de r�sultats est sup�rieur � 0, on continue
{
// maintenant, on va afficher les r�sultats et la page qui les donne ainsi que leur nombre, avec un peu de code HTML pour faciliter la t�che.
?>
<div id="corps">
<DIV ALIGN="CENTER">
<h1>R�sultats de votre recherche</h1>
<p>Nous avons trouv�  <?php echo  $nb_resultats; // on affiche le nombre de r�sultats 
if($nb_resultats > 1) { echo ' r�sultats '; } else { echo ' r�sultat '; } // on v�rifie le nombre de r�sultats pour orthographier correctement. 
?>
 dans notre base de donn�es.<br/>
<br/>
<?php
while($donnees = mysql_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouv�es, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>

<p><a href="fiche_patient.php?action=afficher&amp;id_praticien=&amp;id_patient=<?php echo $donnees['id_patient']; ?>"><?php echo $donnees['nom']; ?> <?php echo $donnees['prenom']; ?>  <?php echo $donnees['date_naissance']; ?></a></p>
<?php
} // fin de la boucle
?><br/>
<br/>
<p><a href="recherche_patient.php">Faire une nouvelle recherche</a></p>
</DIV>
</div>
<?php
}
else
{ // de nouveau, un peu de HTML
?>
<div id="corps2">
<DIV ALIGN="CENTER">
<h1>Pas de r�sultats</h1>
<p>Nous n'avons trouv� aucun r�sultat pour votre requ�te. <a href="recherche_patient.php">R�essayez</a> avec autre chose.</p>
<p><a href="ajouter_patient2.php" >Ajouter un nouveau patient</a></p>
<?php
}// Fini d'afficher l'erreur ^^
mysql_close(); // on ferme mysql
}
else
{ 
?>
</DIV>
</div>
<div id="corps2">
<DIV ALIGN="CENTER">

<h1>Recherche</h1>
 <form action="recherche_patient.php?" method="Post">
 	 nom ou pr�nom  <input type="text" name="requete" size="20"> Date de naissance  <input type="text" name="requete2" size="20">
	<input type="submit" value="Ok">
</form>
<br>
<a href="ajouter_patient.php"><img src='image/fleche.png' width='20'/> Ajouter un nouveau patient</a>
</DIV>
</div>
<?php
}
// et voil�, c'est fini !
?>


