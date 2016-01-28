<?php 
if (isset ( $_SESSION ['admin_id'] )) {
echo'<!DOCTYPE html>
<html>

   <LINK rel="stylesheet" href="styles/General.css" /> 
   <LINK rel="stylesheet" href="styles/calendrier.css" /> 
 
    <div id="header">
      <p><a href="accueil.php">Consultations externes - CHIC des Andaines</a></p>
    </div>
    
    <nav class="navbar">
      
      <p id="accueil."><a href="accueil.php"><img src="image/home.png" width="20"/>accueil</a></p>
      <p id="docteur"><a href="medecin.php">Médecins</a></p>
      <p id="patient"><a href="patient.php">Patients</a></p>
      <p id="rdv"><a href="rdv.php">Rendez-vous</a></p>
	  <p id="rdv"><a href="rdv_dispo.php">Rdv dispo</a></p>
      <p id="deconnexion"><a href="deconnexion.php">Déconnexion<img src="image/deconnexion.jpg" width="20"/></a></p>
		
    </nav>
  
  
</html>';}
 
else {header ('location: index.php');}
?>