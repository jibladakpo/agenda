<?php
require_once ('includes/connexion_bdd.php');
require_once ('includes/header.php');
?>

<?php
if(isset($_POST['requete']) && $_POST['requete'] != NULL) // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
{
mysql_connect('localhost','root','');
mysql_select_db('agenda'); // on se connecte à MySQL. Je vous laisse remplacer les différentes informations pour adapter ce code à votre site.
$requete = htmlspecialchars($_POST['requete']); // on crée une variable $requete pour faciliter l'écriture de la requête SQL, mais aussi pour empêcher les éventuels malins qui utiliseraient du PHP ou du JS, avec la fonction htmlspecialchars().
$query = mysql_query("SELECT * FROM agenda_patient WHERE nom LIKE '%$requete%'OR prenom LIKE '%$requete%'  ORDER BY id DESC") or die (mysql_error()); // la requête, que vous devez maintenant comprendre ;)
$nb_resultats = mysql_num_rows($query); // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
{
// maintenant, on va afficher les résultats et la page qui les donne ainsi que leur nombre, avec un peu de code HTML pour faciliter la tâche.
?>
<div id="corps">
<h3>Résultats de votre recherche.</h3>
<p>Nous avons trouvé  <?php echo  $nb_resultats; // on affiche le nombre de résultats 
if($nb_resultats > 1) { echo ' résultats '; } else { echo ' résultat '; } // on vérifie le nombre de résultats pour orthographier correctement. 
?>
 dans notre base de données.<br/>
<br/>
<?php
while($donnees = mysql_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<a href="fiche_patient.php?action=afficher&amp;id=<?php echo $donnees['id_patient']; ?>"><?php echo $donnees['nom']; ?> <?php echo $donnees['prenom']; ?></a><br/>
<?php
} // fin de la boucle
?><br/>
<br/>
<a href="recherche_patient.php">Faire une nouvelle recherche</a></p>
</div>
<?php
}
else
{ // de nouveau, un peu de HTML
?>
<div id="corps">
<h1>Pas de résultats</h1>
<p>Nous n'avons trouvé aucun résultat pour votre requête. <a href="recherche_patient.php">Réessayez</a> avec autre chose.</p>
<p><a href="ajouter_patient">Ajouter un nouveau patient</a></p>
<?php
}// Fini d'afficher l'erreur ^^
mysql_close(); // on ferme mysql
}
else
{ 
?>
</div>
<div id="corps">
<h2>Recherche patient</h2>
 Saisir nom ou prénom du patient
 <br>
 <br>
 <form action="recherche_patient.php" method="Post">
<input type="text" name="requete" size="20">
<input type="submit" value="Ok">
</form>
</div>
<?php
}
// et voilà, c'est fini !
?>


